<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            //Relationship
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('position_id')
                ->constrained('positions')
                ->cascadeOnDelete();

            // Unique employee number
            $table->string('employee_number')->unique()->nullable();

            // Basic info
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('middle_name', 100)->nullable();

            // Demographics
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->string('phone_number', 20)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('address', 255)->nullable();

            // Employment details
            $table->date('hire_date');
            $table->enum('employment_type', [
                'Full-time',
                'Part-time',
                'Contract',
                'Intern',
                'Probationary',
                'Seasonal'
            ])->default('Full-time');

            $table->enum('employment_status', [
                'Active',
                'Resigned',
                'Terminated',
                'Retired',
                'Suspended'
            ])->default('Active');


            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

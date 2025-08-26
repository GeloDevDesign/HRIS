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

            // Relationship
            $table->foreignId('user_id')->nullable()
                ->constrained()
                ->cascadeOnDelete();


            // Basic info
            $table->string('employee_number')->unique()->nullable();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('middle_name', 100)->nullable();
            $table->enum('suffix', ['Jr', 'Sr', 'II', 'III', 'IV', 'V', 'None'])->nullable();

            // Demographics
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->enum('civil_status', ['Single', 'Married', 'Widowed', 'Separated'])->default('Single');
            $table->string('nationality', 100)->default('Filipino');
            $table->string('religion', 100)->nullable();
            $table->float('height')->nullable(); // cm
            $table->float('weight')->nullable(); // kg
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth', 255)->nullable();
            $table->string('address', 255)->nullable();

            // Contact
            $table->string('phone_number', 20)->nullable();
            $table->string('email', 150)->nullable();

            // Emergency contact
            $table->string('emergency_contact_name', 150)->nullable();
            $table->string('emergency_contact_relationship', 100)->nullable();
            $table->string('emergency_contact_number', 20)->nullable();

            // Government IDs
            $table->string('sss_number', 20)->nullable();
            $table->string('philhealth_number', 20)->nullable();
            $table->string('pagibig_number', 20)->nullable();
            $table->string('tin_number', 20)->nullable();

            // Employment details
            $table->date('hire_date');
            $table->enum('employment_type', [
                'Full-time',
                'Part-time',
                'Contract',
                'Intern',
                'Probationary',
                'Seasonal'
            ])->default('Full-Time');

            $table->enum('employment_status', [
                'Active',
                'Resigned',
                'Terminated',
                'Retired',
                'Suspended'
            ])->default('Active');

            // Other
            $table->string('photo')->nullable();

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

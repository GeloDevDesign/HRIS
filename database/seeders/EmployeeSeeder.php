<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Employee::insert([
            [
                'user_id' => 1,
                'position_id' => 1,
                'employee_number' => 'EMP001',
                'first_name' => 'Juan',
                'last_name' => 'Dela Cruz',
                'middle_name' => 'Santos',
                'suffix' => 'None',
                'gender' => 'Male',
                'civil_status' => 'Single',
                'nationality' => 'Filipino',
                'religion' => 'Catholic',
                'height' => 170,
                'weight' => 65,
                'date_of_birth' => '1990-05-15',
                'place_of_birth' => 'Quezon City',
                'address' => '123 Manila St, Quezon City',
                'phone_number' => '09171234567',
                'email' => 'juan.delacruz@example.com',
                'emergency_contact_name' => 'Maria Dela Cruz',
                'emergency_contact_relationship' => 'Mother',
                'emergency_contact_number' => '09181234567',
                'sss_number' => '12-3456789-0',
                'philhealth_number' => '1234567890',
                'pagibig_number' => '1234567890',
                'tin_number' => '123-456-789',
                'hire_date' => '2020-01-10',
                'employment_type' => 'Full-time',
                'employment_status' => 'Active',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'position_id' => 2,
                'employee_number' => 'EMP002',
                'first_name' => 'Maria',
                'last_name' => 'Reyes',
                'middle_name' => null,
                'suffix' => 'None',
                'gender' => 'Female',
                'civil_status' => 'Married',
                'nationality' => 'Filipino',
                'religion' => 'Christian',
                'height' => 160,
                'weight' => 55,
                'date_of_birth' => '1992-08-25',
                'place_of_birth' => 'Cebu City',
                'address' => '456 Cebu Ave, Cebu City',
                'phone_number' => '09281234567',
                'email' => 'maria.reyes@example.com',
                'emergency_contact_name' => 'Jose Reyes',
                'emergency_contact_relationship' => 'Husband',
                'emergency_contact_number' => '09391234567',
                'sss_number' => '98-7654321-0',<x-entity-form :model="$employee" :action="$action" :return-url="route('employee.records.index')" >

    <!-- Personal Name Information Row -->
    <div class="row">
        <!-- First Name -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" :error="$errors->get('first_name')"
                          type="text" name="first_name" :icon="'ph-user-circle'"
                          :value="optional($employee)->first_name ?? old('first_name')" required />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Middle Name -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label" for="middle_name" :value="__('Middle Name')" />
            <x-text-input id="middle_name" class="block mt-1 w-full" :error="$errors->get('middle_name')"
                          type="text" name="middle_name" :icon="'ph-user-circle'"
                          :value="optional($employee)->middle_name ?? old('middle_name')" />
            <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" :error="$errors->get('last_name')"
                          type="text" name="last_name" :icon="'ph-user-circle'"
                          :value="optional($employee)->last_name ?? old('last_name')" required />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Suffix -->
        <div class="col-12 col-md-3 mt-3">
            <x-select :label="'Suffix'" :icon="'ph-user-circle'" name="suffix" id="suffix">
        @foreach ($suffixes as $suffix)
                    <option value="{{ $suffix }}" {{ old('suffix', optional($employee)->suffix) == $suffix ? 'selected' : '' }}>
                        {{ $suffix }}
                    </option>
    @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('suffix')" class="mt-2" />
        </div>
    </div>

    <!-- Personal Details Row -->
    <div class="row mt-2">
        <!-- Gender -->
        <div class="col-12 col-md-3 mt-3">
            <x-select :label="'Gender'" :icon="'ph-user-circle'" name="gender" id="gender">
        @foreach ($genders as $gender)
                    <option value="{{ $gender }}" {{ old('gender', optional($employee)->gender) == $gender ? 'selected' : '' }}>
                        {{ $gender }}
                    </option>
    @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Civil Status -->
        <div class="col-12 col-md-3 mt-3">
            <x-select :label="'Civil Status'" :icon="'ph-heart'" name="civil_status" id="civil_status">
        @foreach ($civilStatuses as $civilStatus)
                    <option value="{{ $civilStatus }}" {{ old('civil_status', optional($employee)->civil_status) == $civilStatus ? 'selected' : '' }}>
                        {{ $civilStatus }}
                    </option>
    @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('civil_status')" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="date_of_birth" :value="__('Date of Birth')" />
            <x-date-picker icon="ph-calendar" name="date_of_birth" id="date_of_birth"
                           placeholder="Select birth date" :error="$errors->first('date_of_birth')"
                           :value="optional($employee)->date_of_birth ?? old('date_of_birth')" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>

        <!-- Place of Birth -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="place_of_birth" :value="__('Place of Birth')" />
            <x-text-input id="place_of_birth" class="block mt-1 w-full" :error="$errors->get('place_of_birth')"
                          type="text" name="place_of_birth" :icon="'ph-map-pin-line'"
                          :value="optional($employee)->place_of_birth ?? old('place_of_birth')" required />
            <x-input-error :messages="$errors->get('place_of_birth')" class="mt-2" />
        </div>
    </div>

    <!-- Cultural & Religious Information Row -->
    <div class="row mt-2">
        <!-- Nationality -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="nationality" :value="__('Nationality')" />
            <x-text-input id="nationality" class="block mt-1 w-full" :error="$errors->get('nationality')"
                          type="text" name="nationality" :icon="'ph-flag'"
                          :value="optional($employee)->nationality ?? old('nationality')" required />
            <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
        </div>

        <!-- Religion -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="religion" :value="__('Religion')" />
            <x-text-input id="religion" class="block mt-1 w-full" :error="$errors->get('religion')"
                          type="text" name="religion" :icon="'ph-church'"
                          :value="optional($employee)->religion ?? old('religion')" required />
            <x-input-error :messages="$errors->get('religion')" class="mt-2" />
        </div>

        <!-- Height -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="height" :value="__('Height (cm)')" />
            <x-text-input id="height" class="block mt-1 w-full" :error="$errors->get('height')"
                          type="number" name="height" :icon="'ph-ruler'" step="0.1"
                          :value="optional($employee)->height ?? old('height')" required />
            <x-input-error :messages="$errors->get('height')" class="mt-2" />
        </div>

        <!-- Weight -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="weight" :value="__('Weight (kg)')" />
            <x-text-input id="weight" class="block mt-1 w-full" :error="$errors->get('weight')"
                          type="number" name="weight" :icon="'ph-scale'" step="0.1"
                          :value="optional($employee)->weight ?? old('weight')" required />
            <x-input-error :messages="$errors->get('weight')" class="mt-2" />
        </div>
    </div>

    <!-- Contact Information Row -->
    <div class="row mt-2">
        <!-- Address -->
        <div class="col-12 col-md-6 mt-3">
            <x-input-label class="label-required" for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" :error="$errors->get('address')"
                          type="text" name="address" :icon="'ph-map-pin'"
                          :value="optional($employee)->address ?? old('address')" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" :error="$errors->get('phone_number')"
                          type="tel" name="phone_number" :icon="'ph-phone'"
                          :value="optional($employee)->phone_number ?? old('phone_number')" required />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" :error="$errors->get('email')"
                          type="email" name="email" :icon="'ph-envelope'"
                          :value="optional($employee)->email ?? old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
    </div>

    <!-- Emergency Contact Information Row -->
    <div class="row mt-2">
        <!-- Emergency Contact Name -->
        <div class="col-12 col-md-4 mt-3">
            <x-input-label class="label-required" for="emergency_contact_name" :value="__('Emergency Contact Name')" />
            <x-text-input id="emergency_contact_name" class="block mt-1 w-full" :error="$errors->get('emergency_contact_name')"
                          type="text" name="emergency_contact_name" :icon="'ph-user-plus'"
                          :value="optional($employee)->emergency_contact_name ?? old('emergency_contact_name')" required />
            <x-input-error :messages="$errors->get('emergency_contact_name')" class="mt-2" />
        </div>

        <!-- Emergency Contact Relationship -->
        <div class="col-12 col-md-4 mt-3">
            <x-input-label class="label-required" for="emergency_contact_relationship" :value="__('Relationship')" />
            <x-text-input id="emergency_contact_relationship" class="block mt-1 w-full" :error="$errors->get('emergency_contact_relationship')"
                          type="text" name="emergency_contact_relationship" :icon="'ph-users'"
                          :value="optional($employee)->emergency_contact_relationship ?? old('emergency_contact_relationship')" required />
            <x-input-error :messages="$errors->get('emergency_contact_relationship')" class="mt-2" />
        </div>

        <!-- Emergency Contact Number -->
        <div class="col-12 col-md-4 mt-3">
            <x-input-label class="label-required" for="emergency_contact_number" :value="__('Emergency Contact Number')" />
            <x-text-input id="emergency_contact_number" class="block mt-1 w-full" :error="$errors->get('emergency_contact_number')"
                          type="tel" name="emergency_contact_number" :icon="'ph-phone-call'"
                          :value="optional($employee)->emergency_contact_number ?? old('emergency_contact_number')" required />
            <x-input-error :messages="$errors->get('emergency_contact_number')" class="mt-2" />
        </div>
    </div>

    <!-- Government IDs Row -->
    <div class="row mt-2">
        <!-- Employee Number -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="employee_number" :value="__('Employee Number')" />
            <x-text-input id="employee_number" class="block mt-1 w-full" :error="$errors->get('employee_number')"
                          type="text" name="employee_number" :icon="'ph-identification-card'"
                          :value="optional($employee)->employee_number ?? old('employee_number')" required />
            <x-input-error :messages="$errors->get('employee_number')" class="mt-2" />
        </div>

        <!-- SSS Number -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="sss_number" :value="__('SSS Number')" />
            <x-text-input id="sss_number" class="block mt-1 w-full" :error="$errors->get('sss_number')"
                          type="text" name="sss_number" :icon="'ph-card'"
                          :value="optional($employee)->sss_number ?? old('sss_number')" required />
            <x-input-error :messages="$errors->get('sss_number')" class="mt-2" />
        </div>

        <!-- PhilHealth Number -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="philhealth_number" :value="__('PhilHealth Number')" />
            <x-text-input id="philhealth_number" class="block mt-1 w-full" :error="$errors->get('philhealth_number')"
                          type="text" name="philhealth_number" :icon="'ph-card'"
                          :value="optional($employee)->philhealth_number ?? old('philhealth_number')" required />
            <x-input-error :messages="$errors->get('philhealth_number')" class="mt-2" />
        </div>

        <!-- Pag-IBIG Number -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="pagibig_number" :value="__('Pag-IBIG Number')" />
            <x-text-input id="pagibig_number" class="block mt-1 w-full" :error="$errors->get('pagibig_number')"
                          type="text" name="pagibig_number" :icon="'ph-card'"
                          :value="optional($employee)->pagibig_number ?? old('pagibig_number')" required />
            <x-input-error :messages="$errors->get('pagibig_number')" class="mt-2" />
        </div>
    </div>

    <!-- Employment Information Row -->
    <div class="row mt-2">
        <!-- TIN Number -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="tin_number" :value="__('TIN Number')" />
            <x-text-input id="tin_number" class="block mt-1 w-full" :error="$errors->get('tin_number')"
                          type="text" name="tin_number" :icon="'ph-card'"
                          :value="optional($employee)->tin_number ?? old('tin_number')" required />
            <x-input-error :messages="$errors->get('tin_number')" class="mt-2" />
        </div>

        <!-- Hire Date -->
        <div class="col-12 col-md-3 mt-3">
            <x-input-label class="label-required" for="hire_date" :value="__('Hire Date')" />
            <x-date-picker icon="ph-calendar-check" name="hire_date" id="hire_date"
                           placeholder="Select hire date" :error="$errors->first('hire_date')"
                           :value="optional($employee)->hire_date ?? old('hire_date')" />
            <x-input-error :messages="$errors->get('hire_date')" class="mt-2" />
        </div>

        <!-- Employment Type -->
        <div class="col-12 col-md-3 mt-3">
            <x-select :label="'Employment Type'" :icon="'ph-briefcase'" name="employment_type" id="employment_type">
        @foreach (['Full-time', 'Part-time', 'Contract', 'Internship'] as $type)
                    <option value="{{ $type }}" {{ old('employment_type', optional($employee)->employment_type) == $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
    @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('employment_type')" class="mt-2" />
        </div>

        <!-- Employment Status -->
        <div class="col-12 col-md-3 mt-3">
            <x-select :label="'Employment Status'" :icon="'ph-check-circle'" name="employment_status" id="employment_status">
        @foreach (['Active', 'Inactive', 'Terminated', 'On Leave'] as $status)
                    <option value="{{ $status }}" {{ old('employment_status', optional($employee)->employment_status) == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
    @endforeach
            </x-select>
            <x-input-error :messages="$errors->get('employment_status')" class="mt-2" />
        </div>
    </div>

</x-entity-form>
                'philhealth_number' => '0987654321',
                'pagibig_number' => '0987654321',
                'tin_number' => '987-654-321',
                'hire_date' => '2021-03-15',
                'employment_type' => 'Part-time',
                'employment_status' => 'Active',
                'photo' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

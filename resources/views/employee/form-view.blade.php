<!-- Basic Information Card -->
<x-card heading="Basic Information">
    <div class="row">
        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="first_name" :value="'First Name'" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                          :value="$record->first_name" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="middle_name" :value="'Middle Name'" />
            <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name"
                          :value="$record->middle_name" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="last_name" :value="'Last Name'" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                          :value="$record->last_name" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="suffix" :value="'Suffix'" />
            <x-text-input id="suffix" class="block mt-1 w-full" type="text" name="suffix"
                          :value="$record->suffix" readonly />
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="gender" :value="'Gender'" />
            <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender"
                          :value="$record->gender" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="civil_status" :value="'Civil Status'" />
            <x-text-input id="civil_status" class="block mt-1 w-full" type="text" name="civil_status"
                          :value="$record->civil_status" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="date_of_birth" :value="'Date of Birth'" />
            <x-text-input id="date_of_birth" class="block mt-1 w-full" type="text"
                          :value="$record->date_of_birth" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="place_of_birth" :value="'Place of Birth'" />
            <x-text-input id="place_of_birth" class="block mt-1 w-full" type="text"
                          :value="$record->place_of_birth" readonly />
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="nationality" :value="'Nationality'" />
            <x-text-input id="nationality" class="block mt-1 w-full" type="text"
                          :value="$record->nationality" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="religion" :value="'Religion'" />
            <x-text-input id="religion" class="block mt-1 w-full" type="text"
                          :value="$record->religion" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="height" :value="'Height (cm)'" />
            <x-text-input id="height" class="block mt-1 w-full" type="text"
                          :value="$record->height" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="weight" :value="'Weight (kg)'" />
            <x-text-input id="weight" class="block mt-1 w-full" type="text"
                          :value="$record->weight" readonly />
        </div>
    </div>
</x-card>

<!-- Contact Information Card -->
<x-card heading="Contact Information">
    <div class="row">
        <div class="col-12 col-md-6 mt-3">
            <x-input-label for="address" :value="'Address'" />
            <x-text-input id="address" class="block mt-1 w-full" type="text"
                          :value="$record->address" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="phone_number" :value="'Phone Number'" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="text"
                          :value="$record->phone_number" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="email" :value="'Email'" />
            <x-text-input id="email" class="block mt-1 w-full" type="text"
                          :value="$record->user->email" readonly />
        </div>
    </div>
</x-card>

<!-- Government Details Information Card -->
<x-card heading="Government Details Information">
    <div class="row">
        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="sss_number" :value="'SSS Number'" />
            <x-text-input id="sss_number" class="block mt-1 w-full" type="text"
                          :value="$record->sss_number" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="philhealth_number" :value="'PhilHealth Number'" />
            <x-text-input id="philhealth_number" class="block mt-1 w-full" type="text"
                          :value="$record->philhealth_number" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="pagibig_number" :value="'Pag-IBIG Number'" />
            <x-text-input id="pagibig_number" class="block mt-1 w-full" type="text"
                          :value="$record->pagibig_number" readonly />
        </div>

        <div class="col-12 col-md-3 mt-3">
            <x-input-label for="tin_number" :value="'TIN Number'" />
            <x-text-input id="tin_number" class="block mt-1 w-full" type="text"
                          :value="$record->tin_number" readonly />
        </div>
    </div>
</x-card>

<!-- Employment Information Card -->
<x-card heading="Employment Information">
    <div class="row">
        <div class="col-12 col-md-4 mt-3">
            <x-input-label for="employee_number" :value="'Employee Number'" />
            <x-text-input id="employee_number" class="block mt-1 w-full" type="text"
                          :value="$record->employee_number" readonly />
        </div>

        <div class="col-12 col-md-4 mt-3">
            <x-input-label for="position" :value="'Position'" />
            <x-text-input id="position" class="block mt-1 w-full" type="text"
                          :value="$record->positions->isNotEmpty() ? $record->positions->pluck('title')->implode(', ') : 'N/A'"
                          readonly />
        </div>

        <div class="col-12 col-md-4 mt-3">
            <x-input-label for="employment_type" :value="'Employment Type'" />
            <x-text-input id="employment_type" class="block mt-1 w-full" type="text"
                          :value="$record->employment_type ?? 'N/A'" readonly />
        </div>
    </div>
</x-card>

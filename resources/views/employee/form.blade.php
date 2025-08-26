<x-entity-form :model="$employee" :action="$action" :return-url="route('employee.records.index')" >

    <div class="row" >

        <div class="col-12 col-md-9 mt-3 mt-md-0" >
            <div class="row mt-2" >
                <!-- First Name -->
                <div class="col-12 col-md-4 mt-3 mt-md-0" >
                    <x-input-label class="label-required" for="first_name" :value="__('First Name')" />
                    <x-text-input id="first_name" class="block mt-1 w-full" :error="$errors->get('first_name')"
                                  type="text" name="first_name" :icon="'ph-employee-circle'"
                                  :value="optional($employee)->first_name ? optional($employee)->first_name : old('first_name')"
                                  required />
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div >
                <!-- Last Name -->
                <div class="col-12 col-md-4 mt-3 mt-md-0" >
                    <x-input-label class="label-required" for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" class="block mt-1 w-full" type="text"
                                  :error="$errors->get('last_name')" name="last_name" :icon="'ph-employee-circle'"
                                  :value="optional($employee)->last_name ? optional($employee)->last_name : old('last_name')"
                                  required />
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div >
                <!-- Email Address -->
                <div class="col-12 col-md-4 mt-3 mt-md-0" >
                    <x-input-label class="label-required" for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                  :error="$errors->get('email')" :icon="'ph-at'"
                                  :value="optional($employee)->email ? optional($employee)->email : old('email')"
                                  required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div >


            </div >
        </div >
    </div >


</x-entity-form >

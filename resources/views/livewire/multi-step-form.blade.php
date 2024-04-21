<div class="space-y-4">
    <ol class="flex justify-center items-center w-full">
        <li class="flex-1 flex justify-center items-center cursor-pointer">
            <div class="h-1 w-full grow bg-white"></div>
            <div class="flex flex-none w-64 items-center text-white dark:text-red-500 space-x-4">
                <span class="flex items-center justify-center w-10 h-10 bg-white rounded-full lg:h-12 lg:w-12 shrink-0">
                    <svg class="w-3.5 h-3.5 text-red-600 lg:w-4 lg:h-4 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                    </svg>
                </span>
                <span class="text-lg">Personal Information</span>
            </div>
        </li>
        <li class="flex-1 flex justify-center items-center cursor-pointer">
            <div class="h-1 w-full grow bg-{{ $currentStep == 2 || $currentStep == 3 ? 'white' : 'gray-400' }}"></div>
            <div class="flex flex-none w-64 items-center text-{{ $currentStep == 2 || $currentStep == 3 ? 'white' : 'gray-400' }} {{ $currentStep == 2 || $currentStep == 3 ? 'dark:text-red-500' : '' }} space-x-4">
                <span class="flex items-center justify-center w-10 h-10 bg-{{ $currentStep == 2 || $currentStep == 3 ? 'white' : 'gray-400' }} rounded-full lg:h-12 lg:w-12 shrink-0">
                    <svg class="w-3.5 h-3.5 text-{{ $currentStep == 2 || $currentStep == 3 ? 'red-600' : 'gray-600' }} lg:w-4 lg:h-4 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                    </svg>
                </span>
                <span class="text-lg">Address Information</span>
            </div>
        </li>

        <li class="flex-1 flex justify-center items-center cursor-pointer">
            <div class="h-1 w-full grow bg-{{ $currentStep == 3 ? 'white' : 'gray-400' }}"></div>
            <div class="flex flex-none w-64 items-center text-{{ $currentStep == 3 ? 'white' : 'gray-400' }} {{ $currentStep == 3 ? 'dark:text-red-500' : '' }} space-x-4">
                <span class="flex items-center justify-center w-10 h-10 bg-{{ $currentStep == 3 ? 'white' : 'gray-400' }} rounded-full lg:h-12 lg:w-12 shrink-0">
                    <svg class="w-3.5 h-3.5 text-{{ $currentStep == 3 ? 'red-600' : 'gray-600' }} lg:w-4 lg:h-4 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                    </svg>
                </span>
                <span class="text-lg">Educational Attainment</span>
            </div>
        </li>
        <div class="h-1 w-12 lg:w-32 xl:w-64 bg-{{  $currentStep == 3 ? 'white' : 'gray-400' }}"></div>

    </ol>

    <div class="w-full mt-6 lg:pl-2 space-y-8">
        <div class="px-6">

            @if (session('success'))
                <div class="bg-green-500 p-6 rounded text-white">
                    {{ session('success') }}
                </div>
            @endif

            <div class="space-y-4 xl:max-w-7xl mx-auto">

                <form wire:submit.prevent="welcome" class="space-y-6">
                    @csrf

                    <div class="p-10 bg-white rounded border border-zinc-300 shadow-md space-y-6">
                        <div class="space-y-4">
                            <p class="text-xl items-center font-bold">
                                SU ALUMNI UPDATE & CLEARANCE FORM
                            </p>

                            <div class="text-lg items-center space-y-4">
                                <p>
                                    By filling out this form authorizes the SU Alumni & External Affairs Office to use the information for alumni related purposes only. In compliance with R.A. 10173 (Data Privacy Act).
                                </p>
                                <span>2020 SU-ALUMNI FORM 72-A</span>
                            </div>
                        </div>

                        <div class="space-y-4">
                            @if ($currentStep == 1)
                                <p class="text-lg text-gray-800 font-medium">Personal Information</p>

                                {{-- R1 --}}
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <label class="text-sm {{ $errors->has('last_name') ? 'text-red-700' : 'text-gray-600' }}" for="last_name">Last Name</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" wire:model="last_name" id="last_name" name="last_name" type="text" required="last_name" placeholder="Last Name" aria-label="Name">
                                        <span class="text-red-700">@error('last_name'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="flex-1">
                                        <label class="text-sm {{ $errors->has('first_name') ? 'text-red-700' : 'text-gray-600' }} for="first_name">First Name</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="first_name" wire:model="first_name" name="first_name" type="text" required="first_name" placeholder="First Name" aria-labelflex-1Name">
                                        <span class="text-red-700">@error('first_name'){{ $message }} @enderror</span>
                                    </div>
                                </div>

                                {{-- R2 --}}
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <label class="text-sm {{ $errors->has('middle_name') ? 'text-red-700' : 'text-gray-600' }}" for="middle_name">Middle Name</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="middle_name" wire:model="middle_name" name="middle_name" type="text" required="middle_name" placeholder="Middle Name" aria-label="Name">
                                        <span class="text-red-700">@error('middle_name'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="flex-1">
                                        <label class="text-sm {{ $errors->has('birthdate') ? 'text-red-700' : 'text-gray-600' }}" for="birthdate">Birthdate</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="birthdate" wire:model="birthdate" name="birthdate" type="text" required="birthdate" placeholder="MM / DD / YYYY" aria-label="Birth">
                                        <span class="text-red-700">@error('birthdate'){{ $message }} @enderror</span>
                                    </div>
                                </div>

                                {{-- R3  --}}
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <label class="text-sm {{ $errors->has('sex') ? 'text-red-700' : 'text-gray-600' }} for="sex">Sex</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="sex" wire:model="sex" name="sex" type="text" required="sex" placeholder="Sex" aria-label="Sex">
                                        <span class="text-red-700">@error('sex'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="flex-1">
                                        <label class="text-sm {{ $errors->has('nationality') ? 'text-red-700' : 'text-gray-600' }}" for="nationality">Nationality</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="nationality" wire:model="nationality" name="nationality" type="text" required="nationality" placeholder="Nationality" aria-label="Nationality">
                                        <span class="text-red-700">@error('nationality'){{ $message }} @enderror</span>
                                    </div>
                                </div>

                                {{-- R4  --}}
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <label class="text-sm {{ $errors->has('status') ? 'text-red-700' : 'text-gray-600' }}" for="status">Civil Status</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="status" wire:model="status" name="status" type="text" required="status" placeholder="Civil Status" aria-label="Status">
                                        <span class="text-red-700">@error('status'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="flex-1">
                                        <label class="text-sm {{ $errors->has('spouse') ? 'text-red-700' : 'text-gray-600' }}" for="spouse">Spouse Name</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="spouse" wire:model="spouse" name="spouse" type="text" required="spouse" placeholder="Spouse Name" aria-label="Spouse">
                                        <span class="text-red-700">@error('spouse'){{ $message }} @enderror</span>
                                    </div>

                                </div>

                                {{-- R5  --}}
                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <label class="text-sm {{ $errors->has('number') ? 'text-red-700' : 'text-gray-600' }}" for="number">Mobile/Contact Number</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="number" wire:model="number" name="number" type="text" required="number" placeholder="Contact Number" aria-label="Number">
                                        <span class="text-red-700">@error('number'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="flex-1">
                                        <label class="text-sm {{ $errors->has('email') ? 'text-red-700' : 'text-gray-600' }}" for="number">Active Email Address</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="email" wire:model="email" name="email" type="text" required="email" placeholder="Email Address" aria-label="Email">
                                        <span class="text-red-700">@error('email'){{ $message }} @enderror</span>
                                    </div>

                                </div>
                            @endif

                            @if ($currentStep == 2)
                                {{-- Address Information --}}
                                <header class="text-lg text-gray-800 font-medium">Address Information</header>

                                <div class="space-y-4">
                                    <span class="text-lg text-gray-500 font-medium">Current Address</span>

                                    <div class="space-y-2">
                                        <label class="block text-sm {{ $errors->has('current_street') ? 'text-red-700' : 'text-gray-600' }}" for="current_street">Address</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="current_street" wire:model="current_street" name="current_street" type="text" required="" placeholder="Street" aria-label="cStreet">
                                        <span class="text-red-700">@error('current_street'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 ">
                                        <div>
                                            <label class="block text-sm {{ $errors->has('current_city') ? 'text-red-700' : 'text-gray-600' }}" for="current_city">City</label>
                                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="current_city" wire:model="current_city" name="current_city" type="text" required="" placeholder="City" aria-label="cCity">
                                            <span class="text-red-700">@error('current_city'){{ $message }} @enderror</span>
                                        </div>
                                        <div>
                                            <label class="block text-sm {{ $errors->has('current_country') ? 'text-red-700' : 'text-gray-600' }}" for="current_country">Country</label>
                                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="current_country" wire:model="current_country" name="current_country" type="text" required="" placeholder="Country" aria-label="cCountry">
                                            <span class="text-red-700">@error('current_country'){{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 ">
                                        <div>
                                            <label class="block text-sm {{ $errors->has('current_zip_code') ? 'text-red-700' : 'text-gray-600' }}" for="current_zip_code">Zip Code</label>
                                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="current_zip_code" wire:model="current_zip_code" name="current_zip_code" type="text" required="" placeholder="Zip Code" aria-label="cZip Code">
                                            <span class="text-red-700">@error('current_zip_code'){{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <span class="text-lg text-gray-800 font-light pb-4">Home Address</span>

                                    <div class="">
                                        <label class="block text-sm {{ $errors->has('home_street') ? 'text-red-700' : 'text-gray-600' }}" for="home_street">Address</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="home_street" wire:model="home_street" name="home_street" type="text" required="" placeholder="Street" aria-label="hStreet">
                                        <span class="text-red-700">@error('home_street'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="flex gap-4">
                                        <div class="flex-1">
                                            <label class="block text-sm {{ $errors->has('home_city') ? 'text-red-700' : 'text-gray-600' }}" for="home_city">City</label>
                                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="home_city" wire:model="home_city" name="home_city" type="text" required="" placeholder="City" aria-label="hCity">
                                            <span class="text-red-700">@error('home_city'){{ $message }} @enderror</span>
                                        </div>
                                        <div class="flex-1">
                                            <label class="block text-sm {{ $errors->has('home_country') ? 'text-red-700' : 'text-gray-600' }}" for="home_country">Country</label>
                                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="home_country" wire:model="home_country" name="home_country" type="text" required="" placeholder="Country" aria-label="cCountry">
                                            <span class="text-red-700">@error('home_country'){{ $message }} @enderror</span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div>
                                            <label class="block text-sm {{ $errors->has('home_zip_code') ? 'text-red-700' : 'text-gray-600' }}" for="home_zip_code">Zip Code</label>
                                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="home_zip_code" wire:model="home_zip_code" name="home_zip_code" type="text" required="" placeholder="Zip Code" aria-label="hZip Code">
                                            <span class="text-red-700">@error('home_zip_code'){{ $message }} @enderror</span>
                                        </div>
                                    </div>

                                </div>

                            @endif


                            @if ($currentStep == 3)
                                {{-- Educational Attainment --}}
                                <div class="space-y-4">
                                    <p class="text-lg text-gray-800 font-medium">Educational Attainment</p>
                                    <p class="text-sm text-gray-500 font-medium">If you did not finish a whole course at Silliman University please indicate inclusive years attended</p>
                                </div>

                                <div class="flex gap-4">
                                    <div class="flex-1">
                                        <label class="block text-sm {{ $errors->has('course') ? 'text-red-700' : 'text-gray-600' }}" for="course">Course/Degree</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="course" wire:model="course" name="course" type="text" required="" placeholder="Bachelor of ..." aria-label="Course">
                                    </div>
                                    <div class="flex-1">
                                        <label class="text-sm {{ $errors->has('year_attended') ? 'text-red-700' : 'text-gray-600' }}" for="year_attended">Year Attended/Graduated</label>
                                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="year_attended" wire:model="year_attended" name="year_attended" type="text" required="" placeholder="SY" aria-label="attendedGraduated">
                                    </div>

                                </div>
                            @endif

                            </div>
                            <div class="flex justify-end space-x-4">

                                @if ($currentStep == 1)
                                    <div></div>
                                @endif

                                @if ($currentStep == 2 || $currentStep == 3)
                                    <button type="button" class="bg-zinc-500 hover:bg-zinc-300 transition duration-300 ease-in text-white w-24 p-2 rounded-md" wire:click="decreaseStep()">Back</button>
                                @endif

                                @if ($currentStep == 1 || $currentStep == 2)
                                    <button type="button" class="bg-red-500 hover:bg-red-300 transition duration-300 ease-in text-white w-24 p-2 rounded-md" wire:click="increaseStep()">Next Step</button>
                                @endif

                                @if ($currentStep == 3)
                                    <button class="bg-red-500 hover:bg-red-300 transition duration-300 ease-in text-white border w-24 p-2 rounded-md" type="submit">Submit</button>
                                @endif

                            </div>
                    </div>



                </form>
            </div>

        </div>

    </div>
</div>

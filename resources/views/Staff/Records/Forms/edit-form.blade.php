<form method="POST" action="{{ url('update-record/' . $alumni->id) }}" class="space-y-6 bg-white dark:bg-gray-900 rounded-md px-4 py-1 pb-4">
    @csrf
    @method('PUT')
    <div class="space-y-4">
        <div class="space-y-4">
            <header class="text-xl text-zinc-900 font-semibold">
                SU Alumni Update & Clearance Form
            </header>
            <div class="space-y-4">
                <div class="space-y-1">
                    <span class="block text-lg text-zinc-900 font-semibold">Personal Information</span>
                    <span class="block text-lg text-gray-500 font-light">Primary Information</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="flex-1 space-y-1">
                        <label class="{{ $errors->has('last_name') ? 'text-red-700' : 'text-gray-600' }}" for="last_name">Last Name</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" wire:model="last_name" id="last_name" name="last_name" type="text" required="last_name" placeholder="ex. Doe" aria-label="Name" value="{{ $alumni->last_name }}">
                        <span class="text-red-700">@error('last_name'){{ $message }} @enderror</span>
                    </div>
                    <div class="flex-1 space-y-1">
                        <label class="{{ $errors->has('first_name') ? 'text-red-700' : 'text-gray-600' }} for="first_name">First Name</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="first_name" wire:model="first_name" name="first_name" type="text" required="first_name" placeholder="ex. John" aria-label="Name" value="{{ $alumni->first_name }}">
                        <span class="text-red-700">@error('first_name'){{ $message }} @enderror</span>
                    </div>
                    <div class="flex-1 space-y-1">
                        <label class="{{ $errors->has('middle_name') ? 'text-red-700' : 'text-gray-600' }}" for="middle_name">Middle Name</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="middle_name" wire:model="middle_name" name="middle_name" type="text" required="middle_name" placeholder="ex. Williams" aria-label="Name" value="{{ $alumni->middle_name }}">
                        <span class="text-red-700">@error('middle_name'){{ $message }} @enderror</span>
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                <span class="text-lg text-gray-500">Personal Details</span>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="flex-1 space-y-1">
                        <label class="{{ $errors->has('birthdate') ? 'text-red-700' : 'text-gray-600' }}" for="birthdate">Birthdate</label>
                        {{-- <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="birthdate" wire:model="birthdate" name="birthdate" type="text" required="birthdate" placeholder="ex. 01/01/2000" aria-label="Birth"> --}}
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input id="birthdate" datepicker type="text" class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="Select date" wire:model="birthdate" name="birthdate" required="birthdate" aria-label="Birth" value="{{ $alumni->birthdate }}">
                        </div>
                        <span class="text-red-700">@error('birthdate'){{ $message }} @enderror</span>
                    </div>
                    <div class="flex-1 space-y-1">
                        <label class="{{ $errors->has('nationality') ? 'text-red-700' : 'text-gray-600' }}" for="nationality">Nationality</label>
                        <select id="nationality" wire:model="nationality" name="nationality" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" {{ $alumni->nationality ? '' : 'selected' }}>Select Nationality</option>
                            @foreach($nationalities as $nationality)
                                <option value="{{ $nationality->name }}" {{ $alumni->nationality == $nationality->name ? 'selected' : '' }}>{{ $nationality->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-red-700">@error('nationality'){{ $message }} @enderror</span>
                    </div>
                    <div class="flex-1 space-y-1">
                        <label class="{{ $errors->has('sex') ? 'text-red-700' : 'text-gray-600' }} for="sex">Sex</label>
                        <select id="sex" wire:model="sex" name="sex" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Select Sex</option>
                            <option value="male" {{ $alumni->sex == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $alumni->sex == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ $alumni->sex == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <span class="text-red-700">@error('sex'){{ $message }} @enderror</span>
                    </div>
                    <div class="flex-1 space-y-1">
                        <label for="status" class="{{ $errors->has('status') ? 'text-red-700' : 'text-gray-600' }}">Civil Status</label>
                        <div class="relative">
                            <select id="status" wire:model="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected>Select Civil Status</option>
                                <option value="Single" {{ $alumni->status == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ $alumni->status == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Divorced" {{ $alumni->status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                <option value="Widowed" {{ $alumni->status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4ZM0 9a2 2 0 114 0 2 2 0 01-4 0Zm18 0a2 2 0 11-4 0 2 2 0 014 0Z"/>
                                </svg>
                            </div>
                        </div>
                        <span class="text-red-700">@error('status'){{ $message }} @enderror</span>
                    </div>
                    <div class="flex-1 space-y-1">
                        <label class="{{ $errors->has('spouse') ? 'text-red-700' : 'text-gray-600' }}" for="spouse">Spouse Name</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="spouse" wire:model="spouse" name="spouse" type="text" required="spouse" placeholder="ex. Rose Flores" aria-label="Spouse" value="{{ $alumni->spouse }}">
                        <span class="text-red-700">@error('spouse'){{ $message }} @enderror</span>
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                <span class="text-lg text-gray-500">Contact Information</span>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="flex-1 space-y-1">
                        <label class="{{ $errors->has('number') ? 'text-red-700' : 'text-gray-600' }}" for="number">Mobile/Contact Number</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="number" wire:model="number" name="number" type="text" required="number" placeholder="ex. 09123456789" aria-label="Number" value="{{ $alumni->number }}">
                        <span class="text-red-700">@error('number'){{ $message }} @enderror</span>
                    </div>
                    <div class="flex-1 space-y-1">
                        <label class="{{ $errors->has('email') ? 'text-red-700' : 'text-gray-600' }}" for="number">Active Email Address</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="email" wire:model="email" name="email" type="text" required="email" placeholder="john.dave@gmail.com" aria-label="Email" value="{{ $alumni->email }}">
                        <span class="text-red-700">@error('email'){{ $message }} @enderror</span>
                    </div>
                </div>
            </div>
            {{-- Address Information --}}
            <div class="space-y-4">
                <div class="space-y-1">
                    <span class="block text-lg text-zinc-900 font-semibold">Address Information</span>
                    <span class="block text-lg text-gray-500 font-light">Current Address</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 ">
                    <div class="space-y-1">
                        <label class="block {{ $errors->has('current_street') ? 'text-red-700' : 'text-gray-600' }}" for="current_street">House/Apt No., Street, Barangay</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 id="current_street" wire:model="current_street" name="current_street" type="text" required="" placeholder="ex. 69, Lacson Street, Barangay Poblacion" aria-label="cStreet" value="{{ $address->current_street }}">
                        <span class="text-red-700">@error('current_street'){{ $message }} @enderror</span>
                    </div>
                    <div class="space-y-1">
                        <label class="block {{ $errors->has('current_city') ? 'text-red-700' : 'text-gray-600' }}" for="current_city">City/Municipality/Town, Region</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="current_city" wire:model="current_city" name="current_city" type="text" required="" placeholder="City" aria-label="cCity" value="{{ $address->current_city }}">
                        <span class="text-red-700">@error('current_city'){{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-x-4">
                    <div class="space-y-1">
                        <label class="block {{ $errors->has('current_zip_code') ? 'text-red-700' : 'text-gray-600' }}" for="current_zip_code">Zip Code</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="current_zip_code" wire:model="current_zip_code" name="current_zip_code" type="text" required="" placeholder="ex. 6200" aria-label="cZip Code" value="{{ $address->current_zip_code }}">
                        <span class="text-red-700">@error('current_zip_code'){{ $message }} @enderror</span>
                    </div>
                    <div class="space-y-1">
                        <label for="current_country" class="block {{ $errors->has('current_country') ? 'text-red-700' : 'text-gray-600' }}">Country</label>
                        <div class="relative">
                            <select id="current_country" wire:model="current_country" name="current_country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" {{ $address->current_country ? '' : 'selected' }}>Choose a country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->name }}" {{ $address->current_country == $country->name ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4ZM0 9a2 2 0 114 0 2 2 0 01-4 0Zm18 0a2 2 0 0 1-4 0 2 2 0 014 0Z"/>
                                </svg>
                            </div>
                        </div>
                        <span class="text-red-700">@error('current_country'){{ $message }} @enderror</span>
                    </div>
                </div>
            </div>
            <div class="space-y-4">
                <span class="block text-lg text-gray-500 font-light">Home Address</span>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 ">
                    <div class="space-y-1">
                        <label class="block {{ $errors->has('home_street') ? 'text-red-700' : 'text-gray-600' }}" for="home_street">House/Apt No., Street, Barangay</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="home_street" wire:model="home_street" name="home_street" type="text" required="" placeholder="ex. 69, Lacson Street, Barangay Poblacion" aria-label="hStreet" value="{{ $address->home_street }}">
                        <span class="text-red-700">@error('home_street'){{ $message }} @enderror</span>
                    </div>
                    <div class="space-y-1">
                        <label class="block {{ $errors->has('home_city') ? 'text-red-700' : 'text-gray-600' }}" for="home_city">City/Municipality/Town, Region</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="home_city" wire:model="home_city" name="home_city" type="text" required="" placeholder="ex. Dumaguete City, Negros Oriental" aria-label="hCity" value="{{ $address->home_city }}">
                        <span class="text-red-700">@error('home_city'){{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-x-4">
                    <div class="space-y-1">
                        <label class="block {{ $errors->has('home_zip_code') ? 'text-red-700' : 'text-gray-600' }}" for="home_zip_code">Zip Code</label>
                        <input class="bg-gray-50 focus:bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="home_zip_code" wire:model="home_zip_code" name="home_zip_code" type="text" required="" placeholder="ex. 6200" aria-label="hZip Code" value="{{ $address->home_zip_code }}">
                        <span class="text-red-700">@error('home_zip_code'){{ $message }} @enderror</span>
                    </div>
                    <div class="space-y-1">
                        <label class="block {{ $errors->has('home_country') ? 'text-red-700' : 'text-gray-600' }}" for="home_country">Country</label>
                        <div class="relative">
                            <select id="home_country" wire:model="home_country" name="home_country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" {{ $address->home_country ? '' : 'selected' }}>Choose a country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->name }}" {{ $address->home_country == $country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4ZM0 9a2 2 0 114 0 2 2 0 01-4 0Zm18 0a2 2 0 0 1-4 0 2 2 0 014 0Z"/>
                                </svg>
                            </div>
                        </div>
                        <span class="text-red-700">@error('home_country'){{ $message }} @enderror</span>
                    </div>
                </div>
            </div>
            {{-- Educational Attainment --}}
            <div class="space-y-4">
                <div class="space-y-1">
                    <span class="block text-lg text-zinc-900 font-semibold">Educational  Attainment</span>
                    <p class="text-gray-500 font-medium">If you did not finish a whole course at Silliman University please indicate inclusive years attended</p>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="block {{ $errors->has('course') ? 'text-red-700' : 'text-gray-600' }}" for="course">Course/Degree</label>
                    <select id="course" wire:model="course" name="course" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" {{ $education->course ? '' : 'selected' }}>Choose a course</option>
                        @foreach($courses as $courseOption)
                            <option value="{{ $courseOption->name }}" {{ $education->course == $courseOption->name ? 'selected' : '' }}>{{ $courseOption->name }}</option>
                        @endforeach
                    </select>

                    <span class="text-red-700">@error('course'){{ $message }} @enderror</span>
                </div>
                <div class="space-y-1">
                    <label class="{{ $errors->has('year_attended') ? 'text-red-700' : 'text-gray-600' }}" for="year_attended">Year Attended/Graduated</label>
                    <select id="year_attended" wire:model="year_attended" name="year_attended" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" {{ !$education->year_attended ? 'selected' : '' }}>Choose year attended/graduated</option>
                        <option value="2020-2021" {{ $education->year_attended == '2020-2021' ? 'selected' : '' }}>2020-2021</option>
                        <option value="2021-2022" {{ $education->year_attended == '2021-2022' ? 'selected' : '' }}>2021-2022</option>
                        <option value="2022-2023" {{ $education->year_attended == '2022-2023' ? 'selected' : '' }}>2022-2023</option>
                        <option value="2023-2024" {{ $education->year_attended == '2023-2024' ? 'selected' : '' }}>2023-2024</option>
                    </select>
                    <span class="text-red-700">@error('year_attended'){{ $message }} @enderror</span>
                </div>
            </div>
        </div>
        <div class="flex justify-end space-x-4">
            <button class="bg-red-500 hover:bg-red-300 transition duration-300 ease-in text-white border w-24 p-2 rounded-md" type="submit">Submit</button>
        </div>
    </div>
    </div>
    </div>
</form>

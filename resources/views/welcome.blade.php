<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill Up Form</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href='{{ asset('app.css') }}'>
</head>

    <body>
        <section class="vh-100 gradient-custom flex justify-center items-center">
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full p-6">

                <div class="flex justify-between items-start">
                    <img src="{{ asset('Pics/alumniRec.png') }}" alt="Logo" class="mb-4" style="width: 20rem; height: auto; position: relative; top: 1%; left: 2%;">
                    <a href="{{ route('login.show') }}">
                        <button style="font-size:18px;background:white;color:#750000;border:none;width:6rem;border-radius: 10px;">Login <i class="fa fa-sign-in"></i></button>
                    </a>
                </div>

                {{-- <div class="container"> --}}
                <div class="container mx-auto max-w-screen-xxl pt-10">
                    <div class="w-full lg:w-1/2 mt-6 lg:pl-2">
                        <p class="text-xl pb-6 items-center font-bold text-white">
                            SU ALUMNI UPDATE & CLEARANCE FORM <br>
                        </p>

                        <p class="text-lg pb-6 items-center text-white">
                            By filling out this form authorizes the SU Alumni & External Affairs Office to use the information for alumni related purposes only. In compliance with R.A. 10173 (Data Privacy Act).
                            <br> <br> <br>
                            2020 SU-ALUMNI FORM 72-A
                        </p>

                        <form method="POST" action="{{ route('form.store') }}" class="leading-loose">
                            <div class="p-10 bg-white rounded shadow-xl">
                                <p class="text-lg text-gray-800 font-medium pb-4">Personal Information</p>

                                {{-- R1 --}}
                                <div class="inline-block mt-2 w-1/2 pr-1">
                                    <label class=" text-sm text-gray-600" for="last_name">Last Name</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="last_name" name="last_name" type="text" required="last_name" placeholder="Last Name" aria-label="Name">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class=" text-sm text-gray-600" for="first_name">First Name</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="first_name" name="first_name" type="text" required="first_name" placeholder="First Name" aria-label="Name">
                                </div>

                                {{-- R2 --}}
                                <div class="inline-block mt-2 w-1/2 pr-1">
                                    <label class=" text-sm text-gray-600" for="middle_name">Middle Name</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="middle_name" name="middle_name" type="text" required="middle_name" placeholder="Middle Name" aria-label="Name">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class=" text-sm text-gray-600" for="birthdate">Birthdate</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="birthdate" name="birthdate" type="text" required="birthdate" placeholder="MM / DD / YYYY" aria-label="Birth">
                                </div>

                                {{-- R3  --}}
                                <div class="inline-block mt-2 w-1/2 pr-1">
                                    <label class=" text-sm text-gray-600" for="sex">Sex</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="sex" name="sex" type="text" required="sex" placeholder="Sex" aria-label="Sex">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class=" text-sm text-gray-600" for="nationality">Nationality</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="nationality" name="nationality" type="text" required="nationality" placeholder="Nationality" aria-label="Nationality">
                                </div>

                                {{-- R4  --}}
                                <div class="inline-block mt-2 w-1/2 pr-1">
                                    <label class=" text-sm text-gray-600" for="status">Civil Status</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="status" name="status" type="text" required="status" placeholder="Civil Status" aria-label="Status">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class=" text-sm text-gray-600" for="spouse">Spouse Name</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="spouse" name="spouse" type="text" required="spouse" placeholder="Spouse Name" aria-label="Spouse">
                                </div>

                                {{-- R5  --}}
                                <div class="inline-block mt-2 w-1/2 pr-1">
                                    <label class=" text-sm text-gray-600" for="number">Mobile/Contact Number</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="number" name="number" type="text" required="number" placeholder="Contact Number" aria-label="Number">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class=" text-sm text-gray-600" for="email">Active Email Address</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="email" placeholder="Email" aria-label="Email">
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" style="font-size:18px;background:#750000;color:white;border:white;width:6rem;border-radius: 10px; border: 2px solid white; font-weight: bold;">SUBMIT</button>
                            </div>
                        </form>

                        <br>

                        {{-- Address Information --}}
                        <div class="leading-loose">
                            <div class="p-10 bg-white rounded shadow-xl">
                                <p class="text-lg text-gray-800 font-medium pb-4">Address Information</p>
                                <p class="text-lg text-gray-800 font-light pb-4">Current Address</p>

                                <div class="mt-2">
                                    <label class=" block text-sm text-gray-600" for="address">Address</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="address" name="address" type="text" required="" placeholder="Street" aria-label="cStreet">
                                </div>
                                <div class="mt-2">
                                    <label class="hidden text-sm text-gray-600" for="city">City</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="city" name="city" type="text" required="" placeholder="City" aria-label="cCity">
                                </div>
                                <div class="inline-block mt-2 w-1/2 pr-1">
                                    <label class="hidden text-sm text-gray-600" for="country">Country</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="country" name="country" type="text" required="" placeholder="Country" aria-label="cCountry">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class="hidden text-sm text-gray-600" for="zipcode">Zip Code</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="zipcode"  name="zipcode" type="text" required="" placeholder="Zip Code" aria-label="cZip Code">
                                </div>
                                <br>
                                <br>

                                <p class="text-lg text-gray-800 font-light pb-4">Home Address</p>

                                <div class="mt-2">
                                    <label class=" block text-sm text-gray-600" for="address">Address</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="address" name="address" type="text" required="" placeholder="Street" aria-label="hStreet">
                                </div>
                                <div class="mt-2">
                                    <label class="hidden text-sm text-gray-600" for="city">City</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="city" name="city" type="text" required="" placeholder="City" aria-label="hCity">
                                </div>
                                <div class="inline-block mt-2 w-1/2 pr-1">
                                    <label class="hidden text-sm text-gray-600" for="country">Country</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="country" name="country" type="text" required="" placeholder="Country" aria-label="cCountry">
                                </div>
                                <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                                    <label class="hidden text-sm text-gray-600" for="zipcode">Zip Code</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="zipcode"  name="zipcode" type="text" required="" placeholder="Zip Code" aria-label="hZip Code">
                                </div>

                            </div>
                        </div>

                        <br>
                        {{-- Educational Attainment --}}
                        <div class="leading-loose">
                            <div class="p-10 bg-white rounded shadow-xl">
                                <p class="text-lg text-gray-800 font-medium pb-4">Educational Attainment</p>
                                <p class="text-sm text-gray-800 font-light pb-4">If you did not finish a whole course at Silliman University please indicate inclusive years attended</p>

                                <div class="mt-2">
                                    <label class=" block text-sm text-gray-600" for="course">Course/Degree</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="course" name="course" type="text" required="" placeholder="Bachelor of ..." aria-label="Course">
                                </div>
                                <div class="mt-2">
                                    <label class="text-sm text-gray-600" for="attendGrad">Year Attended/Graduated</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="attendGrad" name="attendGrad" type="text" required="" placeholder="SY" aria-label="attendedGraduated">
                                </div>

                                <br>
                                <br>

                                <div class="mt-2">
                                    <label class=" block text-sm text-gray-600" for="course">Course/Degree</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="course" name="course" type="text" required="" placeholder="Bachelor of ..." aria-label="Course">
                                </div>
                                <div class="mt-2">
                                    <label class="text-sm text-gray-600" for="attendGrad">Year Attended/Graduated</label>
                                    <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="attendGrad" name="attendGrad" type="text" required="" placeholder="SY" aria-label="attendedGraduated">
                                </div>
                            </div>
                        </div>

                        <br><br>

                    </div>

                </div>
            </main>

            <footer class="w-full bg-white text-right p-4">
                Silliman University Alumni Records.
            </footer>
        </div>
        </section>

        <script>
            // Initialization for ES Users
            import { Input, Ripple, initMDB } from "mdb-ui-kit";

            initMDB({ Input, Ripple });
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="js/my-login.js"></script>



    </body>


</html>

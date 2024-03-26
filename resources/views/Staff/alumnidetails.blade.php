<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

  <title>Records</title>

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    {{-- -- --}}
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href='{{ asset('app.css') }}'>

</head>


<body class="bg-gray-100 font-family-karla flex">

  <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{ route('dashboard') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
          <img src="{{ asset('Pics/alumniRec.png') }}" alt="Logo" class="h-auto w-auto">
        </a>
    </div>

    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
          <i class="fas fa-tachometer-alt mr-3"></i>
          Dashboard
        </a>
        <a href="{{ route('records') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            Records
        </a>
        <a href="{{ route('reports') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            Reports
        </a>
        </nav>
        <a href="#" class="absolute w-full userWel bottom-0 flex items-center justify-center py-4">
            username, Welcome!
        </a>
  </aside>

  <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="DeskHeader w-full items-center py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                <button x-show="isOpen" @click="is Open = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link">Account</a>
                    <a href="{{ route('logout.perform') }}" class="block px-4 py-2 account-link">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
                <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
                    <div class="flex items-center justify-between">
                        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
                        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                            <i x-show="!isOpen" class="fas fa-bars"></i>
                            <i x-show="isOpen" class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- Dropdown Nav -->
                    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                        <a href="{{ route('dashboard') }}" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                        <a href="{{ route('records') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                            <i class="fas fa-sticky-note mr-3"></i>
                            Records
                        </a>
                        <a href="{{ route('reports') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                            <i class="fas fa-table mr-3"></i>
                            Reports
                        </a>
                        <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                            <i class="fas fa-user mr-3"></i>
                            Account
                        </a>
                        <a href="{{ route('logout.perform') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Sign Out
                        </a>
                        <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                            username, Welcome!
                        </button>
                    </nav>
                    <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                        <i class="fas fa-plus mr-3"></i> New Report
                    </button> -->
                </header>
        {{-- ^responsiveness --}}


        {{-- MAIN BODY --}}
    <div class="overflow-y-auto">
        <br><br>
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl">
                    <p class="text-lg text-gray-800 font-medium pb-4">Personal Information</p>

                    {{-- R1 --}}
                    <div class="inline-block mt-2 w-1/2 pr-1">
                        <label class=" text-sm text-gray-600" for="cus_name">Last Name</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_name" name="cus_name" type="text" required="" placeholder="Last Name" aria-label="Name">
                    </div>
                    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                        <label class=" text-sm text-gray-600" for="cus_name">First Name</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_name" name="cus_name" type="text" required="" placeholder="First Name" aria-label="Name">
                    </div>

                    {{-- R2 --}}
                    <div class="inline-block mt-2 w-1/2 pr-1">
                        <label class=" text-sm text-gray-600" for="cus_name">Middle Name</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_name" name="cus_name" type="text" required="" placeholder="Middle Name" aria-label="Name">
                    </div>
                    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                        <label class=" text-sm text-gray-600" for="birth">Birthdate</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="birth" name="birth" type="text" required="" placeholder="MM / DD / YYYY" aria-label="Birth">
                    </div>

                    {{-- R3  --}}
                    <div class="inline-block mt-2 w-1/2 pr-1">
                        <label class=" text-sm text-gray-600" for="sex">Sex</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="sex" name="sex" type="text" required="" placeholder="Sex" aria-label="Sex">
                    </div>
                    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                        <label class=" text-sm text-gray-600" for="natio">Nationality</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="natio" name="natio" type="text" required="" placeholder="Nationality" aria-label="Nationality">
                    </div>

                    {{-- R4  --}}
                    <div class="inline-block mt-2 w-1/2 pr-1">
                        <label class=" text-sm text-gray-600" for="status">Civil Status</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="status" name="status" type="text" required="" placeholder="Civil Status" aria-label="Status">
                    </div>
                    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                        <label class=" text-sm text-gray-600" for="spouse">Spouse Name</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="spouse" name="spouse" type="text" required="" placeholder="Spouse Name" aria-label="Spouse">
                    </div>

                    {{-- R5  --}}
                    <div class="inline-block mt-2 w-1/2 pr-1">
                        <label class=" text-sm text-gray-600" for="number">Mobile/Contact Number</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="number" name="number" type="text" required="" placeholder="Contact Number" aria-label="Number">
                    </div>
                    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                        <label class=" text-sm text-gray-600" for="email">Active Email Address</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Email" aria-label="Email">
                    </div>

                </form>
            </div>
        <br>
            {{-- Address Information --}}
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl">

                <p class="text-lg text-gray-800 font-medium pb-4">Address Information</p>
                <p class="text-lg text-gray-800 font-light pb-4">Current Address</p>

                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="cus_email">Address</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Street" aria-label="cStreet">
                    </div>
                    <div class="mt-2">
                        <label class="hidden text-sm text-gray-600" for="cus_email">City</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="City" aria-label="cCity">
                    </div>
                    <div class="inline-block mt-2 w-1/2 pr-1">
                        <label class="hidden text-sm text-gray-600" for="cus_email">Country</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Country" aria-label="cCountry">
                    </div>
                    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                        <label class="hidden text-sm text-gray-600" for="cus_email">Zip</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"  name="cus_email" type="text" required="" placeholder="Zip" aria-label="cZip">
                    </div>
                    <br>
                    <br>

                <p class="text-lg text-gray-800 font-light pb-4">Home Address</p>

                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="cus_email">Address</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Street" aria-label="hStreet">
                    </div>
                    <div class="mt-2">
                        <label class="hidden text-sm text-gray-600" for="cus_email">City</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="City" aria-label="hCity">
                    </div>
                    <div class="inline-block mt-2 w-1/2 pr-1">
                        <label class="hidden text-sm text-gray-600" for="cus_email">Country</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" required="" placeholder="Country" aria-label="cCountry">
                    </div>
                    <div class="inline-block mt-2 -mx-1 pl-1 w-1/2">
                        <label class="hidden text-sm text-gray-600" for="cus_email">Zip</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"  name="cus_email" type="text" required="" placeholder="Zip" aria-label="hZip">
                    </div>

                </form>
            </div>
        <br>
            {{-- Educational Attainment --}}
            <div class="leading-loose">
                <form class="p-10 bg-white rounded shadow-xl">

                <p class="text-lg text-gray-800 font-medium pb-4">Educational Attainment</p>
                <p class="text-sm text-gray-800 font-light pb-4">If you did not finish a whole course at Silliman University please indicate inclusive years attended</p>

                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="cus_email">Course/Degree</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="course" name="course" type="text" required="" placeholder="Bachelor of ..." aria-label="Course">
                    </div>
                    <div class="mt-2">
                        <label class="text-sm text-gray-600" for="cus_email">Year Attended/Graduated</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="attendGrad" name="attendGrad" type="text" required="" placeholder="SY" aria-label="attendedGraduated">
                    </div>

                    <br>
                    <br>

                    <div class="mt-2">
                        <label class=" block text-sm text-gray-600" for="cus_email">Course/Degree</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="course" name="course" type="text" required="" placeholder="Bachelor of ..." aria-label="Course">
                    </div>
                    <div class="mt-2">
                        <label class="text-sm text-gray-600" for="cus_email">Year Attended/Graduated</label>
                        <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="attendGrad" name="attendGrad" type="text" required="" placeholder="SY" aria-label="attendedGraduated">
                    </div>

                </form>
            </div>

            <br><br>
            <div class="flex justify-center">
                <button style="font-size:18px;background:#750000;color:white;border:white;width:6rem;border-radius: 10px; border: 2px solid white; font-weight: bold;">SUBMIT</button>
            </div>
    </div>



  </div>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>


<script>
  $('#table1').DataTable({})
</script>


</body>



</html>


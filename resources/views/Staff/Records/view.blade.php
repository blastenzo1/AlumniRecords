<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <title>View Record</title>

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href='{{ asset('app.css') }}'>
    <script src="https://kit.fontawesome.com/84e2199ce0.js" crossorigin="anonymous"></script>
</head>
<body class="h-min-screen bg-gray-100 font-family-karla flex">
    <aside class="relative bg-sidebar w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="{{ route('dashboard') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
                <img src="{{ asset('Pics/alumniRec.png') }}" alt="Logo" class="h-auto w-auto">
            </a>
        </div>

        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'dashboard') active @endif">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{ route('records') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'records') active @endif">
                <i class="fas fa-sticky-note mr-3"></i>
                Records
            </a>
            <a href="{{ route('chapters') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'chapters') active @endif">
                <i class="fas fa-table mr-3"></i>
                Chapters
            </a>
        </nav>
        <a href="#" class="absolute w-full userWel bottom-0 flex items-center justify-center py-4">
            username, Welcome!
        </a>
    </aside>

    <div class="w-full flex flex-col items-stretch justify-between">
        <div class="w-full flex justify-between items-center bg-white py-4 px-6">
            <div class="flex items-center gap-4">
                <button @click="isOpen = !isOpen" class="text-zinc-900 text-3xl focus:outline-none sm:hidden">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    {{-- <i x-show="isOpen" class="fas fa-times"></i> --}}
                </button>
                <header class="text-xl">All Alumni Records</header>

            </div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="{{ route('accountpage') }}" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="{{ route('logout.perform') }}" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </div>

        <main class="h-fit flex-1 flex flex-col p-4 space-y-4 rounded-lg shadow">
            <div class="bg-white p-4 border border-zinc-300 shadow">
                <header class="text-3xl font-medium">Alumni Information</header>

                <div class="space-y-4">
                    <div class="space-y-2">
                        <span class="text-lg font-semibold">Personal Information</span>
                        <div class="space-y-1 grid grid-cols-1 sm:grid-cols-2">
                            <div class="flex gap-4">
                                <span class="text-zinc-500">Full Name:</span>
                                <p class="text-zinc-900">
                                    {{ $alumni->first_name }} {{ $alumni->middle_name }} {{ $alumni->last_name }}
                                </p>
                            </div>
                            <div class="flex gap-4">
                                <span class="text-zinc-500">Date of Birth:</span>
                                <p class="text-zinc-900">
                                    {{ $alumni->birthdate }}
                                </p>
                            </div>
                            <div class="flex gap-4">
                                <span class="text-zinc-500">Nationality:</span>
                                <p class="text-zinc-900">
                                    {{ $alumni->nationality }}
                                </p>
                            </div>
                            <div class="flex gap-4">
                                <span class="text-zinc-500">Sex:</span>
                                <p class="text-zinc-900">
                                    {{ $alumni->sex }}
                                </p>
                            </div>
                            <div class="flex gap-4">
                                <span class="text-zinc-500">Civil Status:</span>
                                <p class="text-zinc-900">
                                    {{ $alumni->status }}
                                </p>
                            </div>
                            <div class="flex gap-4">
                                <span class="text-zinc-500">Spouse Complete Name:</span>
                                <p class="text-zinc-900">
                                    {{ $alumni->spouse }}
                                </p>
                            </div>
                            <div class="flex gap-4">
                                <span class="text-zinc-500">Mobile/Contact Number:</span>
                                <p class="text-zinc-900">
                                    {{ $alumni->number }}
                                </p>
                            </div>
                            <div class="flex gap-4">
                                <span class="text-zinc-500">Active Email Address:</span>
                                <p class="text-zinc-900">
                                    {{ $alumni->email }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <div class="space-y-0">
                            <span class="text-lg font-semibold">Address Information</span>
                            <div class="text-lg font-medium">Current Address</div>
                        </div>
                        @if ($alumni->address)
                            <div class="space-y-1 grid grid-cols-1">
                                <div class="flex gap-4">
                                    <span class="text-zinc-500">House/Apt No., Street, Barangay:</span>
                                    <p class="text-zinc-900">
                                        {{ $alumni->address->current_street }}
                                    </p>
                                </div>
                                <div class="flex gap-4">
                                    <span class="text-zinc-500">City/Municipality/Town, Region:</span>
                                    <p class="text-zinc-900">
                                        {{ $alumni->address->current_city }}
                                    </p>
                                </div>
                                <div class="flex gap-4">
                                    <span class="text-zinc-500">Postal Code:</span>
                                    <p class="text-zinc-900">
                                        {{ $alumni->address->current_zip_code }}
                                    </p>
                                </div>
                                <div class="flex gap-4">
                                    <span class="text-zinc-500">Country:</span>
                                    <p class="text-zinc-900">
                                        {{ $alumni->address->current_country }}
                                    </p>
                                </div>
                            </div>
                        @else
                            <p>No current address information available.</p>
                        @endif

                        <div class="space-y-0">
                            <div class="text-lg font-medium">Home Address</div>
                        </div>
                        @if ($alumni->address)
                            <div class="space-y-1 grid grid-cols-1">
                                <div class="flex gap-4">
                                    <span class="text-zinc-500">House/Apt No., Street, Barangay:</span>
                                    <p class="text-zinc-900">
                                        {{ $alumni->address->home_street }}
                                    </p>
                                </div>
                                <div class="flex gap-4">
                                    <span class="text-zinc-500">City/Municipality/Town, Region:</span>
                                    <p class="text-zinc-900">
                                        {{ $alumni->address->home_city }}
                                    </p>
                                </div>
                                <div class="flex gap-4">
                                    <span class="text-zinc-500">Postal Code:</span>
                                    <p class="text-zinc-900">
                                        {{ $alumni->address->home_zip_code }}
                                    </p>
                                </div>
                                <div class="flex gap-4">
                                    <span class="text-zinc-500">Country:</span>
                                    <p class="text-zinc-900">
                                        {{ $alumni->address->home_country }}
                                    </p>
                                </div>
                            </div>
                        @else
                            <p>No home address information available.</p>
                        @endif
                    </div>


                    <div class="space-y-2">
                        <div class="space-y-0">
                            <span class="text-lg font-semibold">Educational Attainment</span>
                        </div>
                        @if ($alumni->educationAttainment)
                            <div class="space-y-1 grid grid-cols-1">
                                <div class="flex gap-4">
                                    <span class="text-zinc-500">Course/Degree:</span>
                                    <p class="text-zinc-900">
                                        {{ $alumni->educationAttainment->course }}
                                    </p>
                                </div>
                                <div class="flex gap-4">
                                    <span class="text-zinc-500">Year Attended/Graduated:</span>
                                    <p class="text-zinc-900">
                                        {{ $alumni->educationAttainment->year_attended}}
                                    </p>
                                </div>
                            </div>
                        @else
                            <p>No education attainment information available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </main>

        <footer class="w-full bg-white text-right p-4">
            Silliman University Alumni Records.
        </footer>
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


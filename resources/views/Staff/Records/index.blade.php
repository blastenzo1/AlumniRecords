<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <title>Records</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/silliman.png') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
    <script src="https://kit.fontawesome.com/84e2199ce0.js" crossorigin="anonymous"></script>
</head>
<body class="relative bg-gray-100 font-family-karla flex">
    <aside class="fixed left-0 top-0 h-screen bg-sidebar w-64 hidden sm:block shadow-xl">
        @include('Layouts.staff-sidebar')
    </aside>

    <div class="sm:ml-64 w-full flex flex-col items-stretch justify-between h-screen">
        <div class="w-full bg-white py-4 px-6">
            <div class="flex justify-between items-center">
                <div x-data="{ isOpenMenu: false }" class="flex items-center gap-4">
                    <button @click="isOpenMenu = !isOpenMenu" class="text-zinc-900 text-3xl sm:hidden">
                        <i x-show="!isOpenMenu" class="fas fa-bars" alt="menu"></i>
                    </button>
                    <button x-show="isOpenMenu" @click="isOpenMenu = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                    <div x-show="isOpenMenu" class="fixed top-0 left-0 bg-red-900 h-screen w-screen z-50">
                        <div class="flex">
                            <div class="flex-none w-60 space-y-6">
                                <div class="p-6">
                                    <a href="{{ route('dashboard') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
                                        <img src="{{ asset('Pics/alumniRec.png') }}" alt="Logo" class="h-auto w-auto">
                                    </a>
                                </div>

                                <nav class="text-white text-base font-semibold pt-3">
                                    @include('Layouts.staff-nav-menu')
                                </nav>
                            </div>
                            <div class="flex-1 h-screen bg-black opacity-50"></div>
                        </div>
                    </div>
                    <header class="text-xl whitespace-nowrap">All Alumni Records</header>
                </div>
                <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                    <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                        <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                    </button>
                    <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                    <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                        <a href="{{ route('logout.perform') }}" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                    </div>
                </div>
            </div>
        </div>

        <main class="flex-1 flex flex-col p-4 space-y-4 rounded-lg shadow">
            <div class="flex-none h-16 bg-white dark:bg-gray-900 rounded-md p-2">
                <div class="flex items-center justify-between gap-4">
                    <form class="form-inline my-lg-0" method="get" action="{{ route('search-record') }}">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none pl-3">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="table-search" class="block py-2 px-2 ps-10 pl-10 text-sm text-gray-900 border border-gray-300 rounded w-full sm:w-80 bg-gray-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" name="query" placeholder="Search Alumni">
                        </div>
                    </form>
                    <div class="flex items-center gap-4">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="border border-gray-500 text-gray-500 bg-white-700 hover:bg-white-800 focus:ring-4 focus:outline-none focus:ring-white-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-white-600 dark:hover:bg-white-700 dark:focus:ring-white-800" type="button">Export<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ url('/alumni-export') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Export as CSV</a>
                            </li>
                            <li>
                                <a href="{{ url('generate-pdf') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Export as PDF</a>
                            </li>
                        </div>
                        <a href="{{ url('/add-record') }}" class="font-semibold text-white bg-red-600 hover:bg-red-500 text-sm p-2 rounded transition ease-in duration-300">Add Record</a>
                    </div>
                </div>
            </div>


            @if (session('success'))
                <div class="bg-green-500 p-6 rounded text-white">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 p-6 rounded text-white">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex-1 shadow-md rounded-md overflow-x-auto">
                <table id="test" class="w-full text-sm text-left rtl:text-right text-gray-500 p-4">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                        <tr class="">
                            <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable('full_name')">
                                <div class="flex items-center gap-x-4 ">
                                    <span>Full Name</span>
                                    <div class="grid gris-cols-1">
                                        <i class="fa-solid fa-caret-up"></i>
                                        <i class="fa-solid fa-caret-down"></i>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable('email')">
                                <div class="flex items-center gap-x-4 ">
                                    <span>Email</span>
                                    <div class="grid gris-cols-1">
                                        <i class="fa-solid fa-caret-up"></i>
                                        <i class="fa-solid fa-caret-down"></i>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable('number')">
                                <div class="flex items-center gap-x-4 ">
                                    <span>Mobile/Contact Number</span>
                                    <div class="grid gris-cols-1">
                                        <i class="fa-solid fa-caret-up"></i>
                                        <i class="fa-solid fa-caret-down"></i>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable('sex')">
                                <div class="flex items-center gap-x-4 ">
                                    <span>Sex</span>
                                    <div class="grid gris-cols-1">
                                        <i class="fa-solid fa-caret-up"></i>
                                        <i class="fa-solid fa-caret-down"></i>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer" onclick="sortTable('nationality')">
                                <div class="flex items-center gap-x-4 ">
                                    <span>Nationality</span>
                                    <div class="grid gris-cols-1">
                                        <i class="fa-solid fa-caret-up"></i>
                                        <i class="fa-solid fa-caret-down"></i>
                                    </div>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer">
                                <span>Date Created</span>
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($alumnis as $alumnus)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 space-y-4 p-12">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $alumnus->last_name }}, {{ $alumnus->first_name }} {{ $alumnus->middle_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $alumnus->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $alumnus->number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $alumnus->sex }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $alumnus->nationality }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $alumnus->created_at }}
                                </td>
                                <td class="px-6 py-4 space-x-2">
                                    <button id="dropdownDefaultButton{{ $alumnus->id }}" data-dropdown-toggle="dropdown{{ $alumnus->id }}" class="text-zinc-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center" type="button">
                                        <i class="fa-solid fa-ellipsis"></i>
                                        </svg>
                                    </button>

                                    <div id="dropdown{{ $alumnus->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton{{ $alumnus->id }}">
                                            <li>
                                                <a href="{{ url('view-record/' . $alumnus->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View Details</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('edit-record/' . $alumnus->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                            {{-- <li>
                                                <button data-modal-target="popup-modal{{ $alumnus->id }}" data-modal-toggle="popup-modal{{ $alumnus->id }}" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" type="button">Delete</button>
                                            </li> --}}
                                        </ul>
                                    </div>

                                    {{-- <div id="popup-modal{{ $alumnus->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        @include('Staff.Records.Modals.delete')
                                    </div> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500 dark:text-white">No Results</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="bg-white p-4">
                {{$alumnis->onEachSide(1)->links()}}
            </div>

        </main>

        <footer class="w-full bg-white text-right p-4">
            Silliman University Alumni Records.
        </footer>
    </div>

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
    <script src="https://rern.github.io/sortable/js/sortable.js"></script>
    <script src="{{ asset('assets/js/sortable-table.js') }}"></script>
</body>
</html>

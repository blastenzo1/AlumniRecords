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
    @vite(['resources/css/app.css','resources/js/app.js'])
    @livewireStyles
    <script src="https://kit.fontawesome.com/84e2199ce0.js" crossorigin="anonymous"></script>
</head>
<body class="h-fit bg-gray-100 font-family-karla flex">
    <aside class="relative bg-sidebar w-64 hidden sm:block shadow-xl bg-red-700">
        @include('Layouts.staff-sidebar')
    </aside>

    <div class="w-full flex flex-col items-stretch justify-between h-screen">
        <div class="w-full bg-white py-4 px-6">
            @include('Layouts.staff-header')
        </div>

        <main class="flex-1 flex flex-col p-4 space-y-4 rounded-lg shadow">
            <div class="flex-none h-16 bg-white dark:bg-gray-900 flex items-center justify-between rounded-md p-2">
                <div class="">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1">
                        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none pl-3">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" id="table-search" class="block py-2 px-2 ps-10 pl-10 text-sm text-gray-900 border border-gray-300 rounded w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                    </div>
                </div>
                <a href="{{ url('/add-record') }}" class="font-semibold text-white bg-red-600 hover:bg-red-500 text-sm p-2 rounded transition ease-in duration-300">Add Record</a>
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

            <div class="flex-1 shadow-md rounded-md">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 p-4">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300">
                        <tr class="">
                            <th scope="col" class="px-6 py-3">
                                Full Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Mobile/Contact Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Sex
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nationality
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach ($alumnis as $alumnus)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 space-y-4 p-12">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $alumnus->first_name }} {{ $alumnus->middle_name }} {{ $alumnus->last_name }}
                                </th>
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
                                <td class="px-6 py-4 space-x-2">
                                    <button id="dropdownDefaultButton{{ $alumnus->id }}" data-dropdown-toggle="dropdown{{ $alumnus->id }}" class="text-zinc-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center" type="button">
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
                                            <li>
                                                <button data-modal-target="popup-modal{{ $alumnus->id }}" data-modal-toggle="popup-modal{{ $alumnus->id }}" class="w-full text-left block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" type="button">Delete</button>
                                            </li>
                                        </ul>
                                    </div>

                                    <div id="popup-modal{{ $alumnus->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        @include('Staff.Records.Modals.delete')
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <nav class="bg-white flex-none flex flex-col md:flex-row h-16 justify-between rounded-md items-center px-2" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                    </li>
                    <li>
                <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                </ul>
            </nav>
        </main>

        {{-- <footer class="w-full bg-white text-right p-4">
            Silliman University Alumni Records.
        </footer> --}}
    </div>

    @livewireScripts
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
    <script>
    $('#table1').DataTable({})
    </script>
</body>
</html>


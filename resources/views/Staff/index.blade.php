<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <title>Dashboard</title>

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
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
            <a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'dashboard') active @endif">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{ route('records') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'records') active @endif">
                <i class="fas fa-sticky-note mr-3"></i>
                Records
            </a>
            <a href="{{ route('reports') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'reports') active @endif">
                <i class="fas fa-table mr-3"></i>
                Reports
            </a>
        </nav>
        <a href="#" class="absolute w-full userWel bottom-0 flex items-center justify-center py-4">
            username, Welcome!
        </a>
    </aside>

    <div class="w-full flex flex-col items-stretch justify-between h-screen overflow-y-hidden">
        <div class="w-full flex justify-between items-center bg-white py-4 px-6">
            <div class="flex items-center gap-4">
                <button @click="isOpen = !isOpen" class="text-zinc-900 text-3xl focus:outline-none sm:hidden">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    {{-- <i x-show="isOpen" class="fas fa-times"></i> --}}
                </button>
                <header class="text-xl">Dashboard</header>

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

        <main class="flex-1 p-4 space-y-4 rounded-lg shadow">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="p-4 flex items-center gap-4 shadow-lg bg-white rounded-md">
                    <img src="{{ asset('Pics/dash-icon.png') }}" alt="Icon" class="w-20 h-auto">
                    <div class="">
                        <span class="block text-red-500 text-3xl">20</span>
                        <div class="block text-zinc-200 text-2xl">Chapters</div>
                    </div>
                </div>
                <div class="p-4 flex items-center gap-4 shadow-lg bg-white rounded-md">
                    <img src="{{ asset('Pics/dash-icon.png') }}" alt="Icon" class="w-20 h-auto">
                    <div class="">
                        <span class="block text-red-500 text-3xl">1900+</span>
                        <div class="block text-zinc-200 text-2xl">Activity Log</div>
                    </div>
                </div>
                <div class="p-4 flex items-center gap-4 shadow-lg bg-white rounded-md">
                    <img src="{{ asset('Pics/dash-icon.png') }}" alt="Icon" class="w-20 h-auto">
                    <div class="">
                        <span class="block text-red-500 text-3xl">50</span>
                        <div class="block text-zinc-200 text-2xl">Courses</div>
                    </div>
                </div>
            </div>

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between pb-4 mb-4 border-b gap-4 border-gray-200 dark:border-gray-700">
                    <div class="flex justify-between">
                        <div class="space-y-4 flex-none w-4/5">
                            <header class="text-lg font-semibold">
                                Distribution of Graduates by Degree/Course
                            </header>
                            <p>This graph depicts the number of graduates from each college at Silliman University by academic year. The data is sourced from official alumni records or database. The vertical bars represent the total count of graduates per college, allowing for a visual comparison of the relative sizes of the graduating classes across different academic units.</p>
                        </div>
                        <div class="flex justify-end flex-1">
                            <button
                                id="dropdownDefaultButton"
                                data-dropdown-toggle="lastDaysdropdown"
                                data-dropdown-placement="bottom"
                                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                type="button">
                                Last 7 days
                                <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                                    </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="column-chart"></div>
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('chart.js') }}"></script>
</body>
</html>

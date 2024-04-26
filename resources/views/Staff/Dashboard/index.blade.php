<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <title>Dashboard</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css','resources/js/app.js', 'resources/js/column-chart.js', 'resources/js/pie-chart.js'])
    <script src="https://kit.fontawesome.com/84e2199ce0.js" crossorigin="anonymous"></script>
</head>
<body class="h-min-screen bg-gray-100 font-family-karla flex">
    <aside class="relative bg-sidebar w-64 hidden sm:block shadow-xl bg-red-700">
        @include('Layouts.staff-sidebar')
    </aside>

    <div class="w-full flex flex-col items-stretch justify-between h-screen overflow-y-hidden">
        <div class="w-full flex-none flex justify-between items-center bg-white py-4 px-6">
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

            <div class="flex gap-4 w-full bg-white">
                @include('Staff.Dashboard.Charts.pie-chart')
                @include('Staff.Dashboard.Charts.column-chart')
            </div>

        </main>

        <footer class="flex-none w-full bg-white text-right p-4">
            Silliman University Alumni Records.
        </footer>
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="{{ asset('column-chart.js') }}"></script>
    <script src="{{ asset('pie-chart.js') }}"></script>
</body>
</html>

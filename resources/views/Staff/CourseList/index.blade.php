<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <title>Courses List</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('assets/images/silliman.png') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
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
                            <div class="flex-1 h-screen bg-black"></div>
                        </div>
                    </div>
                    <header class="text-xl whitespace-nowrap">Course List</header>
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

        <main class="flex-1 flex flex-col p-4 space-y-4 rounded-lg">

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

            <div class="flex-1 relative shadow-md rounded-md overflow-x-auto">
                <div class="">
                    @foreach($groupedCourses as $collegeId => $courses)
                        <div class="bg-white flex items-center border border-zinc-500 p-4 py-6 gap-3 ">
                            {{-- <i class="fa-solid fa-arrow-up-right-from-square"></i> --}}
                            <div class="text-xl">{{ $courses->first()->college->name }}</div>
                        </div>
                        <ul class="bg-zinc-50">
                            @foreach($courses as $course)
                            <form action="{{ route('show_course', ['courseName' => $course->name]) }}" method="GET" id="courseForm{{ $course->id }}">
                                @csrf
                                <div class="flex items-center border border-zinc-500 p-2 px-4 cursor-pointer hover:bg-red-500 hover:text-white" onclick="submitCourseForm({{ $course->id }})">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    <li class="text-xl p-4">{{ $course->name }}</li>
                                </div>
                            </form>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </main>

        {{-- <footer class="w-full bg-white text-right p-4">
            Silliman University Alumni Records.
        </footer> --}}
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
    <script>
        function submitCourseForm(courseId) {
            document.getElementById('courseForm' + courseId).submit();
        }
    </script>
</body>
</html>


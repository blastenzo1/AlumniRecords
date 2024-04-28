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
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href='{{ asset('app.css') }}'>
    <script src="https://kit.fontawesome.com/84e2199ce0.js" crossorigin="anonymous"></script>

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
            <a href="{{ route('chapters') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'chapters') active @endif">
                <i class="fas fa-table mr-3"></i>
                Chapters
            </a>
        </nav>
        <a href="#" class="absolute w-full userWel bottom-0 flex items-center justify-center py-4">
            username, Welcome!
        </a>
    </aside>

    <div class="w-full flex flex-col items-stretch justify-between h-screen">
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
                <button class="font-semibold text-white bg-red-500 text-sm p-2 rounded">Add Record</button>
            </div>
            <div class="flex-1 relative shadow-md rounded-md">
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
                                <td class="px-6 py-4">
                                    <a href="{{ url('view-record/' . $alumnus->id) }}" class=""><i
                                        class="fa-regular fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{$alumnis->onEachSide(1)->links()}}
            </div>
            <nav class="bg-white flex-none flex flex-col md:flex-row h-16 justify-between rounded-md items-center px-2" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $alumnis->firstItem() }}</span> - <span class="font-semibold text-gray-900 dark:text-white">{{ $alumnis->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $alumnis->total() }}</span></span>
                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                    <!-- Previous page link -->
                    @if ($alumnis->onFirstPage())
                        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">@lang('pagination.previous')</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $alumnis->previousPageUrl() }}" rel="prev" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">@lang('pagination.previous')</a>
                        </li>
                    @endif

                    <!-- Pagination elements -->
                    @foreach ($alumnis as $page => $url)
                        @if ($page == $alumnis->currentPage())
                            <li>
                                <a href="{{ $url }}" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    <!-- Next page link -->
                    @if ($alumnis->hasMorePages())
                        <li>
                            <a href="{{ $alumnis->nextPageUrl() }}" rel="next" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">@lang('pagination.next')</a>
                        </li>
                    @else
                        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">@lang('pagination.next')</span>
                        </li>
                    @endif
                </ul>
            </nav>

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


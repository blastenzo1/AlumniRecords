<div class="flex justify-between items-center">
    <div x-data="{ isOpenMenu: false }" class="flex items-center gap-4">
        <button @click="isOpenMenu = !isOpenMenu" class="text-zinc-900 text-3xl ">
            <i x-show="!isOpenMenu" class="fas fa-bars" alt="menu"></i>
        </button>
        <button x-show="isOpenMenu" @click="isOpenMenu = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpenMenu" class="absolute top-0 left-0 bg-red-900 h-screen w-screen z-50">
            <div class="flex">
                <div class="flex-none w-60 space-y-6">
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
            <a href="{{ route('accountpage') }}" class="block px-4 py-2 account-link hover:text-white">Account</a>
            <a href="{{ route('logout.perform') }}" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
        </div>
    </div>
</div>

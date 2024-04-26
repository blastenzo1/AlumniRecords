<div class="flex justify-between items-center">
    <div class="flex items-center gap-4">
        <button @click="isOpen = !isOpen" class="text-zinc-900 text-3xl focus:outline-none sm:hidden">
            <i x-show="!isOpen" class="fas fa-bars"></i>
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

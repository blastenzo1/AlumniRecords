<div>
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
        @auth
            @if (auth()->user()->type === 'Master Admin')
                <a href="{{ route('users') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'users') active @endif">
                    <i class="fas fa-table mr-3"></i>
                    Users
                </a>
            @endif
        @endauth
    </nav>
    <a href="#" class="absolute w-full userWel bottom-0 flex items-center justify-center py-4">
        username, Welcome!
    </a>
</div>

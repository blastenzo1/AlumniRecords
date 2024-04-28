<a href="{{ route('dashboard') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'dashboard') active @endif">
    <i class="fas fa-tachometer-alt mr-3"></i>
    Dashboard
</a>
<a href="{{ route('records') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'records') active @endif">
    <i class="fas fa-sticky-note mr-3"></i>
    Records
</a>
<a href="{{ route('course-list') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'course-list') active @endif">
    <i class="fas fa-sticky-note mr-3"></i>
    Course List
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
<a href="{{ route('activity-log') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item @if(Route::currentRouteName() == 'activity-log') active @endif">
    <i class="fas fa-table mr-3"></i>
    Activity Log
</a>

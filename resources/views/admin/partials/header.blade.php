<nav >
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo">{{ config('app.name') }}</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#"><h5>Settings</h5></a></li>
            <li><a href="#"><h5>Profile</h5></a></li>
            <li><a href="{{ route('admin.logout') }}"><h5>Logout</h5></a></li>
        </ul>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="{{route('home')}}"><i class="material-icons md-55 orange600">store</i></a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                <h3>
                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{ route('admin.dashboard') }}"><i class="material-icons">view_quilt</i> Dashboard <span class="sr-only">(current)</span></a>
                </h3>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}">
                <h3>
                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{route('admin.categories.index')}}"><i class="material-icons">style</i> Categories </a>
                </h3>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}">
                <h3>
                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{route('admin.products.index')}}"><i class="material-icons">local_mall</i> Products </a>
                </h3>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}">
                <h3>
                    <a class="nav-link text-light border border-secondary rounded-lg mr-2" href="{{route('admin.orders.index')}}"><i class="material-icons">shopping_cart</i> Orders </a>
                </h3>
            </li>
            <li class="nav-item">
                <h3>
                    <a class="nav-link text-light border border-secondary rounded-lg" href="{{ route('admin.logout') }}"><i class="material-icons">power_settings_new</i> Logout </a>
                </h3>
            </li>
        </ul>
    </div>
</nav>

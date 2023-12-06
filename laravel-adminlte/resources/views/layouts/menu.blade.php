<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
    <a href="{{ route('products.index') }}" class="nav-link {{ Request::is('products') ? 'active' : '' }}">
        <i class="nav-icon fas fa-shopping-cart"></i>
        <p>Products</p>
    </a>
    @can('change_roles')
        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p>Roles</p>
            </a>
        </li>
        @endcan
</li>

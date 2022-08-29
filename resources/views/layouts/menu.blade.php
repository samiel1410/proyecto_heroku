<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Inicio</p>
    </a>
    @can('campuses.index')
    <a href="{{ route('campuses.index') }}"  class="nav-link {{ Request::is('campuses') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Campus</p>
    </a>
    @endcan


    <a href="{{ route('admin.roles.index') }}"  class="nav-link {{ Request::is('admin.roles.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Lista de Roles</p>
    </a>

    @can('campuses.index')
    <a href="{{ route('admin.users.index') }}"  class="nav-link {{ Request::is('admin.users.index') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Usuarios</p>
    </a>
    @endcan
    @can('bars.index')
    <a href="{{ route('bars.index') }}"  class="nav-link {{ Request::is('bars') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Bares</p>
    </a>
    @endcan

    @can('menus.index')
    <a href="{{ route('menus.index') }}"  class="nav-link {{ Request::is('menus') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Menus</p>
    </a>
    @endcan
    @can('snacks.index')
    <a href="{{ route('snacks.index') }}"  class="nav-link {{ Request::is('snacks') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Snacks</p>
    </a>
    @endcan
    @can('buzons.index')
    <a href="{{ route('buzons.index') }}"  class="nav-link {{ Request::is('buzons') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Buzons</p>
    </a>
    @endcan
    @can('preferencias.index')
    <a href="{{ route('preferencias.index') }}"  class="nav-link {{ Request::is('preferencias') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Preferencias</p>
    </a>
    @endcan
    
</li>

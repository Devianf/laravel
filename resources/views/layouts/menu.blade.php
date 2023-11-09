<li class="side-menus {{ Request::is('home') ? 'desactive' : '' }}">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class=" fas fa-building"></i><span><strong>Menu</strong></span>
    </a>

    <a class="nav-link" href="{{ route('usuarios.index') }}">
        <i class=" fas fa-users"></i><span><strong>Usuarios</strong></span>
    </a>

    <a class="nav-link" href="{{ route('roles.index') }}">
        <i class=" fas fa-user-lock"></i><span><strong>Roles</strong></span>
    </a>

    <a class="nav-link" href="{{ route('excel.BD') }}">
        <i class=" fas fa-file-alt"></i><span><strong>Excel</strong></span>
    </a>

    <a class="nav-link" href="{{ route('filtrar.excel.eliminar') }}">
        <i class=" fas fa-filter"></i><span><strong>Filtrar Excel</strong></span>
    </a>

    <a class="nav-link" href="{{ route('catalogo.index') }}">
        <i class=" fas fa-indent"></i><span><strong>Catalogo</strong></span>
    </a>

    <a class="nav-link" href="{{ route('botones.index')}}">
        <i class=" fas fa-chart-bar"></i><span><strong>Botones</strong></span>
    </a>

    <a class="nav-link" href="{{ route('blogs.index') }}">
        <i class=" fas fa-blog"></i><span><strong>Blogs</strong></span>
    </a>
</li>

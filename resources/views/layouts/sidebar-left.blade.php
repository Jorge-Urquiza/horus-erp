<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('templates/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
            <img src="{{ asset('templates/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span>
                        <span class="mtext">Inicio<img src="{{ asset('templates/vendors/images/coming-soon.png') }}" alt="" width="25"></span>
                    </a>
                </li>
                @can('users.index')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-edit2"></span><span class="mtext">Modulo Administracion</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                            <li><a href="{{ route('roles.index') }}">Roles y permisos</a></li>
                        </ul>
                    </li>
                @endcan
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Modulo inventario</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('products.index') }}">Productos</a></li>
                        <li><a href="{{ route('categories.index') }}">Categorias</a></li>
                        <li><a href="{{ route('brands.index') }}">Marcas</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Modulo Ventas</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="basic-table.html">Basic Tables</a></li>
                        <li><a href="datatable.html">DataTables</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Reportes Ventas</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="basic-table.html">Basic Tables</a></li>
                        <li><a href="datatable.html">DataTables</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Modulo Configuracion</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('/log-viewer') }}" target="_blank" >Log viewer</a></li>
                        <li><a href="{{ route('binnacles.index') }}">Bitacora</a></li>
                    </ul>
                </li>
                <li>
                    <a href="https://dropways.github.io/deskapp-free-single-page-website-template/" target="_blank" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-paper-plane1"></span>
                        <span class="mtext">Landing Page <img src="{{ asset('templates/vendors/images/coming-soon.png') }}" alt="" width="25"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('templates/vendors/images/logotipo.PNG') }}" alt="" class="dark-logo">
            <img src="{{ asset('templates/vendors/images/logo.PNG') }}" alt="" class="light-logo">
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
                        <span class="mtext">Inicio</span>
                    </a>
                </li>
                @can('users.index')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-user1"></span><span class="mtext">Modulo Administracion</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                            <li><a href="{{ route('roles.index') }}">Roles y permisos</a></li>
                            <li><a href="{{ route('branch-offices.index') }}">Sucursales</a></li>
                            <li><a href="#">Ciudades</a></li>
                        </ul>
                    </li>
                @endcan
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-notepad-1"></span><span class="mtext">Modulo inventario</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('products.index') }}">Productos</a></li>
                        <li><a href="{{ route('categories.index') }}">Categorias</a></li>
                        <li><a href="{{ route('brands.index') }}">Marcas</a></li>
                        <li><a href="{{ route('units.index') }}">Unidades de Medidas</a></li>
                        <li><a href="{{ route('suppliers.index') }}">Proveedores</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
<<<<<<< HEAD
                        <span class="micon dw dw-money-1"></span><span class="mtext">Modulo Ventas</span>
=======
                        <span class="micon dw ion-social-usd-outline"></span><span class="mtext">Modulo Ventas</span>
>>>>>>> 03b0b3645c90a15d81637cfdac8d0ff308fb8358
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('customers.index') }}">Ventas</a></li>
                        <li><a href="{{ route('customers.index') }}">Clientes</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
<<<<<<< HEAD
=======
                        <span class="micon dw fi-graph-trend"></span><span class="mtext">Reportes Ventas</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="basic-table.html">Basic Tables</a></li>
                        <li><a href="datatable.html">DataTables</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
>>>>>>> 03b0b3645c90a15d81637cfdac8d0ff308fb8358
                        <span class="micon dw dw-settings2"></span><span class="mtext">Modulo Configuracion</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('/log-viewer') }}" target="_blank" >Log viewer</a></li>
                        <li><a href="{{ route('binnacles.index') }}">Bitacora</a></li>
                    </ul>
                </li>
                <li>
<<<<<<< HEAD
                    <a href="#" target="_blank" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-logout1"></span>
                        <span class="mtext">Cerrar Sesión</span>
=======
                    <a href="#" class="dropdown-toggle no-arrow" onclick="$('#form-logout').submit();">
                        <span class="micon dw dw-logout"></span>
                        <span class="mtext">Cerrar Sesion</span>
>>>>>>> 03b0b3645c90a15d81637cfdac8d0ff308fb8358
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

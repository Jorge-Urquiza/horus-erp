<div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('templates/vendors/images/logotipo.png') }}" alt="" class="dark-logo">
            <img src="{{ asset('templates/vendors/images/logo.png') }}" alt="" class="light-logo">
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
                @can('administracion.index')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-user1"></span><span class="mtext">Administracion</span>
                        </a>
                        <ul class="submenu">
                            @can('users.index')
                            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                            @endcan
                            @can('rols.index')
                            <li><a href="{{ route('roles.index') }}">Roles y permisos</a></li>
                            @endcan
                            @can('branch-offices.index')
                            <li><a href="{{ route('branch-offices.index') }}">Sucursales</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('inventario.index')
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-notepad-1"></span><span class="mtext">Inventario</span>
                    </a>
                    <ul class="submenu">
                        @can('productos.index')
                        <li><a href="{{ route('products.index') }}">Productos</a></li>
                        @endcan
                        @can('categorias.index')
                        <li><a href="{{ route('categories.index') }}">Categorias</a></li>
                        @endcan
                        @can('brands.index')
                        <li><a href="{{ route('brands.index') }}">Marcas</a></li>
                        @endcan
                        @can('units.index')
                        <li><a href="{{ route('units.index') }}">Unidades de Medidas</a></li>
                        @endcan
                        @can('suppliers.index')
                        <li><a href="{{ route('suppliers.index') }}">Proveedores</a></li>
                        @endcan
                        @can('branch-products.index')
                        <li><a href="{{ route('branch-products.index') }}">Sucursal Producto</a></li>
                        @endcan
                        @can('incomes.index')
                        <li><a href="{{ route('incomes.index') }}">Nota Ingreso</a></li>
                        @endcan
                        @can('outputs.index')
                        <li><a href="{{ route('outputs.index') }}">Nota Salida</a></li>
                        @endcan
                        @can('transfers.index')
                        <li><a href="{{ route('transfers.index') }}">Nota Traspaso</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('venta.index')
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-money-1"></span><span class="mtext">Ventas</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('sales.index') }}">Listar</a></li>
                        <li><a href="{{ route('sales.create') }}">Crear</a></li>
                        @can('customers.index')
                        <li><a href="{{ route('customers.index') }}">Clientes</a></li>
                        @endcan
                        @can('stocks.index')
                        <li><a href="{{ route('products.stock') }}">Stock de Producto</a></li>
                        @endcan
                        @can('reports.index')
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle">
                                <span class="micon fa fa-info"></span><span class="mtext">Reportes</span>
                            </a>
                            <ul class="submenu child">
                                <li><a href="{{ route('report.sale.date') }}">Reporte de Ventas Completadas</a></li>
                                <li><a href="{{ route('report.sale.date.cancel') }}">Reporte de Ventas Anuladas</a></li>
                            </ul>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @role('Admin')
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-settings2"></span><span class="mtext">Seguridad</span>
                        </a>
                        <ul class="submenu">
                            @can('log.index')
                            <li><a href="{{ url('/log-viewer') }}" target="_blank" >Log viewer</a></li>
                            @endcan
                            @can('bitacora.index')
                            <li><a href="{{ route('backup') }}">Generar Copia de Seguridad</a></li>
                            <li><a href="{{ route('binnacles.index') }}">Bitacora</a></li>
                            @endcan
                        </ul>
                    </li>
                @endrole
                <li>
                    <a href="#" onclick="$('#form-logout').submit();" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-logout1"></span>
                        <span class="mtext">Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

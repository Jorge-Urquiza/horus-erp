<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>
        <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Buscar">

                </div>
            </form>
        </div>
    </div>
    <div class="header-right">
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                    <span class="badge notification-active"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('templates/vendors/images/img.jpg') }}" alt="">
                                    <h3>John Doe</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ asset('templates/vendors/images/photo1.jpg') }}" alt="">
                    </span>
                    <span class="user-name">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Perfil</a>
                    <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Configuracion</a>
                    <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Ayuda</a>
                    <a class="dropdown-item" href="#" onclick="$('#form-logout').submit();"><i class="dw dw-logout"></i> Cerrar sesion</a>
                </div>
            </div>
        </div>
        
    </div>

    <form id="form-logout" action="{{ route('logout') }}" method="post">
        @csrf
    </form>

</div>

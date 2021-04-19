<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.loader')

    @include('layouts.header')

    @include('layouts.sidebar-left')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                @yield('title')
			</div>

            <div class="pd-20 card-box mb-30">
                @include('flash::message')
                @yield('content')
            </div>
        </div>

	</div>
	<!-- js -->
	<script src="{{ asset('templates/vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('templates/vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('templates/vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('templates/vendors/scripts/layout-settings.js') }}"></script>


         <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="ht`tps://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
         -->

	<!-- add sweet alert js & css in footer -->
	<script src="{{ asset('templates/src/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/sweetalert2/sweet-alert.init.js') }}"></script>
    @stack('scripts')
</body>
</html>

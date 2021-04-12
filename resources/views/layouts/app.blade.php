<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')
</head>
<body>
    @include('layouts.loader')

    @include('layouts.header')

    @include('layouts.sidebar-left')

    @include('layouts.header')

    
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
    <script src="{{ asset('templates/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
	<!-- buttons for Export datatable -->
	<script src="{{ asset('templates/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/vfs_fonts.js') }}"></script>

    <script src="{{ asset('templates/vendors/scripts/datatable-setting.js') }}"></script>
    
         <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="ht`tps://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
         -->


    @stack('scripts')
</body>
</html>

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

    @include('flash::message')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20">


            <div class="card-box pd-20 height-100-p mb-30">
                @yield('title')
			</div>
            @include('flash::message')

            @yield('content')

        </div>

	</div>
	<!-- js -->
	<script src="{{ asset('templates/vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('templates/vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('templates/vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('templates/vendors/scripts/layout-settings.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('templates/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('templates/vendors/scripts/dashboard.js') }}"></script>

    @stack('scripts')
    <script>
        function confirmSubmit(message = null) {
            const result = confirm(message || 'Está seguro de realizar esta acción?');

            if (result) {
                const buttonSubmit = event.target.querySelector('button[type="submit"]');
                buttonSubmit.disabled = true;
                buttonSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Espere';
            }

            return result;
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ env('APP_NAME') }}</title>
        <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!--Start CSS links-->
        @include('layouts.css_links')
        <!--Start custom CSS-->
        @yield('customStyle')
    </head>

    <body>
        <div class="mainSite">
            @include('layouts.header')
            <div class="mainBody">
				@yield('content')
				@include('layouts.footer')
			</div>
        </div>
        <a class="scrollup" style="display: none;">Scroll</a>
        <!--Start Javascript links-->
        @include('layouts.script_links')
        <script>
            window.setTimeout(function () {
				$(".alert-success").fadeTo(500, 0).slideUp(500, function () {
					$(this).remove();
				});
			}, 3000);
        </script>
        @yield('customScript')
    </body>
</html>
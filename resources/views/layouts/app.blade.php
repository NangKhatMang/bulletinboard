<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bulletin Board</title>

    <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body id="app">
    <div id="wrapper">
        <div class="container">
            <header class="clearFix">
               <div class="header_left">
                    <ul class="clearFix">
                        <li><h2>SCM Bullletin Board</h2></li>
                        <li><a href="">Users</a></li>
                        <li><a href="">Posts</a></li>
                    </ul>
                </div><!-- /.header_left -->
                <div class="header_right">
                    <ul>
                        <li><a href="">Log out</a></li>
                    </ul>
                </div><!-- /.header_right -->
            </header>
            <div class="content">
                @yield('content')
            </div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.wrapper -->



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

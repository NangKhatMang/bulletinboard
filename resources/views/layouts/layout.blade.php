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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body id="app">
    <div id="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
                <div class="container">
                    <a class="navbar-brand" href="#">SCM Bullletin Board</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @if(Auth::check())
                            <!-- nav left -->
                            <ul class="navbar-nav mr-auto">
                                @if(Auth::user()->type == '0')
                                    <li class="nav-item">
                                        <a class="nav-link" href="/users">Users</a>
                                    </li>
                                @endif
                                @if(Auth::user()->type == '1')
                                    <li class="nav-item">
                                        <a class="nav-link" href="/user/profile/{{Auth::user()->id}}">Profile</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="/posts">Posts</a>
                                </li>
                            </ul><!-- /.nav left -->
                            <!-- nav right -->
                            <ul class="navbar-nav ">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">{{Auth::user()->name}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/user/logout">Logout</a>
                                </li>
                            </ul><!-- /.nav right -->
                        @endif
                    </div>
                </div><!-- /.container -->
            </nav>
        </header>
        <div class="content">
            <div class="container">
                @yield('content')
            </div><!-- /.container -->
        </div><!-- /.content -->
    </div><!-- /.wrapper -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

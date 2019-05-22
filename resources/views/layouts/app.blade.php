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
</head>
<body id="app">
    <div id="wrapper">
        <div class="container">
            <nav class="navbar navbar-expand-lg nav-dark bg-light">
               <a href="#" class=" navbar-brand" >SCM Bullletin Board</a>
               
                    <!-- nav left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="/userList" class="nav-link">Users</a>
                        </li>
                        <li class="nav-item">
                            <a href="/postList" class="nav-link">Posts</a>
                        </li>
                    </ul>
                    <!-- nav right -->
                    
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="#" class="nav-link">User Name</a></li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">Log out</a>
                        </li>
                    </ul>
                  
                
                
            </nav>
            <div class="content">
                @yield('content')
            </div><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.wrapper -->



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

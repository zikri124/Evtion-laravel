<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style>
        .logo{
            height: 70px;
            position:absolute;
            background: none;
        }
        body{
            font-family: 'Lato';
        }
        div.header{
            background-color: #00C3EF;
        }
        a.navbar-brand{
            position: relative;
            left: 80px;
            font-family:'Montserrat', sans-serrif;
            font-size: 30px;
            padding-bottom: 5px;
            background: none;
        }
        a.nav-link{
            color:white;
        }
        a.header{
            background-color: #0095ff;
            color: white;          
        }
        a.control{
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 3px;
            margin-right: 5px;
            margin-top: 10px;
        }
        a.text-white:hover{
            background-color: #0070c1;
        }
        a.logout:hover{
            background-color: #b10707;
        }
        a.nav{
            text-decoration: none;
            color: white;
            margin-left: 15px;
            padding: 10px 10px;
        }
        a.nav:hover{
            background-color: #0596b6;
        }
        
    </style>
</head>

<body>
    @section('header1')
    <div class="header sticky-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img class="logo" src="image/asset/logo.jpeg">
                    <nav class="navbar navbar-light">
                        <a class="navbar-brand" href="/">EVTION</a>
                    </nav>
                </div>
                <div class="col">
                    <div class="position-absolute top-0 end-0">
                    <?php
                    use Illuminate\Support\Facades\Auth;
                    if (Auth::check()) {
                        echo '';
                        echo '<a class="text-white control" href="/profile">Profile</a>';
                        echo '<a class="text-white control" href="/posts">Post-an saya</a>';
                        echo '<a class="text-white control logout" href="/keluar">Keluar</a>';
                    } else {
                        echo '<a class="text-white control" href="/masuk">Masuk</a>';
                        echo '<a class="text-white control" href="/daftar">Daftar</a>';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    @show
    <div class="container">
        @yield('content')
    </div>
</body>
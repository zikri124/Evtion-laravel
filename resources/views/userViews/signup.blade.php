<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <style>
            .logo{
                height: 150px;
                position:absolute;
            }
            body{
               font-family: 'Lato';
            }
            div.header{
               background-color: #00C3EF;
            }
            form.d-flex{
                position: relative;
                left: 50%;
                transform: translate(-50%,10%);
            }
            a.navbar-brand{
                position: relative;
                left: 150px;
                top: 5px;
                font-family:'Montserrat', sans-serrif;
                font-size: 45px;
                margin-top: 25px;
                padding-bottom: 40px;
            }
            a.nav-link{
                color:white;
            }
            h1{
                margin-top: 50px;
                text-align: center;
                margin-bottom: -10px;
                font-size: 45px;
            }
            label{
                position: relative;
                left: 50%;
                margin-top: 10px;
                transform: translate(-50%,0);
            }
            input{
                position: relative;
                left: 50%;
                margin-top: 10px;
                transform: translate(-50%,0);
                padding: 10px;
                border-radius: 8px;
            }
            form input:focus {
                border-color: #00C3EF;
                outline: none;
                transition-duration: 0.4s;
            }
            form input:hover {
                border-color: #00C3EF;
                outline: none;
                transition-duration: 0.4s;
            }
            p{
                position:absolute;
                left: 50%;
                transform: translate(-50%,0);
                margin-top: 20px;
                padding-bottom: 50px;
            }
            button{
                margin-top: 50px;
                position:relative;
                left: 50%;
                transform: translate(-50%,0);
            }
            span{
                position:relative;
                text-align: justify;
                left: 40%;
                transform: translate(-50%,0);
            }
            .input-group{
                max-width: 250px;
                position:relative;
                left: 50%;
                transform: translate(-50%,0);
                padding-bottom: 40px;
            }
    </style>
</head>
<body>
    <div class="header">
        <img class="logo" src="/image/asset/logo.jpeg">
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="/">EVTION</a>
        </nav>
    </div>
    <h1>Daftar</h1><br><br>
    <form action="/daftar" method="POST" enctype="multipart/form-data">
        @csrf
        
        <label>Nama Lengkap User</label><br>
        <input type="text" name="name" placeholder="Name" required><br>
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span><br>
        @endif
        <label>Photo Profile</label><br>
        <div class="input input-group">
            <input type="file" class="form-control" id="file" name="file">
            @if ($errors->has('file'))
                <span class="text-danger">{{ $errors->first('file') }}</span><br>
            @endif
        </div>
        <label>Masukkan Email</label><br>
        <input type="email" name="email" placeholder="Email" required><br>
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span><br>
        @endif
        <label>Masukkan Password</label><br>
        <input type="password" name="password" placeholder="Password" required><br>
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span><br>
        @endif
        <label>Konfirmasi Password</label><br>
        <input type="password" name="cPassword" placeholder="Konfirmasi Password" required><br>
        @if ($errors->has('cPassword'))
            <span class="text-danger">{{ $errors->first('cPassword') }}</span><br>
        @endif
        <button class="btn btn-lg btn-primary" type="submit">Daftar</button><br>
    </form>
    <p><a>Sudah punya akun? <a href="/masuk">Masuk</a></p>
</body>
</html>

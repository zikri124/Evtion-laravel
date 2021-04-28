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
          font-size: 24px;
        }
        input{
          position: relative;
          left: 50%;
          margin-top: 10px;
          transform: translate(-50%,0);
          padding: 10px;
          border-radius: 5px;
        }
        form input:focus {
          background-color: #e6faff;
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
        }
        button{
          margin-top: 50px;
          position:relative;
          left: 50%;
          transform: translate(-50%,0);
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
    <h1>Masuk</h1><br><br>
    <form method="POST" action="/masuk">
        @csrf
        <label>Email</label><br>
        <input type="email" name="email" required><br>
        <label>Password</label><br>
        <input type="password" name="password" required><br>
        <button class="btn btn-lg btn-primary" type="submit">Masuk</button><br>
    </form>
    <p><a>Belum punya akun? <a href="/daftar">Daftar</a></p>
</body>
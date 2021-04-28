<head>
    @extends('layout.header')
    @section('header1')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <style>
        body{
            font-family: 'Lato';
            font-size: 20px;
        }
        p{
            margin-left: 20%;
            margin-top: 2%;
        }
        .profile{
            border-radius: 5px;
            max-width: 180px;
            max-height: 180px;
            margin-bottom: 10px;
            margin-left: 20%;
            margin-top: 5%;
        }
        a.tombol{
            margin-top: 20px;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #0095ff;
            color: white;
            border-radius: 5px;
            position:relative;
            left: 50%;
            transform: translate(-50%,0);
        }
        .kosong{
            padding-bottom: 50px;
            margin
        }
    </style>
</head>
<body>
    @section('content')
    <img class="profile" src="/image/{{ $user->photo }}">
    <p>Nama :   {{ $user->name }}</p>
    <p>Email :  {{ $user->email }}</p>
    <p>Dibuat pada :  {{ $user->created_at }}</p>

    <a class="tombol" href="/profile/ubah">Ubah</a>
    <div class="kosong"></div>
    @endsection
</body>
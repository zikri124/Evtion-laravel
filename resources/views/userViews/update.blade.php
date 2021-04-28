<head>
    @extends('layout.header')
    @section('header1')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <style>
        body{
            font-family: 'Lato';
            margin-left: 5%;
        }
        h4{
            text-align: center;
            margin-left: -5%;
            margin-bottom: 5%;
            font-size: 30px;
            margin-top: 80px;
        }
        input{
            margin-bottom: 10px;
        }
        
    </style>
</head>
<body>
    @section('content')
    <h4>Ubah Profile</h4>
    <p>Perhatian : Isi saja bagian yang kamu ingin diubah</p>
    <form action="/profile/ubah" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="inputName">Nama</label>
            <input type="text" class="form-control" name="name" placeholder="{{ $user->name }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword">Confirm Password</label>
                <input type="password" class="form-control" name="cPassword" placeholder="Confirm Password">
                @if ($errors->has('cPassword'))
                    <span class="text-danger">{{ $errors->first('cPassword') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label for="FormControlFile1">Photo profile</label>
            <input type="file" class="form-control-file" name="file" id="file">
        </div>
        <button type="submit" class="btn btn-primary">Ubah</button>
    </form>
    <a class="btn btn-danger" href="/profile">Kembali</a>
    @endsection
</body>
</html>

@extends('layout.header')
@section('header1')
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Post</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Wadidaw!</strong> Sepertinya Anda salah isi deh.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Poster:</strong>
                    <!-- <textarea class="form-control" style="height:150px" name="photo" placeholder="Photo"></textarea> -->
                    <div class="form-group">
                    <label for="FormControlFile1">
                    <input type="file" class="form-control-file" name="photo" id="photo">
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Caption:</strong>
                    <textarea class="form-control" style="height:150px" name="caption" value="{{ $post->caption }}" placeholder="Caption (Max: 150 Character)">{{ $post->content }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    <!-- <textarea class="form-control" style="height:150px" name="category" placeholder="Category"></textarea> -->
                <div class="form-check">
                <input class="form-check-input" type="radio" name="category" id="category" value="{{ $post->category }}" value="Kesehatan" {{ $post->category }}checked>
                    <label class="form-check-label" for="category">
                    Kesehatan
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="category" id="category" value="Informatika"{{ $post->category }}>
                    <label class="form-check-label" for="category">
                    Informatika
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="category" id="category" value="Sastra"{{ $post->category }}>
                    <label class="form-check-label" for="category">
                    Sastra
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="category" id="category" value="Fotografi"{{ $post->category }}>
                    <label class="form-check-label" for="category">
                    Fotografi
                </label>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection
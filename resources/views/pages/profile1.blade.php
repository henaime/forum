
@extends('layouts.app')

@section('content')

<div class="jumbotron" style="background-color: #FFFFF0">
        <center>
        <div class="parent">
            <img src="/storage/cover.jpg" id="cover" width="728" height="269" class="img-fluid" alt="Responsive image">
            <a href="/profile"><img id="profile" src="/storage/photo.jpg" name="aboutme" width="140" height="140" class="img-circle"></a>
          </div>
        <div>
          <br><br><br>
        @foreach($user['user'] as $u)
        <h3>{{ $u->name }}</h3>
        <h4>{{ $u->email }}</h4>
        <em>welcome to your profile</em>
        @endforeach
		</center>
</div>

@if(auth()->user()->id == $user['id'])
<div class="jumbotron" style="background-color: #FFFFF0">
  <!-- creer un nouveau post -->
  {!! Form::open(['action' => 'postsController@store','method'=>'POST','files'=>'true','enctype'=>'multipart/form-data',]) !!}
    <div class="form-group">
      {{Form::label('title','Titre')}}
      {{Form::text('title','',['class'=>'form-control','placeholder'=>'titre'])}}
    </div>
    <div class="form-group">
      {{Form::label('content','Contenu')}}
      {{Form::textarea('content','',['class'=>'form-control','placeholder'=>'contenu'])}}
    </div>
    <div class="form-group">
    {{Form::file('photo',['class'=>'form-control-file'])}}
  </div>
    {{Form::submit('poster',['class'=>'btn btn-success'])}}
  {!! Form::close() !!}
</div>
@endif
    @foreach($user['posts'] as $post)
     <div class="jumbotron text-left" style="background-color: #FFFFF0">
            <img src="/storage/{{ $post->img }}" id="img">
            <H3><a href="posts/{{$post->id_p}}">{{ $post->title }}</a>
            <small><a href="users/{{$post->id_user}}">(@ {{ auth()->user()->name }} )</a></small>
             </H3>
            <p>{{ $post->contenu }}</p>
            <hr>
        <div>
        <a href="#"><button class="btn btn-success">j'aime </button></a>
        <a href="/posts/{{$post->id_p}}"><button id="send" class="btn btn-primary">commenter</button></a>
        @if(auth()->user()->id == $user['id'])
          <a href="/posts/delete/{{$post->id_p}}"><button class="btn btn-danger">supprimer post</button></a>
        @endif
        </div>
       </div>
      @endforeach

@endsection


<style type="text/css">

  .parent {
      position: relative;
      top: 0;
      left: 0;
    }
    #cover {
      position: relative;
      top: 0;
      left: 0;
    }
    #profile {
      position: absolute;
      top: 200px;
      left: 440px;
    }
</style>


@extends('layouts.app')

@section('content')
<div class="jumbotron" style="background-color: #cdcdcd">

<div class="container">
    <div class="span3 well">
        <center>
        <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="/storage/photo.jpg" name="aboutme" width="140" height="140" class="img-circle"></a>
        <h3>{{ $user['name'] }}</h3>
        <h4>{{ $user['email'] }}</h4>
        <em>welcome to your profile</em>
		</center>
    </div>
</div>
</div>
<div class="jumbotron" style="background-color: #cdcdcd">
  {!! Form::open(['action' => 'postsController@store','method'=>'POST']) !!}
    <div class="form-group">
      {{Form::label('title','Titre')}}
      {{Form::text('title','',['class'=>'form-control','placeholder'=>'titre'])}}
    </div>
    <div class="form-group">
      {{Form::label('content','Contenu')}}
      {{Form::textarea('content','',['class'=>'form-control','placeholder'=>'contenu'])}}
    </div>
    {{Form::submit('poster',['class'=>'btn btn-success'])}}
  {!! Form::close() !!}
</div>
    @foreach($user['posts'] as $post)
     <div class="jumbotron text-left" style="background-color: #cdcdcd">
            <H3><a href="posts/{{$post->id_p}}">{{ $post->title }}</a>
            <small><a href="users/{{$post->id_user}}">(@ {{ auth()->user()->name }} )</a></small>
             </H3>
            <p>{{ $post->contenu }}</p>
            <hr>
        <div>
        <a href="#"><button class="btn btn-success">j'aime </button></a>
        <a href="posts/{{$post->id_p}}"><button class="btn btn-primary">commenter</button></a>
        </div>
       </div>
      @endforeach

@endsection
@extends('layouts.app')

@section('content')


<div class="jumbotron" style="background-color: #F0F0F0">

        <center>
          <div class="parent">
            <img src="../{{$user->cover}}" id="cover" width="728" height="269" class="img-fluid" alt="Responsive image">
            <a href="/profile"><img id="profile" src="../{{$user->image}}" name="aboutme" width="140" height="140" class="img-circle"></a>
          </div>
        <div>
          <br><br><br>
          <h3>{{ $user->name }}</h3>
          <h4>{{ $user->email }}</h4>
          <em>welcome to your profile</em>
          <br><a href="{{url('profile/edit/'.$user->id)}}" class="btn btn-success">Change Profile</a>

        </div>
    </center>

</div>
<div class="jumbotron" style="background-color: #FFFFF0">
  <!-- creer un nouveau post -->
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
    @foreach($posts as $post)
     <div class="jumbotron text-left" style="background-color: #FFFFF0">
            <H3><a href="posts/{{$post->id_p}}">{{ $post->title }}</a>
            <small><a href="users/{{$post->id_user}}">(@ {{ auth()->user()->name }} )</a></small>
             </H3>
            <p>{{ $post->contenu }}</p>
            <hr>
        <div>
        <a href="#"><button class="btn btn-success">j'aime </button></a>
        <a href="/posts/{{$post->id_p}}"><button class="btn btn-primary">commenter</button></a>
        <a href="#"><button class="btn btn-danger">supprimer post</button></a>
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
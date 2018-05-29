
@extends('layouts.app')

@section('content')

<div class="jumbotron" style="background-color: #FFFFF0">
        <center>
          <div class="parent">
            @foreach($user['user'] as $u)
            <img src="../{{$u->cover}}" id="cover" width="728" height="269" class="img-fluid" alt="Responsive image">
            <a href="/profile"><img id="profile" src="../{{$u->image}}" name="aboutme" width="140" height="140" class="img-circle"></a>
          </div>
        <div>
        <div>
          <br><br><br>
        <h3>{{ $u->name }}</h3>
        <h4>{{ $u->email }}</h4>
        <em>welcome to your profile</em>
        @endforeach
		</center>
</div>

@if(auth()->user()->id == $user['id'])
<div class="jumbotron" style="background-color: #FFFFF0">
  	<form class="needs-validation" novalidate>
          <div class="form-row">
            <div class="form-group">
              <input type="text" class="form-control" id="validationCustom01" placeholder="title-here"  required>
                <div class="valid-feedback">
                  post title
                </div>
            </div>
              <div class="form-group">
                <textarea type="text" class="form-control" id="validationCustom02" placeholder="content-here"  required></textarea>
                <div class="valid-feedback">
                  post content
                </div>
              </div>
          </div>
        <div>
      <br>
      <button class="btn btn-primary" type="submit">Submit form</button>
      </div>
  </form>
</div>
@endif
    @foreach($user['posts'] as $post)
     <div class="jumbotron text-left" style="background-color: #FFFFF0">
            <H3><a href="posts/{{$post->id_p}}">{{ $post->title }}</a>
            <small><a href="users/{{$post->id_user}}">(@ {{ auth()->user()->name }} )</a></small>
             </H3>
            <p>{{ $post->contenu }}</p>
            <hr>
        <div>
        <a href="#"><button class="btn btn-success">j'aime </button></a>
        <a href="/posts/{{$post->id_p}}"><button class="btn btn-primary">commenter</button></a>
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

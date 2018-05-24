
@extends('layouts.app')

@section('content')
<div class="jumbotron">

<div class="container">
    <div class="span3 well">
        <center>
        <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="/storage/photo.jpg" name="aboutme" width="140" height="140" class="img-circle"></a>
        @foreach($user['user'] as $u)
        <h3>{{ $u->name }}</h3>
        <h4>{{ $u->email }}</h4>
        <em>welcome to your profile</em>
        @endforeach
		</center>
    </div>
</div>
</div>

@if(auth()->user()->id == $user['id'])
<div class="jumbotron">
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
     <div class="jumbotron text-left">
            <H3><a href="/posts/{{$post->id_p}}">{{ $post->title }}</a>
            <small><a href="/users/{{$post->id_user}}">(@ {{ auth()->user()->name }} )</a></small>
             </H3>
            <p>{{ $post->contenu }}</p>
            <hr>
       </div>
      @endforeach

@endsection


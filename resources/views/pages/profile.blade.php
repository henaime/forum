@extends('layouts.app')

@section('content')
<div class="jumbotron">

<div class="container">
    <div class="span3 well">
        <center>
        <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="http://localhost:8000/storage/photo.jpg" name="aboutme" width="140" height="140" class="img-circle"></a>
        <h3>{{ $user['name'] }}</h3>
        <h4>{{ $user['email'] }}</h4>
        <em>welcome to your profile</em>
		</center>
    </div>
</div>
</div>
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

@endsection
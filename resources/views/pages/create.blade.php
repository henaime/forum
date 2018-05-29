@extends('layouts.app')

@section('content')
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
	    {{Form::file('photo',['class'=>'btn btn-default'])}}
	    {{Form::submit('poster',['class'=>'btn btn-success'])}}
	  {!! Form::close() !!}
	</div>

@endsection
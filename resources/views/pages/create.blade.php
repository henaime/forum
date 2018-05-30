@extends('layouts.app')

@section('content')
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
@endsection
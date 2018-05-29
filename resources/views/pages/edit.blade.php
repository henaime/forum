@extends('layouts.app')

@section('content')

	<div class="jumbotron" style="background-color: #FFFFF0">
  {!! Form::open(['action' => ['postsController@update',$post->id_p],'method'=>'POST']) !!}
    <div class="form-group">
      {{Form::label('title','Titre')}}
      {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'titre'])}}
    </div>
    <div class="form-group">
      {{Form::label('content','Contenu')}}
      {{Form::textarea('content',$post->contenu,['class'=>'form-control','placeholder'=>'contenu'])}}
    </div>
    <input type="hidden" name="_method" value="DELETE">
    {{Form::submit('modifer',['class'=>'btn btn-success'])}}
  {!! Form::close() !!}
</div>

@endsection
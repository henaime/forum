
@extends('layouts.app')

@section('content')
	    <a href="/" class="btn btn-default" id="btn">Go Back</a>
		<div class="jumbotron text-left" style="background-color: white;">
		    <H3>{{ $tab['post']->title }} <small><a href="#">(@ {{ $tab['user']->name }} )</a></small> </H3>
		    <p>{{ $tab['post']->contenu }}</p>
		    <hr>
		    	@if (!Auth::guest())
		    <div>
		    	{!! Form::open(['action' => 'likesController@store','method'=>'POST']) !!}
		    		<input type="hidden" name="id" value="{{ $tab['post']->id_p }}">
			    {{Form::submit('j"aime',['class'=>'btn btn-success'])}}
			  {!! Form::close() !!}
		    	<div class="text-right">
		    	<i>{{$tab['nbr_likes'] }} j'aime(s) {{$tab['nbr'] }} commentaire(s)</i>
		    </div>
		    </div>
			<div>
		 	{!! Form::open(['action' => 'commentsController@store','method'=>'POST']) !!}
		    <div class="form-group">
		    	<input type="hidden" name="id" value="{{ $tab['post']->id_p }}"> 
		      {{Form::text('content','',['class'=>'form-control','placeholder'=>'titre'])}}
		    </div>
		    {{Form::submit('commenter',['class'=>'btn btn-primary'])}}
		  {!! Form::close() !!}
		  </div>
		  @endif
	</div>

		@foreach($tab['comments'] as $comment)
		<div class="jumbotron text-left" style="background-color: white;">
			@foreach($tab['users'] as $user)
				@if($comment->id_us==$user->id)
		   			 <p><a href="#">{{$user->name}}</a> : <small>{{ $comment->contenu }}</small></p>
		   			 <small>{{ $comment->created_at }}</small>
		    	@endif
			@endforeach
		</div>
		@endforeach
@endsection

<style type="text/css">
	#btn{
		position: absolute;
		right: 160px;
	}
</style>

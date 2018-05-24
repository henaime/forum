
@extends('layouts.app')

@section('content')
	    <a href="/" class="btn btn-default" id="btn">Go Back</a>
		<div class="jumbotron text-left">
		    <H3>{{ $tab['post']->title }} <small><a href="#">(@ {{ $tab['user']->name }} )</a></small> </H3>
		    <p>{{ $tab['post']->contenu }}</p>
		    <hr>
		    <div>
		    	<button class="btn btn-success" type="submit">j'aime</button>
		    	<div class="text-right">
		    	<i>{{$tab['nbr_likes'] }} j'aime(s) {{$tab['nbr'] }} commentaire(s)</i>
		    </div>
		    </div>
		    
		 </div>
		 <div class="jumbotron">
  			<form class="needs-validation" novalidate>
		          <div class="form-row">
		            <div class="form-group">
		              <input type="text" class="form-control" id="validationCustom01" placeholder="comment-here"  required>
		            </div>
		      		<button class="btn btn-primary" type="submit">commenter</button>
		          </div>
		  </form>
	</div>

		@foreach($tab['comments'] as $comment)
		<div class="jumbotron text-left">
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

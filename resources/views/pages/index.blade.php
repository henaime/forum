
@extends('layouts.app')

@section('content')
		<div class="jumbotron text-center">
			<h3>GinForum</h3>
		</div>
		<div class="jumbotron text-left">
		@foreach($tab['posts'] as $post)
		    	@foreach($tab['users'] as $user)
		    		@if($user->id==$post->id_user)
		    			<?php $name=$user->name; ?>
		    		@endif
		    	@endforeach

		    		<H4>{{ $post->title }}
		    		<small><a href="#">(@ {{ $name }} )</a></small>
		    		 </H4>
		    		<p>{{ $post->contenu }}</p>
		    		<hr>
    	@endforeach
		    </div>
    {{$tab['posts']->links()}}
@endsection


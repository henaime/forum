
@extends('layouts.app')

@section('content')
		<div class="jumbotron text-center">
			<a href="#"><img src="/storage/ginforum.png"></a>
		</div>
		<div class="jumbotron text-left">
		@foreach($tab['posts'] as $post)
		    	@foreach($tab['users'] as $user)
		    		@if($user->id==$post->id_user)
		    			<?php $name=$user->name;$id=$user->id ?>
		    		@endif
		    	@endforeach

		    		<H3><a href="posts/{{$post->id_p}}">{{ $post->title }}</a>
		    		<small><a href="users/{{$id}}">(@ {{ $name }} )</a></small>
		    		 </H3>
		    		<p>{{ $post->contenu }}</p>
		    		<hr>
    	@endforeach
		    </div>
    {{$tab['posts']->links()}}
@endsection


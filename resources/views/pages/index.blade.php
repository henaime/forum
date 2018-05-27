
@extends('layouts.app')

@section('content')
		<CENTER>
			<a href="#"><img src="/storage/ginforum.png"></a>
		</CENTER>
		@foreach($tab['posts'] as $post)
		<div class="jumbotron text-left" style="background-color: white; ">
		    	@foreach($tab['users'] as $user)
		    		@if($user->id==$post->id_user)
		    			<?php $name=$user->name;$id=$user->id ?>
		    		@endif
		    	@endforeach

		    		<H3><a href="posts/{{$post->id_p}}">{{ $post->title }}</a>
		    		<small><a href="/users/{{$id}}">(@ {{ $name }} )</a></small>
		    		 </H3>
		    		<p>{{ $post->contenu }}</p>
		    		<hr>
		    <div>
		    @if (!Auth::guest())
		    <a href=""><button class="btn btn-success">j'aime </button></a>
		    <a href="posts/{{$post->id_p}}"><button class="btn btn-primary">commenter</button></a>
		    @endif
		    </div>
		   </div>


    	@endforeach
    {{$tab['posts']->links()}}
@endsection


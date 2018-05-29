
@extends('layouts.app')

@section('content')
		<CENTER>
			<a href="#"><img src="/storage/coverAcc.png"></a>
		</CENTER>
		<?php //dd($tab); ?>
		@if($tab['posts']!=null)
		@foreach($tab['posts'] as $post)
		<div class="jumbotron text-left" style="background-color: #FAFBFC; ">
			<!-- cette blog est responsable de recuperer le nom du l'utilisateur qui a poster le post-->
		    	@foreach($tab['users'] as $user)
		    		@if($user->id==$post->id_user)
		    			<?php $name=$user->name;$id=$user->id ?>
		    		@endif
		    	@endforeach
		    	<!-- afficher le post-->
		    	<div>
					<img src="/storage/{{ $post->img }}" id="img">
		    		<H3><a href="posts/{{$post->id_p}}">{{ $post->title }}</a>
		    		<small><a href="/users/{{$id}}">(@ {{ $name }} )</a></small>
		    		 </H3>
		    		<p>{{ $post->contenu }}</p>
		    	</div>
		    		<hr>
		    		<!-- recuperer le  nombre de j'aimes et commentaires de chaque post-->
		    		@foreach($tab['nbr_likes'] as $index => $nbr_likes)
		    			@if($index==$post->id_p)
			    		<div class="text-right">
			    			<?php $likes= $nbr_likes;  ?>
					    </div>
					    @endif
				    @endforeach
				    @foreach($tab['nbr_comments'] as $index => $nbr_comments)
		    			@if($index==$post->id_p)
			    		<div class="text-right">
			    			<?php $comments= $nbr_comments;  ?>
					    </div>
					    @endif
				    @endforeach
				    <!-- afficher le nombre de j'aimes et commentaires-->
				    <div class="text-right">
				    	<i>{{ $likes }} j'aime(s) {{ $comments }} commentaire(s)</i>
				    </div>
		    <div>
		    <!-- les button j'aime et commenter show si l'utilisateur est connecté-->
		    @if (!Auth::guest())
		    <!-- form de l'action "aimer un post"-->
		    	{!! Form::open(['action' => 'pagesController@store','method'=>'POST']) !!}
			    		<input type="hidden" name="id" value="{{ $post->id_p }}">
			    		<input type="submit" name='j"aime' value="j'aime" class="btn btn-<?php echo 'success' ?>">
				  
				{!! Form::close() !!}
			    <a href="posts/{{$post->id_p}}"><button class="btn btn-primary">commenter</button></a>
		    @endif
		    </div>
		   </div>
    	@endforeach
    	<!--pagination-->
    {{$tab['posts']->links()}}
    @endif
@endsection

<style type="text/css">
	#img{
		position: absolute;
		left:20px;
		width:250px ;
		height:250px ;
	}
</style>


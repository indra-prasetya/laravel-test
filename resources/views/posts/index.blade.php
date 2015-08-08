@extends('app')

@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	            @foreach($posts as $post)
	            <div class="post-preview">
	                <a href="{{ url('post/' . $post->slug) }}">
	                    <h2 class="post-title">
	                        {{$post->title}} 
	                    </h2> 
	                    <h3 class="post-subtitle">
	                        {{$post->description}}
	                    </h3>
	                </a>
	                <p class="post-meta">
	                    Posted by <a href="https://plus.google.com/117790626314138048409?prsrc=5" target="_BLANK">Indra</a> <span data-toggle="tooltip" data-placement="right" title="{{$post->created_at}}"> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }} </span>
	                </p>
	            </div>
	            <hr>
	            @endforeach
	
	            <?php echo $posts->render(); ?>
	        </div>
	    </div>
	</div>
@endsection
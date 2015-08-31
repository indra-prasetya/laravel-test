@extends('app')

@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	            @foreach($posts as $post)
	            <div class="post-preview" itemscope itemtype="http://schema.org/BlogPosting">
	                <a href="{{ url('post/' . $post->slug) }}">
	                    <h2 class="post-title" itemprop="name headline">
	                        {{$post->title}} 
	                    </h2> 
	                    <h3 class="post-subtitle" itemprop="description">
	                        {{$post->description}}
	                    </h3>
	                </a>
	                <p class="post-meta">
                            <span itemprop="author" itemscope itemtype="http://schema.org/Person">Posted by <a href="https://plus.google.com/117790626314138048409?prsrc=5" target="_BLANK" itemprop="url" rel="author"><span itemprop="name">Indra Prasetya</span></a></span>, <span data-toggle="tooltip" data-placement="right" title="{{$post->created_at}}" datetime="{{$post->created_at}}"> <meta itemprop="datePublished" content="{{$post->created_at}}"> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }} </span>
	                </p>
	            </div>
	            <hr>
	            @endforeach
	
	            <?php echo $posts->render(); ?>
	        </div>
	    </div>
	</div>
@endsection
@extends('app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                <article itemprop="articleBody">
                    {!! $post->content !!}
                </article>
    
                <hr/>
    
                <div id='disqus_thread' itemprop="comment"></div>
    
                <div class='pull-right'>
                    <a class="btn btn-primary" href="{{ URL::previous() }}">Back</a>    
                    @unless (Auth::guest())
                    <a class="btn btn-primary " href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-danger" type="submit">
                            Delete
                        </button>
                    </form>
                    @endunless
                </div>
            </div>
        </div>
    </div>
    
    <script>
    	if("undefined"==typeof DISQUS){var disqus_shortname="socialenemy",disqus_identifier="lv-{{ $post->id }}";!function(){var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src="//"+disqus_shortname+".disqus.com/embed.js",(document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]).appendChild(a)}()}else DISQUS.reset({reload:!0,config:function(){this.page.identifier=document.title,this.page.url=location.href}});
	</script>
	<script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?skin=desert"></script>
@endsection
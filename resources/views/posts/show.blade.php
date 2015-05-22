@extends('app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                <article>
                    {!! $post->content !!}
                </article>
    
                <hr/>
    
                <div id='disqus_thread'></div>
    
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
        var disqus_shortname = 'socialenemy';
        var disqus_identifier = 'lv-{{ $post->id }}';
        (function() {
            var dsq = document.createElement('script');
            dsq.type = 'text/javascript';
            dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })(); 
    </script>
@endsection
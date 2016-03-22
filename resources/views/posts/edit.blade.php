@extends('app')

@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
            <div class='page-header'>
                <h1>Edit {{$post->title}}</h1>
            </div>

            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}"/>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" value="{{$post->slug}}"/>
                </div>
                <div class="form-group">
                    <label for="content" id="post_content_label" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Add class 'prettyprint' for code highlighting">Content </label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value='{{ $category->id }}' {{$post->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                        @endforeach                        	
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control">{{$post->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="post_content" class="form-control">{{$post->content}}</textarea>
                </div>
                <div class="checkbox">
                    <label></label>
                    <input type="checkbox" name="is_published" value="1" checked={{$post->is_published? 'checked' : ''}}/>Published
                </div>

                <a class="btn btn-default" href="{{ route('posts.index') }}">Back</a>
                <button class="btn btn-primary" type="submit" >Edit</button>
            </form>
        </div>
    </div>
</div>
<script>
    jQuery(function ($) {
        $("#title").keyup(function () {
            var text = $(this).val();
            text = text.toLowerCase();
            text = text.replace(/[^a-zA-Z0-9]+/g, '-');
            $("#slug").val(text);
        });
        $('#post_content').trumbowyg({
		    semantic: true,
		    autogrow: true
		});
        $("#post_content_label").popover();
    });
</script>
@endsection
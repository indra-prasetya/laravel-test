@extends('app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-lg-8.col-lg-offset-2.col-md-10.col-md-offset-1'>
                <div class='page-header'>
                    <h1>Edit {{$post->title}}</h1>
                </div>
    
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$post->title}}"/>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{$post->slug}}"/>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <input type="text" name="category_id" class="form-control" value="{{$post->category_id}}"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" value="{{$post->description}}"/>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" name="content" class="form-control" value="{{$post->content}}"/>
                    </div>
                    <div class="form-group">
                        <label for="is_published">Published</label>
                        <input type="text" name="is_published" class="form-control" value="{{$post->is_published}}"/>
                    </div>
    
                    <a class="btn btn-default" href="{{ route('posts.index') }}">Back</a>
                    <button class="btn btn-primary" type="submit" >Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
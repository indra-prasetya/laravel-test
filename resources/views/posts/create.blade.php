@extends('app')

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-lg-8.col-lg-offset-2.col-md-10.col-md-offset-1'>
                <div class='page-header'>
                    <h1>New Content</h1>
                </div>
                <form action="{{ route('posts.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <input type="text" name="category_id" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" name="content" id="content" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="is_published">Published</label>
                        <input type="text" name="is_published" class="form-control" value=""/>
                    </div>
    
                    <a class="btn btn-default" href="{{ route('posts.index') }}">Back</a>
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
    <script>CKEDITOR.replace('content');</script>
@endsection
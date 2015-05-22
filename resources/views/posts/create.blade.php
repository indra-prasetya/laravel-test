@extends('app')

@section('head')
    <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
@endsection

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>
                <div class='page-header'>
                    <h1>New Content</h1>
                </div>
                <form action="{{ route('posts.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control">
                        	@foreach ($categories as $category)
                        		<option value='{{ $category->id }}'>{{ $category->name }}</option>
							@endforeach                        	
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" class="form-control"></textarea>
                    </div>
                    <div class="checkbox">
                        <label></label>
                        <input type="checkbox" name="is_published" value=""/>Published
                    </div>
    
                    <a class="btn btn-default" href="{{ route('posts.index') }}">Back</a>
                    <button class="btn btn-primary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>    
    <script>
    	jQuery(function($){
    		$("#title").keyup(function(){
			    var text = $(this).val();
			    text = text.toLowerCase();
			    text = text.replace(/[^a-zA-Z0-9]+/g,'-');
			    $("#slug").val(text);        
			});
			
    		CKEDITOR.replace('content');
    	})
    </script>
@endsection
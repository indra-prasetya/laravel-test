<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller {
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','life','code','about','show']]);
    }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::where('is_published', '=', true)->simplePaginate(5);

		return view('posts.index', compact('posts'));
	}
	public function life()
	{
		$posts = Post::whereRaw('is_published = 1 AND category_id = 1')->simplePaginate(5);

		return view('posts.index', compact('posts'));
	}
	public function code()
	{
		$posts = Post::whereRaw('is_published = 1 AND category_id = 2')->simplePaginate(5);

		return view('posts.index', compact('posts'));
	}
	public function about()
	{
		$posts = Post::whereRaw('is_published = 1 AND category_id = 3')->simplePaginate(5);

		return view('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::where('is_active', '=', true)->get();
		return view('posts.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$post = new Post();

		$post->title = $request->input("title");
        $post->category_id = $request->input("category_id");
        $post->slug = $request->input("slug");
        $post->description = $request->input("description");
        $post->content = $request->input("content");
        $post->is_published = $request->input("is_published");

		$post->save();

		return redirect()->route('posts.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);

		return view('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		$categories = Category::where('is_active', '=', true);

		return view('posts.edit', compact('post', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$post = Post::findOrFail($id);

		$post->title = $request->input("title");
        $post->category_id = $request->input("category_id");
        $post->slug = $request->input("slug");
        $post->description = $request->input("description");
        $post->content = $request->input("content");
        $post->is_published = $request->input("is_published");

		$post->save();

		return redirect()->route('posts.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		$post->delete();

		return redirect()->route('posts.index')->with('message', 'Item deleted successfully.');
	}

}
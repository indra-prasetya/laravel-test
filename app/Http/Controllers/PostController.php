<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller {
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','life','code','about','show', 'sitemap']]);
    }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::where('is_published', '=', true)->orderBy('created_at', 'DESC')->simplePaginate(5);
		return view('posts.index', compact('posts'));
	}
	public function life()
	{
		$posts = Post::whereRaw('is_published = 1 AND category_id = 1')->orderBy('created_at', 'DESC')->simplePaginate(5);
        $title = 'indra.prasetya - life';
		return view('posts.index', compact('posts', 'title'));
	}
	public function code()
	{
		$posts = Post::whereRaw('is_published = 1 AND category_id = 2')->orderBy('created_at', 'DESC')->simplePaginate(5);
        $title = 'indra.prasetya - code';
		return view('posts.index', compact('posts', 'title'));
	}
	public function about()
	{
		$posts = Post::whereRaw('is_published = 1 AND category_id = 3')->orderBy('created_at', 'DESC')->simplePaginate(5);
        $title = 'indra.prasetya - about';
		return view('posts.index', compact('posts', 'title'));
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
	public function show($slug)
	{
		$post = Post::where('slug','=',$slug)->firstOrFail();		
		$is_post = true;

		return view('posts.show', compact('post', 'is_post'));
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
		$is_post = true;
		$categories = Category::where('is_active', '=', true)->get();

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

	public function sitemap()
	{
		$sitemap = App::make("sitemap");

		$sitemap->add(URL::to('/'), '2013-11-16T12:30:00+02:00', '1.0', 'daily');
		$sitemap->add(URL::to('about'), '2013-11-16T12:30:00+02:00', '0.7', 'monthly');
		$sitemap->add(URL::to('life'), '2013-11-16T12:30:00+02:00', '0.7', 'monthly');
		$sitemap->add(URL::to('code'), '2013-11-16T12:30:00+02:00', '0.7', 'monthly');		
		
		$posts = Post::all();
		
		foreach($posts as $post) {
		  $sitemap->add(URL::to("post/{$post->slug}"), $post->created_at, '0.9', 'weekly');
		}
		
		return $sitemap->render('xml');
	}
	
	public function info()
	{
		phpinfo();
		exit();
	}
}

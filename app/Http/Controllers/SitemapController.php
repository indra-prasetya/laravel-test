<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class SitemapController extends Controller {
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sitemap = \App::make("sitemap" );

		$sitemap->add(\URL::to('/'), '2013-11-16T12:30:00+02:00', '1.0', 'daily');
		$sitemap->add(\URL::to('about'), '2013-11-16T12:30:00+02:00', '0.7', 'monthly');
		$sitemap->add(\URL::to('life'), '2013-11-16T12:30:00+02:00', '0.7', 'monthly');
		$sitemap->add(\URL::to('code'), '2013-11-16T12:30:00+02:00', '0.7', 'monthly');
	
		$posts = Post::all();
	
		foreach($posts as $post) 
		{
			$sitemap->add(\URL::to("post/{$post->slug}"), $post->created_at, '0.9', 'weekly');
		}
	
		return $sitemap->render('xml');
	}
}

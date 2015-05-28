<?php

use App\Post;

class PostModelTest extends TestCase {
	
	protected $post = null;

	public static function setupBeforeClass()
	{
		// run at beginning of test
	}
	
	public function setUp()
    {
    	// run at beginning of EACH test
        $post = new Post;
		$post->id = 1;
		$post->title = "Title Test";
		$post->category_id = 1;
		$post->slug = "title-test";
		$post->description = "Description";
		$post->content = "Body Content";
		$post->is_published = 1;
    }

	public function test_posted_at() 
	{
		$post->save();
		$expected = '/\d{2}\/\d{2}\/\d{4}/';
		$matches = (preg_match($expected, $post->created_at())) ? true : false;
		$assertTrue($matches);
	}
	
	public function test_is_published() 
	{
		$post->save();
		$assertTrue($post->is_published());
	}
	
	public function test_is_not_published() 
	{
		$post->is_published = 0;
		$post->save();
		$assertFalse($post->is_published());
	}

	public function tearDown() 
	{
		Post::destroy(1);
	}
	
	public static function tearDownAfterClass() 
	{
		
	}

}

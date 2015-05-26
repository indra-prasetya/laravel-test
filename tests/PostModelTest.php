<?php

use App\Post;
use League\FactoryMuffin\Facade as FactoryMuffin;

class PostModelTest extends TestCase {

	public static function setupBeforeClass()
    {
    	FactoryMuffin::define('Post', array(
		    'title'      	=> 'sentence',
		    'slug'      	=> function ($object, $saved) { return preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $object->title); },
		    'category_id'   => 'randomNumber|1',
		    'content' 		=> 'sentence|10',
		    'is_published'  => '1',
		));
	}
	
	public function test_posted_at()
    {
    	
        // Instantiate, fill with values, save and return
        $post = FactoryMuffin::create('Post');
 
        // Regular expression that represents d/m/Y pattern
        $expected = '/\d{2}\/\d{2}\/\d{4}/';
 
        // True if preg_match finds the pattern
        $matches = ( preg_match($expected, $post->postedAt()) ) ? true : false;
 
        $this->assertTrue( $matches );
    }
	
	public static function tearDownAfterClass()
    {
        
    }
}

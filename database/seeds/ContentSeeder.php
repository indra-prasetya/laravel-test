<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Tag;
use App\Post;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ContentSeeder extends Seeder {

    public function run()
    {
        DB::table('categories')->delete();
        Category::create(['name' => 'Life', 'is_active' => true]);
        Category::create(['name' => 'Code', 'is_active' => true]);
        Category::create(['name' => 'About', 'is_active' => true]);
        
        DB::table('tags')->delete();
        Tag::create(['name' => 'Tag', 'is_active' => true]);
        
        DB::table('posts')->delete();
        Post::create(['title' => 'Hello World!', 'slug' => 'hello-world', 'category_id' => 1, 'description' => 'Hello World!', 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sagittis malesuada nisi ut tincidunt. Vivamus ut euismod mi, sollicitudin scelerisque quam. Nunc semper vestibulum tincidunt. Suspendisse faucibus ante et mi aliquam commodo. Nullam at massa non leo tincidunt bibendum vitae eget orci. Aliquam erat volutpat. Suspendisse ornare enim augue. Morbi vestibulum imperdiet nulla, a consectetur nulla. Nulla et odio eu tellus bibendum pharetra quis at metus.', 'Is_published' => true]);
    
    }

}
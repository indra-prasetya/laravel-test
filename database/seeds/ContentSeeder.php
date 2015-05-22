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
        Post::create(['title' => 'Hello World!', 'slug' => 'hello-world', 'category_id' => 1, 'description' => 'Etiam ultrices orci ipsum, tristique ornare enim semper quis.', 'content' => "<h2>Lorem Ipsum</h2>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sagittis malesuada nisi ut tincidunt. Vivamus ut euismod mi, sollicitudin scelerisque quam. Nunc semper vestibulum tincidunt. Suspendisse faucibus ante et mi aliquam commodo. Nullam at massa non leo tincidunt bibendum vitae eget orci. Aliquam erat volutpat. Suspendisse ornare enim augue. Morbi vestibulum imperdiet nulla, a consectetur nulla. Nulla et odio eu tellus bibendum pharetra quis at metus.</p>

<p>Proin velit tortor, rhoncus et blandit sed, auctor ut nisl. Duis tincidunt lorem eget arcu sodales, a pulvinar metus aliquam. Donec ut nisi at magna tristique pulvinar. Donec pulvinar augue semper erat interdum, at hendrerit nibh posuere. Morbi suscipit risus et sapien ultricies consequat. Fusce bibendum rutrum leo, non accumsan neque finibus sit amet. Proin pretium, dolor vitae egestas dignissim, enim mauris pellentesque dolor, eget sagittis neque orci gravida nibh. Integer lobortis sem vel mi feugiat, sit amet dictum odio dignissim. Integer nec sollicitudin libero. Etiam ultrices orci ipsum, tristique ornare enim semper quis.</p>

<h2>Curabitur tempor</h2>

<p>Curabitur tempor velit pellentesque neque scelerisque, sit amet efficitur velit feugiat. Fusce ultricies faucibus purus pellentesque iaculis. Curabitur sed tempor risus, sit amet semper dolor. Vivamus in sodales massa. Proin velit eros, laoreet at tempor non, porttitor in lectus. Proin massa ligula, blandit at vestibulum id, mollis et nulla. Donec blandit lacus quam, vulputate porttitor urna interdum quis.</p>

<p>Curabitur at blandit mi. Quisque egestas elit et auctor faucibus. Ut quis maximus mauris. Nulla pulvinar vehicula consequat. Etiam venenatis varius lacus, ac venenatis est gravida sit amet. Sed lacinia, nisi a viverra iaculis, urna erat rhoncus nulla, at auctor justo urna at neque. Quisque facilisis lectus eget ex fringilla pulvinar. Donec finibus risus id purus condimentum, a rutrum est varius. Duis posuere sapien eget enim fringilla scelerisque. Vivamus sit amet aliquam lectus, eu rhoncus elit. In sollicitudin non lectus ac egestas.</p>
        ", 'Is_published' => true]);
    
    }

}
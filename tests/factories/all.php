<?php


use League\FactoryMuffin\Facade as FactoryMuffin;

		FactoryMuffin::define('Post', array(
		    'title'      	=> 'sentence',
		    'slug'      	=> function ($object, $saved) { return preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $object->title); },
		    'category_id'   => 'randomNumber|1',
		    'content' 		=> 'sentence|10',
		    'is_published'  => '1',
		), function ($object, $saved) {
			
		});
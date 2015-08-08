<?php
namespace App\Filters;

use Cache;
use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CacheFilter {
	
	public function fetch (Route $route, Request $request)
	{
		$key = $this->_makeCacheKey($request->url());
		
		if(Cache::has($key)) return Cache::get($key);
	}
	
	public function put (Route $route, Request $request, Response $response)
	{
		$key = $this->_makeCacheKey($request->url());
		
		if(!Cache::has($key)) return Cache::put($key, $response->getContent(), 3600);
	}

	private function _makeCacheKey($url)
	{
		return 'route_' . Str::slug($url);
	}
}

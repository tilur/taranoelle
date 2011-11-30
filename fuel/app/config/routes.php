<?php
$routes = array(
	'_root_'						=> 'welcome/index',  // The default route
	'_404_'							=> 'welcome/404',    // The main 404 route
	
	'logout'						=> 'login/logout',
	'galleries/(:any)'				=> 'galleries/display/$1',
	'blog/page/(:any)'				=> 'blog',
	'blog/page'						=> 'blog',
	'blog/(:any)'					=> 'blog/display/$1',
	/**
	 * This is an example of a BASIC named route (used in reverse routing).
	 * The translated route MUST come first, and the 'name' element must come
	 * after it.
	 */
	// 'foo/bar' => array('welcome/foo', 'name' => 'foo'),
);

if ($paths = DB::query("SELECT c_path FROM content GROUP BY c_path ORDER BY c_path")->execute()->as_array()) {
	foreach ($paths AS $i => $path) {
		$routes[$path['c_path']] = 'content/index';
	}
}

return $routes;
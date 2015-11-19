<?php
	
	/**
	 * Register class autoloader using an anonymous function (PHP >= 5.3.0)
	 */
	spl_autoload_register(function ($sClassname) {

		# Get the last part of a namespaced classname
		# Set the classname to require accordingly
		$parts = explode('\\', $sClassname);
		$sClassname = end($parts);

		# Set the path to include the class from
		if (stripos($sClassname, 'controller') !== false) {
			$sIncludePath = 'controllers/';
		} elseif (stripos($sClassname, 'model') !== false) {
			$sIncludePath = 'models/';
		}

		# Include the class
		if (isset($sIncludePath)) {
			require_once ($sIncludePath.$sClassname.'.php');
		}
	});

	/**
	 * Check if $route matches the URL
	 * Returns variable route values (/users/:id)
	 * @param  String $route The route to match (/users/:id)
	 * @return Array         Matched variables
	 */
	function matchRoute ($route) {

		$pathInfo	= isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
		$url 		= rtrim($pathInfo, '/');
		$pattern	= "@^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote(rtrim($route, '/'))) . "$@D";
		$matches 	= array();

		# Return false when not a match
		if(!preg_match($pattern, $url, $matches)) {
			return false;
		}

		# Trim first empty match
		array_shift($matches);

		# Return variable route values
		return empty($matches) ? true : $matches;
	}

	/**
	 * Check if the HTTP request method matches the routes method
	 * @param  String  $method The method the route applies to
	 * @return boolean         True if it matches, else false
	 */
	function isMethod ($method) {

		$requestMethod 	= strtolower($_SERVER['REQUEST_METHOD']);
		$method 		= strtolower($method);

		return $method === $requestMethod ? true : false;
	}
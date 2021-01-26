<?php

namespace Services;

class RouteService
{

	public $requestURI;
	public $parsedURI = [];

<<<<<<< Updated upstream
	public function navigateTo($conn)
=======
	public function navigateTo()
>>>>>>> Stashed changes
	{

		// Cleaning the URL Brackets
		$requestURI = (substr($_SERVER["REQUEST_URI"], -1) == "/" ? substr($_SERVER["REQUEST_URI"], 1, -1) : $_SERVER["REQUEST_URI"]);


		//If there any controller cuz URL isn't empty then
		if ($requestURI != "") {

			$parsedURI = self::validateURI($requestURI);

			if (class_exists($parsedURI[0] = "Controllers\\" . $parsedURI[0])) {

<<<<<<< Updated upstream
				if (Method_Exists(new $parsedURI[0]($conn), $parsedURI[1])) {
					call_user_func_array([new $parsedURI[0]($conn), $parsedURI[1]], $parsedURI[2]);
=======
				if (Method_Exists(new $parsedURI[0](), $parsedURI[1])) {

					call_user_func_array([new $parsedURI[0](), $parsedURI[1]], $parsedURI[2]);
>>>>>>> Stashed changes
				} else {
					http_response_code(404);
				}
			} else {
				http_response_code(404);
			}
		} else {
			http_response_code(200);
		}
	}

	protected function validateURI($requestURI)
	{
		// $parsedURI;
		$finalURI = [];

		$requestURI = strtolower(trim((substr($requestURI, 0, 1) == "/" ? substr($_SERVER["REQUEST_URI"], 1) : $requestURI)));

		$parsedURI = explode("/", filter_var($requestURI, FILTER_SANITIZE_URL));

<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
		//Add Controller 
		array_push($finalURI, $parsedURI[0]);

		//Add Method
		if (count($parsedURI) == 1) {
			array_push($finalURI, "default");
		} else {
			array_push($finalURI, $parsedURI[1]);
		}

		//Add Parameters
		array_push($finalURI, count($parsedURI) > 2 ? array_slice($parsedURI, 2) : []);

		return $finalURI;
	}
}

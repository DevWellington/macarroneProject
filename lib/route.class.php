<?php

/**
* Classe retorna a rota acessada
*/
class Route
{

	public static function getRoute(){

		$url = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		$route = explode('/', $url['path'])[1];

        if ($route === '') $route = 'home';

        return $route;
	}

}
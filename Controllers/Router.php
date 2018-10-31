<?php

namespace Controllers;

class Router
{
	public function getUri()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {//print_r($_SERVER['REQUEST_URI']);die();
			return trim(htmlspecialchars($_SERVER['REQUEST_URI']), '/');
		}
	}
	
	public function run()
	{
		$uri = $this->getUri();
		$routParams = explode('/', $uri);
		$nameClass = ucfirst(array_shift($routParams));
		$controller = empty($nameClass) ? '\Controllers\Main' : '\Controllers\\' . $nameClass;
		$action = empty($routParams) ? 'getContent' : array_shift($routParams);
		$arg = $routParams;

		if(class_exists($controller)) {
			$controllerObject = new $controller;

			if ($controllerObject) {
				call_user_func([$controllerObject, $action], $arg);

			}
		}

	}
}

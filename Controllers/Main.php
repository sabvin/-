<?php

namespace Controllers;

use \Models\Main as modelMain;

class Main
{
	public function __call($name, $arguments) {
		return $this->getContent();
	}
	
	/**
	 * render view
	 * @return boolean
	 */
	public function getContent()
	{
		
		require_once(DIR_ROOT . '/views/index.php');
		
		return true;
	}

}

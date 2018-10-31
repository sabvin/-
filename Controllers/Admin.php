<?php

namespace Controllers;

use \Models\Post;

/**
 * Класс котроллера для работы с админкой сайта
 */
class Admin {
	
	/**
	 * 
	 * @param type $name
	 * @param type $arguments
	 * @return type
	 */
	public function __call($name, $arguments)
	{
		return $this->mainPage();
	}

	public function mainPage()
	{
		$posts = Post::getPostList();
		
		if (!$posts) {
			$posts = [];
		}

		require_once(DIR_ROOT . '/views/admin/index.php');
		
		return true;
	}
	
	public function editPost(array $arg)
	{
		if (empty($arg)) {
			//@ здесь надо будет предусмотреть обработку такой нелепости
		}
		
		$postId = (int) array_shift($arg);

		$post = Post::getPost($postId);
		//print_r($post);die('!!!!');
		require_once(DIR_ROOT . '/views/admin/editPost.php');
	}
	
	public function updatePost()
	{
		if (isset($_REQUEST['postName'])) {
			$postName = $this->paramHandling($_REQUEST['postName']);
		}

		if (isset($_REQUEST['postText'])) {
			$postText = $this->paramHandling($_REQUEST['postText']);
		}

		if (isset($_REQUEST['postId'])) {
			$postId = $this->paramHandling($_REQUEST['postId']);
		}

		$result = Post::updatePost($postId, $postText, $postName);
		
		echo $result ? 'Изменения сохранены' : 'Ошибка сохранения данных';
	}

	public function paramHandling($param = '')
	{
		$param = trim($param);
		$parm = htmlspecialchars($param);

		return $param;
	}
}

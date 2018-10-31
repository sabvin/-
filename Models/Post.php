<?php

namespace Models;

use \Components\Db as Db;

class Post
{

	/**
	 * Делаем выборку записей для листинга
	 * 
	 * @return array
	 */
	public static function getPostList()
	{
		$db = Db::getConnect();

		//@TODO здесь бы предусмотреть паджинацию, но не успеваю
		$result = $db->query('SELECT id, post_name, DATE_FORMAT(post_change, "%d.%m.%Y") as post_change FROM posts');
		$result = $result->fetchAll();

		return $result;
	}

	/**
	 * 
	 * @param int $postId
	 * @return array|null
	 */
	public static function getPost(int $postId)
	{
		if (!empty($postId)) {
			$db = Db::getConnect();
			$result = $db->prepare('SELECT * FROM posts WHERE id = :postId');
			$result->bindParam(':postId', $postId, \PDO::PARAM_INT);
			$result->execute();
		}
		
		return empty($result) ? [] : $result->fetch();
	}

	/**
	 * 
	 * @param int $postId
	 * @param string $postText
	 * @param string $postName
	 * @return int|false
	 */
	public static function updatePost(int $postId, string $postText, string $postName)
	{
		if (!empty($postId)) {
			$date = new \DateTime;
			$postChange = $date->getTimestamp();
			
			$db = Db::getConnect();
			$result = $db->prepare(
				'UPDATE posts'
				. ' SET post_name = :post_name, post_text = :post_text, post_change = ' . $postChange
				. '  WHERE id = :postId'
				);
			$result->bindParam(':postId', $postId, \PDO::PARAM_INT);
			$result->bindParam(':post_name', $postName, \PDO::PARAM_STR);
			$result->bindParam(':post_text', $postText, \PDO::PARAM_STR);
			$result->execute();
		}
		
		return $result ?? false;
	}
	
	public static function insertPost(string $postText, string $postName)
	{
		//это я сделать не успел
	}
	
	public static function deletePost(int $postId)
	{
		//это тоже не успел
	}
}

<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 20.09.18
 * Time: 18:12
 */

namespace models;

use base\Model;

/**
 * Расширение класса Model для таблицы news.
 * Методы получения данных
 *
 * @package models
 */

class News extends Model {

	/**
	 * Колличество новостей на странице
	 *
	 * @var int
	 */

	private $numNewsInList;


	/**
	 * Метод устанвки свойства $numNewsInList - колличества новостей на странице
	 *
	 * @param int $numNewsInList
	 */
	public function setNumNewsInList( $numNewsInList ) {
		$this->numNewsInList = $numNewsInList;
	}

	/**
	 * Метод возвращает число страниц
	 *
	 * @return int
	 * @throws \Exception
	 */
	public function getNumPages() {
		$sql      = 'SELECT COUNT(*) FROM `news`';
		$result   = $this->db->sendSelectQuery( $sql );
		$numItems = $result[0]['COUNT(*)'];

		$numPages = ceil( $numItems / $this->numNewsInList );

		return $numPages;
	}

	/**
	 * Метод получает номер страницы и возвращает массив новостей на этой странице.
	 *
	 * @param int $pageNumber
	 *
	 * @return array
	 * @throws \Exception
	 */
	public function getNewsInPage( $pageNumber ) {
		$offset = ( $pageNumber - 1 ) * $this->numNewsInList;
		$sql    = "SELECT `id`, `idate`, `title`, `announce` FROM `news` ORDER BY `idate` DESC LIMIT {$this->numNewsInList} OFFSET $offset ";

		return $this->db->sendSelectQuery( $sql );

	}

	/**
	 * Метод получает id новости и возвращает её
	 *
	 * @param int $id
	 *
	 * @return array
	 * @throws \Exception
	 */
	public function getSingleNewsById( $id ) {
		$sql = "SELECT `title`, `content` FROM `news` WHERE `id`= $id";

		return $this->db->sendSelectQuery( $sql );
	}

}

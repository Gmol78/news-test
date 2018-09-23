<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 20.09.18
 * Time: 10:30
 */

namespace library;

/**
 * Класс Db. Singleton.
 * Подключение к бд, методы отправки sql-запросов.
 *
 * @package library
 */
class Db {

	/**
	 * Содержит собственный экземпляр.
	 *
	 * @var object|null
	 */
	private static $db = null;

	/**
	 * Объект mysqli
	 *
	 * @var \mysqli
	 */
	private $link;

	/**
	 * Db constructor.
	 *
	 * @throws \Exception
	 */
	private function __construct() {

		if ( ! file_exists( __DIR__ . '/../config/db.conf.php' ) ) {
			throw new  \Exception( 'db config not found' );
		}

		//получаем массив конфигурации
		$config     = require_once __DIR__ . '/../config/db.conf.php';

		$this->link = @new \mysqli( $config['host'], $config['user'], $config['password'], $config['db_name'] );

		//выброс исключения при ошибке
		if ( $this->link->connect_error ) {
			throw new \Exception( $this->link->connect_error );
		}

		//установка кодировки по умолчанию
		$this->link->set_charset( $config['charset'] );

	}

	/**
	 * Получение экземпляра объекта Db
	 *
	 * @return Db|null|object
	 * @throws \Exception
	 */
	public static function getDb() {

		if ( is_null( self::$db ) ) {
			self::$db = new self();
		}

		return self::$db;
	}

	/**
	 * Sql-запрос SELECT, возвращает все результаты запроса  в виде
	 * массива ассоциативных массивов
	 *
	 * @param string $sgl sql - запрс
	 *
	 * @return array
	 * @throws \Exception
	 */

	public function sendSelectQuery( $sgl ) {
		$result = $this->link->query( $sgl );

		//выброс исключения
		if ( $this->link->error ) {
			throw new \Exception( $this->link->error );
		}

		return $result->fetch_all( MYSQLI_ASSOC );
	}

	/**
	 * запрет клонирования
	 */
	private function __clone() {
	}

}

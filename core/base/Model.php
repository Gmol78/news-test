<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 23.09.18
 * Time: 11:10
 */

namespace base;


use library\Db;

/**
 * Абстрактный класс модели.
 * Расширять классами и необходимыми методами в соответсвии с обрабатываемыми таблицами.
 * Каждый расширяющий класс соответсвует своей таблице бд.
 *
 * @package models
 */
abstract class Model {

	/**
	 * Объект, содержащий ссылку на подключаемую бд и методы отправки запросов.
	 *
	 * @var Db|null
	 */
	protected $db;

	/**
	 * Устанавливает ссылку на объект Db
	 *
	 * Model constructor.
	 */
	public function __construct() {
		$this->db = Db::getDb();
	}
}

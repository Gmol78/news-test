<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21.09.18
 * Time: 20:48
 */

namespace views;

use base\View;

/**
 * Базовый вид.
 * Метод установки заголовка страницы, метод рендеринга.
 *
 * @package views
 */
class BaseView extends View {

	/**
	 * Заголовок страницы
	 *
	 * @var string
	 */
	protected $title;

	/**
	 * Путь к папке 'templates'
	 *
	 * @var string
	 */
	protected $basePath = __DIR__ . '/templates/';

	/**
	 * Полный путь к layout
	 *
	 * @var string
	 */
	protected $layout = __DIR__ . '/templates/layouts/main.php';

	/**
	 * Метод установки заголовка страницы
	 *
	 * @param string $title
	 */
	public function setTitle( $title ) {
		$this->title = $title;
	}

	/**
	 * Метод рендеринга, страницы.
	 * Передаются: имя шаблона и данные
	 *
	 * @param string $templateName
	 * @param mixed $data
	 */
	public function render( $templateName, $data ) {
		include $this->layout;
	}
}

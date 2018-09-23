<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21.09.18
 * Time: 18:13
 */

namespace base;

/**
 * Содержит интефейс классов отображения.
 * Метод установки заголовка страницы, метод рендеринга.
 *
 * @package views
 */
abstract class View {

	/**
	 * @param string $title -строка заголовка
	 *
	 * @return void
	 */
	abstract public function setTitle( $title );

	/**
	 * Метод рендеринга страницы.
	 *
	 * @param string $templateName имя шалона
	 * @param mixed $data данные, передаваемые в отображение
	 *
	 * @return void
	 */
	abstract public function render( $templateName, $data );

}

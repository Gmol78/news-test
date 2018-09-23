<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21.09.18
 * Time: 11:34
 */

namespace base;

/**
 * Класс PageController. Интерфейс контроллеров.
 * Метод получения запрса клиента.
 * Метод исполнения логики приложения, получения из модели данных, обработки данных
 * с передачей обработанных данных в отображение.
 *
 * @package controllers
 */
abstract class PageController {

	/**
	 * Метод получения и обработки запроса клиента
	 *
	 * @return void
	 */
	protected abstract function getRequest();

	/**
	 *  Метод исполнения логики приложения, получения из модели данных, обработки данных
	 * с передачей обработанных данных в отображение.
	 *
	 * @param View $view экземпляр объекта View
	 *
	 * @return void
	 */
	public abstract function process(View $view);

}

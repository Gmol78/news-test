<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 22.09.18
 * Time: 9:06
 */

namespace controllers;


use base\PageController;
use base\View;
use exceptions\HttpException;
use models\News;


/**
 * Контроллер страниц одиночной новости.
 *
 * @package controllers
 */
class SinglePageController extends PageController {

	/**
	 * id текущей страницы
	 *
	 * @var int
	 */
	private $newsId;

	/**
	 * Модель для таблицы news
	 *
	 * @var object News
	 */
	private $news;

	/**
	 * SinglePageController constructor. Устанавливает в свойство $news ссылку на
	 * экземпляр объекта News
	 *
	 * @throws HttpException
	 */
	public function __construct() {
		$this->news = new News();
		$this->getRequest();
	}

	/**
	 * Метод обрабатывает запрос get получает, фильтрует id новости
	 * и присваевает кго свойству $nesId
	 *
	 * @throws HttpException
	 */
	protected function getRequest() {

		if ( ! empty( $_GET['id'] ) ) {
			$newsId = $_GET['id'];

			//фильтр клиентских данных
			$newsId = (int) $newsId;
			if ( $newsId ) {
				$this->newsId = $newsId;
			} else {
				throw new HttpException();
			}
		} else {
			throw new HttpException();
		}
	}

	/**
	 * Метод получает объект View, осуществляет получение данных новости и
	 * передачу данных в полученный объект View
	 *
	 * @param View $view
	 *
	 * @throws HttpException
	 * @throws \Exception
	 */
	public function process( View $view ) {
		$singleNews = $this->news->getSingleNewsById( $this->newsId );

		//при получении пустого списка выбрасывается исключение
		if ( empty( $singleNews ) ) {
			throw new HttpException();
		}
		$data = $singleNews[0];

		$view->render( 'single', $data );
	}
}

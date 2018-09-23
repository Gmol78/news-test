<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21.09.18
 * Time: 11:51
 */

namespace controllers;


use base\PageController;
use base\View;
use exceptions\HttpException;
use models\News;

/**
 * Контроллер страниц списка новостей.
 *
 * @package controllers
 */
class ListPageController extends PageController {

	/**
	 * Модель таблицы news
	 *
	 * @var object News
	 */
	private $news;

	/**
	 * Номер страницы списка новостей
	 *
	 * @var int
	 */
	private $listPageNumber;

	/**
	 * Метод обрабатывает запрс get и устанавливает в свойство $listPageNumber номер запрашиваемой страницы списка новостей
	 *
	 */
	protected function getRequest() {
		if ( ! empty( $_GET['page'] ) ) {
			$listPageNumber = $_GET['page'];

			//фильтр клиентских данных
			$listPageNumber = (int) $listPageNumber;
		} else {
			$listPageNumber = 1;
		}

		$this->listPageNumber = $listPageNumber;
	}

	/**
	 * ListPageController constructor.
	 *
	 * @param int $numNewsInList - число новостей на странице
	 */
	public function __construct( $numNewsInList = 5 ) {
		$this->news = new News();
		$this->news->setNumNewsInList( $numNewsInList );

		$this->getRequest();

	}

	/**
	 * Метод получает объект View, осуществляет получение данных списка новостей, числа страниц, номера текущей страницы и
	 * передачу данных в полученный объект View
	 *
	 * @param View $view -объект представления
	 *
	 * @throws HttpException
	 * @throws \Exception
	 */
	public function process(View $view) {

		$listNews = $this->news->getNewsInPage($this->listPageNumber);
		if(empty($listNews)){
			throw new HttpException();
		}
		$numPages = $this->news->getNumPages();

		//формирование массива данных для передачи в представление.
		$data['news'] = $listNews;
		$data['pages']['num-pages'] = $numPages;
		$data['pages']['active-page'] = $this->listPageNumber;

		$view->render('list-news', $data);

	}

}

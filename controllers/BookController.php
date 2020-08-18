<?php

class BookController extends Controller {

    private $pageTpl = '/views/index.php';

    public function __construct() {
        $this->model = new BookModel();
        $this->view = new View();
    }

    public function index() {
        $this->pageData['title'] = 'Books';
        $this->pageData['htmlRoot'] = '/html';

        $sortParam = $_GET['orderBy'];
        $sortDirection = strtoupper($_GET['order']);

        if (in_array($sortParam, ['price', 'author']) && in_array($sortDirection, ['ASC', 'DESC'])) {
            $books = $this->model->findAll($sortParam, $sortDirection);
        }
        else {
            $books = $this->model->findAll();
        }

        $this->pageData['books'] = $books;

        $booksCount = $this->model->getCount();
        $this->pageData['booksCount'] = $booksCount;

        $averagePrice = $this->model->getAveragePrice();
        $this->pageData['averagePrice'] = $averagePrice;

        $oldestPublicationYear = $this->model->getOldestPublicationYear();
        $this->pageData['oldestPublicationYear'] = $oldestPublicationYear;
        $newestPublicationYear = $this->model->getNewestPublicationYear();
        $this->pageData['newestPublicationYear'] = $newestPublicationYear;

        $this->view->render($this->pageTpl, $this->pageData);
    }

}
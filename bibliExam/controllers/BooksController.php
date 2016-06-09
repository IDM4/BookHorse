<?php



namespace Controller;

use Model\Books;
use Model\Authors;
use Model\Editors;

class BooksController
{
    private $books_model = null;

    public function __construct()
    {
        $this->books_model = new Books();
    }

    public function index(){
        if (!isset($_GET['page'])) {
            $page=1;
        }
        else {
            $page = intval($_GET['page']);
        }
        $books = $this->books_model->getBooksPaginated($page);
        //$books = $this->books_model->all();
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return ['books' => $books, 'view' => $view];
    }


    public function show(){
        if (!isset($_GET['id'])) {
            die('Il manque l´identifiant de votre livre');
        }

        $id = intval($_GET['id']);
        $book = $this->books_model->find($id);

        $authors = null;
        $editors = null;
        if(isset($_GET['with'])) {
            $with = explode(',',$_GET['with']);
            if(in_array('authors',$with)){
                $authors_model = new Authors();
                $authors = $authors_model->getAuthorsByBookId($book->id);
            }
            if(in_array('editors',$with)){
                $editors_model = new Editors();
                $editors = $editors_model->getEditorsByBookId($book->id);
            }
        }

        $view = 'show_books.php';
        $page_title = 'La fiche du livre&nbsp;: ' . $book->title;

        return ['book' => $book, 'view' => $view, 'page_title' => $page_title, 'authors' => $authors, 'editors' => $editors];
    }
}



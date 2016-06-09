<?php


namespace Controller;

use Model\Books;
use Model\Authors;
use Model\Editors;

class AuthorsController
{

    private $authors_model = null;

    /**
     * AuthorsController constructor.
     */
    public function __construct()
    {
        $this->authors_model = new Authors();
    }

    function index(){
        $authors = $this->authors_model->all();
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return ['authors' => $authors, 'view' => $view];
    }

    function show(){
        if (!isset($_GET['id'])) {
            die('Il manque l´identifiant de votre livre');
        }

        $id = intval($_GET['id']);
        $author = $this->authors_model->find($id);

        $books = null;
        $editors = null;
        if(isset($_GET['with'])) {
            $with = explode(',',$_GET['with']);
            if(in_array('books',$with)){
                $books_model = new Books();
                $books = $books_model->getBooksByAuthorId($author->id);
            }
            if(in_array('editors',$with)){
                $editors_model = new Editors();
                $editors = $editors_model->getEditorsByAuthorId($author->id);
            }
        }

        $view = 'show_authors.php';
        $page_title = 'La fiche de l´auteur&nbsp;: ' . $author->name;

        return ['author' => $author, 'view' => $view, 'page_title' => $page_title, 'books' => $books, 'editors' => $editors];
    }
}


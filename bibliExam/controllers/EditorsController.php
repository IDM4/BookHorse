<?php
namespace Controller;

use Model\Books;
use Model\Authors;
use Model\Editors;

class EditorsController
{
    private $editors_model = null;
    public function __construct()
    {
        $this->editors_model = new Editors();
    }

    function index(){

        
        $editors = $this->editors_model->all();
        $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';

        return['editors'=>$editors,'view'=>$view];
    }

    function show(){
        if(!isset($_GET['id'])){
            die('Il manque l´identifiant de votre livre');
        }

        $id = intval($_GET['id']);
        $editor = $this->editors_model->find($id);

        $books = null;
        $authors = null;
        if(isset($_GET['with'])) {
            $with = explode(',',$_GET['with']);
            if(in_array('books',$with)){
                $books_model = new Books();
                $books = $books_model->getBooksByEditorId($editor->id);
            }
            if(in_array('authors',$with)){
                $authors_model = new Authors();
                $authors = $authors_model->getAuthorsByEditorId($editor->id);
            }
        }

        $view = 'show_editors.php';
        $page_title = 'La fiche de l´éditeur&nbsp;: ' . $editor->name;

        return['editor'=>$editor,'view'=>$view, 'page_title' => $page_title, 'books' => $books, 'authors' => $authors];
    }
}

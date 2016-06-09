<?php
namespace Model;

class Books extends Model
{
    protected $table = 'books';

    public function getBooksByAuthorId($id)
    {
        $sql = '
            SELECT DISTINCT books.*
            FROM books
            JOIN author_book
            ON author_book.book_id = books.id
            JOIN authors
            ON authors.id = author_book.author_id
            WHERE authors.id = :id
        ';

        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);

        return $pdoSt->fetchAll();
    }

    public function getBooksByEditorId($id)
    {
        $sql = '
            SELECT DISTINCT books.*
            FROM books
            JOIN editors
            ON books.editor_id = editors.id
            WHERE editors.id = :id
        ';

        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);

        return $pdoSt->fetchAll();
    }

    public function getBooksPaginated($page)
    {
        $calcul = (($page-1)*10);
        $sql = '
            SELECT *
            FROM books
            LIMIT ' . $calcul .' ,10
            ';

        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':page' => $page]);

        return $pdoSt->fetchAll();
    }

    public function countBooks() 
    {
        $sql = '
            SELECT COUNT (id) as . NbBooks
            FROM books
        ';

        $pdoSt = $this->cn->prepare($sql);
        return $pdoSt->fetchAll();
    }
}
 

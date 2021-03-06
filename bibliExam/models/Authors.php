<?php
namespace Model;

class Authors extends Model
{
    protected $table = 'authors';

    public function getAuthorsByBookId($id)
    {
        $sql = '
            SELECT DISTINCT authors.*
            FROM authors
            JOIN author_book
            ON authors.id = author_book.author_id
            JOIN books
            ON author_book.book_id = books.id
            WHERE books.id = :id
        ';

        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);

        return $pdoSt->fetchAll();
    }

    public function getAuthorsByEditorId($id)
    {
        $sql = '
            SELECT DISTINCT authors.*
            FROM authors
            JOIN author_book
            ON authors.id = author_book.author_id
            JOIN books
            ON author_book.book_id = books.id
            JOIN editors
            ON editors.id = books.editor_id
            WHERE editors.id = :id
        ';

        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);

        return $pdoSt->fetchAll();
    }
}

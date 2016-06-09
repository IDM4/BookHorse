<?php
namespace Model;

class Editors extends Model
{
    protected $table = 'editors';

    public function getEditorsByBookId($id)
    {
        $sql = '
            SELECT DISTINCT editors.*
            FROM editors
            JOIN books
            ON editors.id = books.editor_id
            WHERE books.id = :id
        ';

        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);

        return $pdoSt->fetchAll();
    }

    public function getEditorsByAuthorId($id)
    {
        $sql = '
            SELECT DISTINCT editors.*
            FROM editors
            JOIN books
            ON books.editor_id = editors.id
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
}

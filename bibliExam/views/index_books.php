

<ul>
        <?php foreach ($data['books'] as $book) : ?>
    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?a=show&e=books&id=<?php echo $book->id; ?>&with=authors,editors">
        <img src="<?php echo $book->cover; ?>"
                     alt="">
        <?php //echo $book->title; ?>
    </li>
<?php endforeach; ?>
</ul>

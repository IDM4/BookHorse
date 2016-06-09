
<h1>
    Vous êtes sur la page de l'auteur : <?php echo $data['author']->name; ?> <!-- Le nom de l'auteur -->
</h1>

<?php if ($data['author']->photo): ?> <!-- L'image -->
    <div class="photo">
        <img src="<?php echo $data['author']->photo; ?>"
             alt=""> <!-- cover est un nom de colonne dans la database -->
    </div>
<?php endif; ?>

<?php if ($data['author']->bio): ?> <!-- Le résumé du livre --> <!-- summary est un nom de colonne dans la database -->
    <div class="bio">
        <?php echo $data['author']->bio; ?>
    </div>
<?php endif; ?>

<?php if ($data['books']): ?>
    <h2>Livre(s)</h2>
    <ul class="books">
        <?php foreach ($data['books'] as $book) : ?>
            <li class="book">
                <a href="?a=show&e=books&id=<?php echo $book->id; ?>&with=authors,editors"><?php echo $book->title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($data['editors']): ?>
    <h2>Editeur(s)</h2>
    <ul class="editors">
        <?php foreach ($data['editors'] as $editor) : ?>
            <li class="editor">
                <a href="?a=show&e=editors&id=<?php echo $editor->id; ?>&with=authors,books"><?php echo $editor->name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="allbooks">
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Allez vers Tous les livres</a>
    <!-- PHP SELF dans ce contexte ce sera toujours index.php -->
</div>

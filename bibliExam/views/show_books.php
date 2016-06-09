
<h1>
    <?php echo $data['book']->title; ?> <!-- Le titre du livre -->
</h1>

<?php if ($data['book']->cover): ?> <!-- L'image -->
<div class="cover">
    <img src="<?php echo $data['book']->cover; ?>"
         alt=""> <!-- cover est un nom de colonne dans la database -->
</div>
<?php endif; ?>

<?php if ($data['book']->summary): ?> <!-- Le résumé du livre --> <!-- summary est un nom de colonne dans la database -->
    <div class="summary">
        <?php echo $data['book']->summary; ?>
    </div>
<?php endif; ?>

<?php if ($data['authors']): ?>
    <h2>Auteur(s)</h2>
    <ul class="authors">
        <?php foreach ($data['authors'] as $author) : ?>
            <li class="author">
                <a href="?a=show&e=authors&id=<?php echo $author->id; ?>&with=books,editors"><?php echo $author->name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if ($data['editors']): ?>
    <h2>Editeur(s)</h2>
    <ul class="editors">
        <?php foreach ($data['editors'] as $editor) : ?>
            <li class="editor">
                <a href="?a=show&e=editors&id=<?php echo $editor->id; ?>&with=books,authors"><?php echo $editor->name; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="allbooks">
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Retour à la page des livres</a>
    <!-- PHP SELF dans ce contexte ce sera toujours index.php -->
</div>

<h1>Liste des livres</h1>

<table class="table">

    <tr>
        <th>Titre</th>
        <th>Prix</th>
        <th>Auteur</th>
        <th>Editeur</th>
        <th>Genre</th>
    </tr>

    <?php foreach($bookList as $book): ?>
        <tr>
            <td> <?= $book["titre"] ?></td>
            <td> <?= $book["prix"] ?></td>
            <td> <?= $book["auteur"] ?></td>
            <td> <?= $book["editeur"] ?></td>
            <td> <?= $book["genre"] ?></td>
        </tr>
    <?php endforeach ?>

</table>
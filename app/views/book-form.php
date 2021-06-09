<h1>Nouveau livre</h1>
<form method="post">
    <div class="mb-2">
        <label class="form-label">Titre</label>
        <input type="text" class="form-control" name="titre">
    </div>
    <div class="mb-2">
        <label class="form-label">Prix</label>
        <input type="number" class="form-control" name="prix">
    </div>

    <div class="mb-2">
        <label class="form-label">Auteur</label>
        <select class="form-control" name="auteur_id">
            <?php foreach($authorList as $author): ?>
            <option value="<?= $author["id"] ?>">
                <?= $author["prenom"] ?> <?= $author["nom"] ?>
            </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-2">
        <label class="form-label">Editeur</label>
        <select class="form-control" name="editeur_id">
            <?php foreach ($publisherList as $publisher): ?>
            <option value="<?=$publisher["id"]?>">
                <?=$publisher["nom"]?>
            </option>
            <?php endforeach?>
        </select>
    </div>

    <div class="mb-2">
        <label class="form-label">Genre</label>
        <select class="form-control" name="genre_id">

            <?php foreach ($genreList as $genre): ?>
            <option value="<?=$genre["id"]?>">
                <?=$genre["genre"]?>
            </option>
            <?php endforeach?>

        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3 w-100">
        Valider
    </button>


</form>
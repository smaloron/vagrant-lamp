<h1>Liste des auteurs</h1>

<?php if(! empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach($errors as $message): ?>
            <p><?= $message ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>

<div class="mt-3 mb-3">
    <h2>Nouvel auteur</h2>
    <form method="post">
        <div class="mb-2">
            <label class="form-label">Prénom</label>
            <input class="form-control" name="prenom" type="text"
            value="<?= isset($inputs["prenom"])? $inputs["prenom"]: "" ?>" >
        </div>
        <div class="mb-2">
            <label class="form-label">Nom</label>
            <input class="form-control" name="nom" type="text"
            value="<?= isset($inputs["nom"])? $inputs["nom"]: "" ?>" >
        </div>

        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>

<table class="table">
    <tr>
        <th>prénom</th>
        <th>Nom</th>
        <th></th>
    </tr>

    <?php foreach($authorList as $author): ?>
        <tr>
            <td><?= $author["prenom"]?></td>
            <td><?= $author["nom"]?></td>
            <td>
                <a href="/author-delete?id=<?= $author["id"] ?>"
                class="btn btn-danger w-40 mt-2">Supprimer</a>

                <a href="/author-list?id=<?= $author["id"] ?>"
                class="btn btn-warning w-40 mt-2">Modifier</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>
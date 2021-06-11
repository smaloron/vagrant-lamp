<h1 class="mt-2 mb-3">Inscription</h1>

<?php if ($errors): ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $errorMessage): ?>
    <p><?=$errorMessage?></p>
    <?php endforeach?>
</div>
<?php endif?>

<form method="post">
    <div class="mb-2">
        <label class="form-label">Pseudonyme</label>
        <input type="text" class="form-control" name="pseudo">
    </div>
    <div class="mb-2">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-2">
        <label class="form-label">Mot de passe</label>
        <input type="password" class="form-control" name="mot_de_passe">
    </div>

    <div class="mb-2">
        <label class="form-label">Role</label>
        <select name="role_id" class="form-control">
            <?php foreach ($roleList as $role): ?>
            <option value="<?=$role["id"]?>">
                <?=$role["nom"]?>
            </option>
            <?php endforeach?>
        </select>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">
        Valider
    </button>
</form>
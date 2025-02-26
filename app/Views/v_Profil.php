<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2>Profil de <?= esc($user['prenomUser']) ?> <?= esc($user['nomUser']) ?></h2>
<p>Email : <?= esc($user['emailUser']) ?></p>
<p>Adresse : <?= esc($user['adresseUser']) ?></p>

<a href="<?= base_url('profil/edit'); ?>" class="btn btn-primary">Modifier mon profil</a>

<div class="container mt-5">
    <h2 class="text-center">Mon Profil</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('profil/update'); ?>" method="post">
        <div class="mb-3">
            <label for="nomUser" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nomUser" name="nomUser" value="<?= $user['nomUser']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="prenomUser" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenomUser" name="prenomUser" value="<?= $user['prenomUser']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="emailUser" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailUser" name="emailUser" value="<?= $user['emailUser']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="adresseUser" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresseUser" name="adresseUser" value="<?= $user['adresseUser']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="loginUser" class="form-label">Login</label>
            <input type="text" class="form-control" id="loginUser" name="loginUser" value="<?= $user['loginUser']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="mdpUser" class="form-label">Nouveau mot de passe (laisser vide si inchangé)</label>
            <input type="password" class="form-control" id="mdpUser" name="mdpUser">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

</body>
</html>

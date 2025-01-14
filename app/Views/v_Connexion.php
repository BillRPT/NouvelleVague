<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <h1 class="text-primary text-center mb-4">Connexion</h1>
                        <?= validation_list_errors() ?>
                        <?= form_open('/c_Connexion/connexionUtilisateur', ['class' => 'needs-validation', 'novalidate' => '']); ?>
                            <div class="mb-3">
                                <?= form_label('Adresse Email', 'email', ['class' => 'form-label']); ?>
                                <?= form_input('email', set_value('email'), ['class' => 'form-control', 'id' => 'email', 'required' => '']); ?>
                            </div>
                            <div class="mb-3">
                                <?= form_label('Mot de passe', 'password', ['class' => 'form-label']); ?>
                                <?= form_password('password', set_value('password'), ['class' => 'form-control', 'id' => 'password', 'required' => '']); ?>
                            </div>
                            <div class="d-grid gap-2">
                                <?= form_submit('mysubmit', 'Se connecter', ['class' => 'btn btn-primary btn-lg']); ?>
                            </div>
                        <?= form_close(); ?>
                        <p class="mt-3 text-center">
                            Pas encore inscrit ?
                            <?= anchor('https://www.google.com/', 'Créez un compte'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <h1 class="text-primary text-center mb-4">Inscription</h1>
                        <?= validation_list_errors() ?>
                        <?= form_open('/c_Inscription/inscriptionUtilisateur', ['class' => 'needs-validation', 'novalidate' => '']); ?>
                            <div class="mb-3">
                                <?= form_label('Nom', 'nom', ['class' => 'form-label']); ?>
                                <?= form_input('nom', set_value('nom'), ['class' => 'form-control', 'id' => 'nom', 'required' => '']); ?>
                            </div>
                            <div class="mb-3">
                                <?= form_label('Prenom', 'prenom', ['class' => 'form-label']); ?>
                                <?= form_input('prenom', set_value('prenom'), ['class' => 'form-control', 'id' => 'prenom', 'required' => '']); ?>
                            </div>
                            <div class="mb-3">
                                <?= form_label('Adresse', 'adresse', ['class' => 'form-label']); ?>
                                <?= form_input('adresse', set_value('adresse'), ['class' => 'form-control', 'id' => 'adresse', 'required' => '']); ?>
                            </div>
                            <div class="mb-3">
                                <?= form_label('Login', 'login', ['class' => 'form-label']); ?>
                                <?= form_input('login', set_value('login'), ['class' => 'form-control', 'id' => 'login', 'required' => '']); ?>
                            </div>
                            <div class="mb-3">
                                <?= form_label('Adresse Email', 'email', ['class' => 'form-label']); ?>
                                <?= form_input('email', set_value('email'), ['class' => 'form-control', 'id' => 'email', 'required' => '']); ?>
                            </div>
                            <div class="mb-3">
                                <?= form_label('Mot de passe', 'password', ['class' => 'form-label']); ?>
                                <?= form_password('password', set_value('password'), ['class' => 'form-control', 'id' => 'password', 'required' => '']); ?>
                            </div>
                            <div class="mb-3">
                                <?= form_label('Code de Parrainage', 'codeParrainage', ['class' => 'form-label']); ?>
                                <?= form_input('codeParrainage', set_value('codeParrainage'), ['class' => 'form-control', 'id' => 'codeParrainage', 'required' => '']); ?>
                            </div>
                            <div class="d-grid gap-2">
                                <?= form_submit('mysubmit', 'Confirmer', ['class' => 'btn btn-primary btn-lg']); ?>
                            </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .reward-item {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .reward-unlocked {
            background-color: rgba(25, 135, 84, 0.1);
            border-left: 4px solid #198754;
        }
        .reward-locked {
            background-color: rgba(220, 53, 69, 0.1);
            border-left: 4px solid #dc3545;
        }
        .profile-section {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <!-- En-tête du profil -->
                <div class="profile-section">
                    <h1 class="mb-4 text-primary"><i class="fas fa-user-circle me-2"></i>Mon Profil</h1>
                        <div class="col-12 mb-3">
                            <?= anchor(
                                base_url(), 
                               '<i class="fas fa-arrow-left me-2"></i>Retour', 
                                ['class' => 'btn btn-secondary']
                            ) ?>
                        </div>
                    <!-- Affichage des messages de succès/erreur -->
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i><?= session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Informations utilisateur -->
                    <?php if (isset($utilisateur) && !empty($utilisateur)): ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0"><i class="fas fa-id-card me-2"></i>Informations personnelles</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong><i class="fas fa-user me-2"></i>Nom :</strong> <?= $utilisateur['nomUser'] ?></p>
                                        <p><strong><i class="fas fa-user me-2"></i>Prénom :</strong> <?= $utilisateur['prenomUser'] ?></p>
                                        <p><strong><i class="fas fa-map-marker-alt me-2"></i>Adresse :</strong> <?= $utilisateur['adresseUser'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="mb-0"><i class="fas fa-users me-2"></i>Programme de parrainage</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong><i class="fas fa-ticket-alt me-2"></i>Code Parrainage :</strong> 
                                            <span class="badge bg-primary"><?= $utilisateur['codeParrainage'] ?? 'Non défini' ?></span>
                                        </p>
                                        <p><strong><i class="fas fa-user-friends me-2"></i>Personnes parrainées :</strong> 
                                            <span class="badge bg-info"><?= $nbdepersonneParrainer['nbpersonneParrainer'] ?></span>
                                        </p>
                                        
                                        <h6 class="mt-3 mb-2"><i class="fas fa-gift me-2"></i>Mes récompenses :</h6>
                                        <div class="<?= $nbdepersonneParrainer['nbpersonneParrainer'] >= 3 ? 'reward-unlocked' : 'reward-locked' ?> reward-item">
                                            <i class="<?= $nbdepersonneParrainer['nbpersonneParrainer'] >= 3 ? 'fas fa-unlock' : 'fas fa-lock' ?> me-2"></i>
                                            3 filleuls : Mug personnalisé
                                        </div>
                                        <div class="<?= $nbdepersonneParrainer['nbpersonneParrainer'] >= 5 ? 'reward-unlocked' : 'reward-locked' ?> reward-item">
                                            <i class="<?= $nbdepersonneParrainer['nbpersonneParrainer'] >= 5 ? 'fas fa-unlock' : 'fas fa-lock' ?> me-2"></i>
                                            5 filleuls : Chambre gratuite
                                        </div>
                                        <div class="<?= $nbdepersonneParrainer['nbpersonneParrainer'] >= 10 ? 'reward-unlocked' : 'reward-locked' ?> reward-item">
                                            <i class="<?= $nbdepersonneParrainer['nbpersonneParrainer'] >= 10 ? 'fas fa-unlock' : 'fas fa-lock' ?> me-2"></i>
                                            10 filleuls : Un cadeau exclusif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i> Impossible de récupérer vos informations.
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Formulaire de modification -->
                <div class="profile-section">
                    <h2 class="mb-4 text-primary"><i class="fas fa-edit me-2"></i>Modifier mon profil</h2>
                    <?= form_open('c_Profil/update', ['class' => 'needs-validation', 'novalidate' => '']) ?>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <?= form_input([
                                        'name' => 'nomUser', 
                                        'id' => 'nomUser', 
                                        'value' => $utilisateur['nomUser'] ?? '',
                                        'class' => 'form-control',
                                        'placeholder' => 'Votre nom',
                                        'required' => 'required'
                                    ]) ?>
                                    <label for="nomUser">Nom</label>
                                    <div class="invalid-feedback">Veuillez saisir votre nom.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <?= form_input([
                                        'name' => 'prenomUser', 
                                        'id' => 'prenomUser', 
                                        'value' => $utilisateur['prenomUser'] ?? '',
                                        'class' => 'form-control',
                                        'placeholder' => 'Votre prénom',
                                        'required' => 'required'
                                    ]) ?>
                                    <label for="prenomUser">Prénom</label>
                                    <div class="invalid-feedback">Veuillez saisir votre prénom.</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <?= form_textarea([
                                        'name' => 'adresseUser', 
                                        'id' => 'adresseUser', 
                                        'value' => $utilisateur['adresseUser'] ?? '',
                                        'class' => 'form-control',
                                        'placeholder' => 'Votre adresse',
                                        'required' => 'required',
                                        'style' => 'height: 100px'
                                    ]) ?>
                                    <label for="adresseUser">Adresse</label>
                                    <div class="invalid-feedback">Veuillez saisir votre adresse.</div>
                                </div>
                            </div>
                            <?php if (!empty($utilisateur['codeParrainage'])): ?>
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i> Votre code de parrainage : 
                                    <strong><?= $utilisateur['codeParrainage'] ?></strong>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="col-12">
                                <?= form_submit('submit', 'Mettre à jour', ['class' => 'btn btn-primary']) ?>
                                <button type="reset" class="btn btn-secondary">Réinitialiser</button>
                            </div>
                        </div>
                    <?= form_close() ?>
                </div>

                <!-- Tableau des réservations -->
                <div class="profile-section">
                    <h2 class="mb-4 text-primary"><i class="fas fa-calendar-check me-2"></i>Mes Réservations</h2>
                    <?php if (isset($reservations) && !empty($reservations)): ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Places</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($reservations as $resa): ?>
                                    <tr>
                                        <td><?= $resa['idResa'] ?></td>
                                        <td><?= $resa['dateReservation'] ?></td>
                                        <td><span class="badge bg-info"><?= $resa['nbplaceTotale'] ?></span></td>
                                        <td>
                                            <?php if ($resa['statutReservation'] == 'Confirmée'): ?>
                                                <span class="badge bg-success">Confirmée</span>
                                            <?php elseif ($resa['statutReservation'] == 'En attente'): ?>
                                                <span class="badge bg-warning text-dark">En attente</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary"><?= $resa['statutReservation'] ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('c_Profil/annulerReservation/'.$resa['idResa']) ?>" 
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Voulez-vous vraiment annuler cette réservation ?');">
                                                <i class="fas fa-times me-1"></i> Annuler
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i> Vous n'avez aucune réservation.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script pour activer la validation du formulaire
        (function() {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
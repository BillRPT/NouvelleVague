<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Profil</title>
</head>
<body>

    <h1>Mon Profil</h1>

    <!-- Affichage des messages de succès/erreur -->
    <?php if (session()->getFlashdata('success')): ?>
        <p style="color:green;"><?= session()->getFlashdata('success'); ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <!-- Affichage des informations utilisateur -->
    <?php if (isset($utilisateur) && !empty($utilisateur)): ?>
        <p><strong>Nom :</strong> <?= $utilisateur['nomUser'] ?></p>
        <p><strong>Prénom :</strong> <?= $utilisateur['prenomUser'] ?></p>
        <p><strong>Adresse :</strong> <?= $utilisateur['adresseUser'] ?></p>
        <p><strong>Code Parrainage :</strong> <?= $utilisateur['codeParrainage'] ?? '' ?></p>
        <p><strong>Nombre de personnes parrainées :</strong> <?= $nbdepersonneParrainer['nbpersonneParrainer']?></p>
        
        <?php 
            if ($nbdepersonneParrainer['nbpersonneParrainer'] >= 3) { 
        ?>
            <p style="color:green;">🎁 3 filleuls : Mug personnalisé</p>
        <?php 
            } else { 
        ?>
            <p style="color:red;">🎁 3 filleuls : Mug personnalisé</p>
        <?php 
            } 

            if ($nbdepersonneParrainer['nbpersonneParrainer'] >= 5) { 
        ?>
            <p style="color:green;">🎁 5 filleuls : Chambre gratuite</p>
        <?php 
            } else { 
        ?>
            <p style="color:red;">🎁 5 filleuls : Chambre gratuite</p>
        <?php 
            } 

            if ($nbdepersonneParrainer['nbpersonneParrainer'] >= 10) { 
        ?>
            <p style="color:green;">🎁 10 filleuls : Un cadeau exclusif</p>
        <?php 
            } else { 
        ?>
            <p style="color:red;">🎁 10 filleuls : Un cadeau exclusif</p>
        <?php 
            } 
        ?>


    <?php else: ?>
        <p>Impossible de récupérer vos informations.</p>
    <?php endif; ?>

    <hr>
    <h2>Modifier mon profil</h2>
    <form action="<?= base_url('c_Profil/update') ?>" method="post">
        <label for="nomUser">Nom :</label>
        <input type="text" name="nomUser" id="nomUser" value="<?= $utilisateur['nomUser'] ?? '' ?>" required><br>

        <label for="prenomUser">Prénom :</label>
        <input type="text" name="prenomUser" id="prenomUser" value="<?= $utilisateur['prenomUser'] ?? '' ?>" required><br>

        <label for="adresseUser">Adresse :</label>
        <input type="text" name="adresseUser" id="adresseUser" value="<?= $utilisateur['adresseUser'] ?? '' ?>" required><br>

        <?= $utilisateur['codeParrainage'] ?? '' ?>

        <button type="submit">Mettre à jour</button>
    </form>

    <hr>
    <h2>Mes Réservations</h2>
    <?php if (isset($reservations) && !empty($reservations)): ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID Réservation</th>
                    <th>Date Réservation</th>
                    <th>Nb Places</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($reservations as $resa): ?>
                <tr>
                    <td><?= $resa['idResa'] ?></td>
                    <td><?= $resa['dateReservation'] ?></td>
                    <td><?= $resa['nbplaceTotale'] ?></td>
                    <td><?= $resa['statutReservation'] ?></td>
                    <td>
                        <a href="<?= base_url('c_Profil/annulerReservation/'.$resa['idResa']) ?>"
                           onclick="return confirm('Voulez-vous vraiment annuler cette réservation ?');">
                            Annuler
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Vous n'avez aucune réservation.</p>
    <?php endif; ?>

</body>
</html>

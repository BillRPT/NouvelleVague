<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyrano de Bergerac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Hero Section */
        .hero {
            background: #004d40;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            height: 250px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .logo {
            position: absolute;
            top: 1rem;
            left: 1rem;
        }
        .logo img {
            width: 120px;
            height: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }
        .logo img:hover {
            transform: scale(1.1);
        }
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        /* Footer */
        footer {
            background: #004d40;
            color: white;
            padding: 2rem 0;
        }
        footer .social-icons i {
            font-size: 1.5rem;
            margin: 0 10px;
            color: white;
            transition: color 0.3s ease-in-out;
        }
        footer .social-icons i:hover {
            color: #80cbc4;
        }

        .btn-connexion {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-connexion:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<header class="hero">
    <a href="<?= base_url('accueil'); ?>" class="logo">
        <img src="<?= base_url('Image/logo.png'); ?>" alt="Logo Nouvelle Vague">
    </a>
    <h1>Cyrano de Bergerac</h1>
    <a href="<?= base_url('connexion'); ?>" class="btn-connexion">Connexion</a>
</header>

<main class="container">
    <!-- Présentation -->
    <section class="mt-5">
        <h2 class="text-center mb-4">Présentation</h2>
        <p class="text-center">
            Découvrez l'épopée théâtrale de Cyrano de Bergerac, une pièce classique qui mêle amour, bravoure et poésie.
            Assistez à une représentation moderne qui rend hommage à l'œuvre d'Edmond Rostand tout en lui apportant une touche contemporaine.
        </p>
    </section>

    <!-- Vidéo Section -->
    <section class="video-container">
        <h2 class="text-center mb-4">Bande-annonce</h2>
        <video controls>
            <source src="<?= base_url('Image/bandeAnnonce.mp4'); ?>" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéo.
        </video>
    </section>

    <!-- Informations pratiques -->
    <section class="text-center mt-5">
        <h2 class="mb-4">Informations pratiques</h2>
        <p><strong>Date :</strong> 15 mars 2025</p>
        <p><strong>Lieu :</strong> Théâtre de GetCet, 12 rue des Lilas</p>
        <p><strong>Heure :</strong> 20h00</p>
        <p><strong>Prix :</strong> 25€ par personne</p>
        <?= anchor('#', 'Réserver vos places', ['class' => 'btn btn-primary']); ?>
    </section>
</main>

<footer class="text-center">
    <p>&copy; 2025 Théâtre de GetCet. Tous droits réservés.</p>
    <div class="social-icons">
        <?= anchor('#', '<i class="fab fa-facebook"></i>'); ?>
        <?= anchor('#', '<i class="fab fa-twitter"></i>'); ?>
        <?= anchor('#', '<i class="fab fa-instagram"></i>'); ?>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

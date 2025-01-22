<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MXGP 2025 - Sport Mécanique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Hero Section */
        .hero {
            background: #004d40;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            height: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            display: block;
        }
        .logo img {
            width: 120px;
            height:auto;
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
            top: 10px;
            right: 10px;
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

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header class="hero">
    <a href="<?= base_url('accueil'); ?>" class="logo">
        <img src="<?= base_url('Image/logo.png'); ?>" alt="Logo Nouvelle Vague">
    </a>
    <h1>MXGP 2025</h1>
    <a href="<?= base_url('connexion'); ?>" class="btn-connexion">Connexion</a>
</header>

<main class="container">
    <!-- Présentation -->
    <section class="mt-5">
        <h2 class="text-center mb-4">Présentation</h2>
        <p class="text-center">
            Découvrez l'univers palpitant du sport mécanique avec le MXGP 2025 ! Une compétition de motocross et quad
            qui met à l'épreuve les meilleurs pilotes sur des circuits spectaculaires.
        </p>
    </section>

<!-- Image Section -->
<section class="image-container text-center">
    <h2 class="text-center mb-4">Aperçu</h2>
    <div class="d-flex justify-content-center">
        <img src="<?= base_url('Image/moto-cross.jpg'); ?>" alt="Moto-cross" class="img-fluid" style="border-radius: 10px;">
    </div>
</section>


    <!-- Informations pratiques -->
    <section class="text-center mt-5">
        <h2 class="mb-4">Informations pratiques</h2>
        <p><strong>Date :</strong> 20 juin 2025</p>
        <p><strong>Lieu :</strong> Circuit de GetCet, Route des Collines</p>
        <p><strong>Heure :</strong> 14h00</p>
        <p><strong>Prix :</strong> 50€ par personne</p>
        <?= anchor('#', 'Réserver vos places', ['class' => 'btn btn-primary']); ?>
    </section>
</main>

<footer class="text-center">
    <p>&copy; 2025 Circuit de GetCet. Tous droits réservés.</p>
    <div class="social-icons mt-3">
        <?= anchor('#', '<i class="fab fa-facebook"></i>'); ?>
        <?= anchor('#', '<i class="fab fa-twitter"></i>'); ?>
        <?= anchor('#', '<i class="fab fa-instagram"></i>'); ?>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

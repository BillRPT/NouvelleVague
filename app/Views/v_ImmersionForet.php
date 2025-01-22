<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Immersion en Forêt</title>
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
    <!-- Logo cliquable -->
    <a href="<?= base_url('accueil'); ?>" class="logo">
    <img src="<?= base_url('Image/logo.png'); ?>" alt="Logo Nouvelle Vague">
</a>

    <h1>Immersion en Forêt</h1>

    <a href="<?= base_url('connexion') ?>" class="btn-connexion">Connexion</a>
</header>

<main class="container content">
    <section>
        <h2 class="text-center mb-4">Découvrez la sérénité de la nature</h2>
        <p class="text-center">Plongez dans une expérience inoubliable au cœur des bois. Respirez l'air pur, écoutez le chant des oiseaux et découvrez la richesse de la flore locale. Une aventure idéale pour les amoureux de la nature et les curieux en quête de tranquillité.</p>
    </section>

    <section class="row mt-5">
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url('Image/randonnee.jpg'); ?>" class="card-img-top" alt="Randonnée">
                <div class="card-body text-center">
                    <h5 class="card-title">Randonnées guidées</h5>
                    <p class="card-text">Participez à des randonnées encadrées par des guides locaux expérimentés pour découvrir des endroits secrets.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url('Image/Observationfaune.jpg'); ?>" class="card-img-top" alt="Faune">
                <div class="card-body text-center">
                    <h5 class="card-title">Observation de la faune</h5>
                    <p class="card-text">Apprenez à reconnaître les espèces animales locales grâce à des activités d'observation et d'identification.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="<?= base_url('Image/pique-nique.jpg'); ?>" class="card-img-top" alt="Pique-nique">
                <div class="card-body text-center">
                    <h5 class="card-title">Pique-niques en pleine nature</h5>
                    <p class="card-text">Savourez des repas champêtres en harmonie avec la nature, dans des lieux spécialement aménagés.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center mt-5 mb-5">
    <h2>Informations pratiques</h2>
    <p>Adresse : Forêt de GetCet, Route de la Sérénité<br> Téléphone : 01 23 45 67 89<br> Horaires : Tous les jours de 8h à 18h</p>
    <a href="#" class="btn btn-primary mb-5">Réserver une activité</a>
</section>

</main>

<footer class="text-center">
    <p>&copy; 2025 Ville de GetCet. Tous droits réservés.</p>
    <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

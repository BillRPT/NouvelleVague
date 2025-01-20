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
            height: 30vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .logo {
            position: absolute;
            top: 1rem !important;
            left: 1rem !important;
            margin: 10px !important;/* Ajuste les marges autour du logo */
        }
        .logo img {
            width: 50px !important;
            height: 50px !important;
            object-fit: cover !important;
        }

        
        .logo img:hover {
            transform: scale(1.1); /* Animation au survol */
        }
        .hero h1 {
            font-size: 3rem; /* Agrandi le titre */
            margin-bottom: 1rem;
        }
        .btn-home {
            font-size: 1rem;
            color: white;
            background-color: #43cea2;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-home:hover {
            background-color: #185a9d;
            transform: scale(1.1);
        }
        /* Card Section */
        .custom-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border-radius: 15px;
            overflow: hidden;
        }
        .custom-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        .custom-card img {
            transition: transform 0.3s ease-in-out;
        }
        .custom-card:hover img {
            transform: scale(1.1);
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
    </style>
</head>
<body>

<header class="hero">
    <?= anchor('accueil', img(['src' => base_url('Image/logo.png'), 'alt' => 'Logo Nouvelle Vague', 'class' => 'logo'])); ?>
    <h1>Immersion en Forêt</h1>
</header>

<main class="container content">
    <section>
        <h2 class="text-center mb-4">Découvrez la sérénité de la nature</h2>
        <p class="text-center">Plongez dans une expérience inoubliable au cœur des bois. Respirez l'air pur, écoutez le chant des oiseaux et découvrez la richesse de la flore locale. Une aventure idéale pour les amoureux de la nature et les curieux en quête de tranquillité.</p>
    </section>

    <section class="row mt-5">
        <div class="col-md-4">
            <div class="custom-card">
                <?= anchor('#', img(['src' => base_url('Image/randonnee.jpg'), 'class' => 'card-img-top', 'alt' => 'Randonnée'])); ?>
                <div class="card-body text-center">
                    <h5 class="card-title">Randonnées guidées</h5>
                    <p class="card-text">Participez à des randonnées encadrées par des guides locaux expérimentés pour découvrir des endroits secrets.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card">
                <?= anchor('#', img(['src' => base_url('Image/Observationfaune.jpg'), 'class' => 'card-img-top', 'alt' => 'Faune'])); ?>
                <div class="card-body text-center">
                    <h5 class="card-title">Observation de la faune</h5>
                    <p class="card-text">Apprenez à reconnaître les espèces animales locales grâce à des activités d'observation et d'identification.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card">
                <?= anchor('#', img(['src' => base_url('Image/pique-nique.jpg'), 'class' => 'card-img-top', 'alt' => 'Pique-nique'])); ?>
                <div class="card-body text-center">
                    <h5 class="card-title">Pique-niques en pleine nature</h5>
                    <p class="card-text">Savourez des repas champêtres en harmonie avec la nature, dans des lieux spécialement aménagés.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center mt-5">
        <h2>Informations pratiques</h2>
        <p>Adresse : Forêt de GetCet, Route de la Sérénité<br> Téléphone : 01 23 45 67 89<br> Horaires : Tous les jours de 8h à 18h</p>
        <?= anchor('#', 'Réserver une activité', ['class' => 'btn btn-primary']); ?>
    </section>
</main>

<footer class="text-center">
    <p>&copy; 2025 Ville de GetCet. Tous droits réservés.</p>
    <div class="social-icons">
        <?= anchor('#', '<i class="fab fa-facebook"></i>'); ?>
        <?= anchor('#', '<i class="fab fa-twitter"></i>'); ?>
        <?= anchor('#', '<i class="fab fa-instagram"></i>'); ?>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>

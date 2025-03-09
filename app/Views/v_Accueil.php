<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil - GetCet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-image {
            max-width: 100%;
            height: auto;
        }
        .zoom {
            text-align: center;
            margin: 20px;
            transition: transform 0.2s;
        }
        .zoom:hover {
            transform: scale(1.1);
        }
        .outlined-text {
            font-weight: bold;
            text-transform: uppercase;
        }
        .event-card {
            height: 100%;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .event-img {
            height: 200px;
            object-fit: cover;
        }
        .event-date {
            color: #007bff;
            font-weight: bold;
        }
        .event-places {
            color: #28a745;
        }
    </style>
</head>
<body>
    <header>
        <!--<div class="logo text-center py-3">
            <img src="<?= base_url('Image/logo.png') ?>" alt="Logo GetCet" height="70">
        </div>-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link active" href="#decouvrir">Découvrir</a></li>
                        <li class="nav-item"><a class="nav-link" href="#activites">Que faire</a></li>
                        <li class="nav-item"><a class="nav-link" href="#hebergement">Où dormir</a></li>
                        <li class="nav-item"><a class="nav-link" href="#evenements">Événements</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section id="decouvrir" class="container text-center py-5">
            <h2 class="mb-4">Découvrez GetCet</h2>
            <p class="lead mb-4">Explorez le patrimoine culturel et naturel unique de GetCet.</p>
            <img src="<?= base_url('Image/aix.png') ?>" class="custom-image rounded shadow" alt="GetCet panorama">
        </section>

        <section id="activites" class="container py-5">
            <h2 class="text-center mb-4">Que faire ?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Randonnées</h3>
                            <p class="card-text">Découvrez les magnifiques sentiers de la région et profitez de vues panoramiques exceptionnelles.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Culture</h3>
                            <p class="card-text">Visitez nos musées et monuments historiques pour découvrir le riche patrimoine de GetCet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Sport mécanique</h3>
                            <p class="card-text">Initiation au quad ainsi qu'à la moto-cross dans nos beaux terrains dédiés aux sensations fortes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="hebergement" class="container py-5" style="background-color: #f9f9f9;">
            <h2 class="text-center mb-4">Où dormir ?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h3 class="card-title">Hôtel Le Central</h3>
                            <p class="card-text">12 rue des Lilas, GetCet<br>Tél : 01 23 45 67 89</p>
                            <img src="<?= base_url('Image/ImageHotelCentral.jpg') ?>" class="custom-image rounded" alt="Hôtel Le Central">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h3 class="card-title">Chambres d'hôtes</h3>
                            <p class="card-text">8 chemin des Vignes, GetCet<br>Tél : 01 98 76 54 32</p>
                            <img src="<?= base_url('Image/ImageHotelHote.jpg') ?>" class="custom-image rounded" alt="Chambres d'hôtes">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <div class="card-body">
                            <h3 class="card-title">Camping Le Ruisseau</h3>
                            <p class="card-text">Route de la Forêt, GetCet<br>Tél : 01 56 78 90 12</p>
                            <img src="<?= base_url('Image/ImageCamping.jpg') ?>" class="custom-image rounded" alt="Camping Le Ruisseau">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        


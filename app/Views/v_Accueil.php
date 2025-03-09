<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
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
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="<?= base_url('Image/logo.png') ?>" alt="Logo">
        </div>
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
            <h2>Découvrez GetCet</h2>
            <p>Explorez le patrimoine culturel et naturel unique de GetCet.</p>
            <img src="<?= base_url('Image/aix.png') ?>" width="400" height="400" class="custom-image">
        </section>

        <section id="activites" class="container py-5">
            <h2 class="text-center">Que faire ?</h2>
            <div class="row">
                <div class="col-md-4"><div class="card"><div class="card-body"><h3>Randonnées</h3><p>Découvrez les magnifiques sentiers de la région.</p></div></div></div>
                <div class="col-md-4"><div class="card"><div class="card-body"><h3>Culture</h3><p>Visitez nos musées et monuments historiques.</p></div></div></div>
                <div class="col-md-4"><div class="card"><div class="card-body"><h3>Sport mécanique</h3><p>Initiation au quad ainsi qu'à la moto-cross dans nos beaux terrains dédiés.</p></div></div></div>
            </div>
        </section>

        <section id="hebergement" class="container py-5" style="background-color: #f9f9f9;">
            <h2 class="text-center">Où dormir ?</h2>
            <div class="row">
                <div class="col-md-4"><div class="card"><div class="card-body"><h3>Hôtel Le Central</h3><p>12 rue des Lilas, GetCet<br>Tél : 01 23 45 67 89</p><img src="<?= base_url('Image/ImageHotelCentral.jpg') ?>" width="370" height="300" class="custom-image"></div></div></div>
                <div class="col-md-4"><div class="card"><div class="card-body"><h3>Chambres d'hôtes</h3><p>8 chemin des Vignes, GetCet<br>Tél : 01 98 76 54 32</p><img src="<?= base_url('Image/ImageHotelHote.jpg') ?>" width="370" height="267" class="custom-image"></div></div></div>
                <div class="col-md-4"><div class="card"><div class="card-body"><h3>Camping Le Ruisseau</h3><p>Route de la Forêt, GetCet<br>Tél : 01 56 78 90 12</p><img src="<?= base_url('Image/ImageCamping.jpg') ?>" width="370" height="300" class="custom-image"></div></div></div>
            </div>
        </section>

        <section id="evenements" class="container py-5">
            <h2 class="text-center">Événements</h2>
            <?php if (!empty($evenements)): ?>
                <div class="row">
                    <?php foreach ($evenements as $evenement): ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?= base_url(esc($evenement['imageEvenement'])) ?>" class="card-img-top" alt="<?= esc($evenement['nomEvenement']) ?>">
                                <div class="card-body">
                                    <h3><?= esc($evenement['nomEvenement']) ?></h3>
                                    <p><?= esc($evenement['descriptionEvenement']) ?></p>
                                    <p><strong>Date :</strong> <?= esc($evenement['dateEvenement']) ?></p>
                                    <p><strong>Places disponibles :</strong> <?= esc($evenement['nbplaceDispo']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-center">Aucun événement trouvé</p>
            <?php endif; ?>
        </section>
    </main>

    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4"><h5>À propos</h5><p>GetCet est une destination incontournable pour découvrir des paysages magnifiques.</p></div>
                <div class="col-md-4"><h5>Navigation</h5><ul class="list-unstyled"><li><a href="#decouvrir" class="text-white text-decoration-none">Découvrir</a></li><li><a href="#activites" class="text-white text-decoration-none">Que faire ?</a></li><li><a href="#hebergement" class="text-white text-decoration-none">Où dormir</a></li><li><a href="#evenements" class="text-white text-decoration-none">Événements</a></li><li><a href="#contact" class="text-white text-decoration-none">Contact</a></li></ul></div>
                <div class="col-md-4"><h5>Contact</h5><p><strong>Adresse :</strong> 12 rue des Lilas, GetCet<br><strong>Tél :</strong> 01 23 45 67 89<br><strong>Email :</strong> <a href="mailto:info@getcet.com" class="text-white text-decoration-none">info@getcet.com</a></p></div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>
</html>
 
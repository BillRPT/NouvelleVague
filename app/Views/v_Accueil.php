<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez la ville de GetCet, ses événements, ses lieux incontournables et ses informations pratiques.">
    <title>Ville de GetCet</title>
    <style>
        /* Modifier la police globale */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header correction pour aligner le titre au centre */
        .header-container {
            position: relative;
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 20px;
        }

        .header-container h1 {
            margin: 0;
        }

        .btn-login {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            background-color: #0056b3;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-login:hover {
            background-color: #003d82;
        }

        /* Nav correction */
        nav {
            background-color: #007bff;
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .navbar-nav .nav-link {
            padding: 8px 15px;
            color: white;
        }

        .navbar-nav .nav-link:hover {
            text-decoration: underline;
        }

        /* Customisation de la rangée d'images */
        .custom-row {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 30px;
            margin: 20px 0;
        }

        h3 {
            font-family: 'Georgia', serif;
        }

        /* Ajuster la taille et l'espacement des images */
        .custom-row img {
            width: 250px;
            height: 250px;
            object-fit: cover;
        }

        /* Effet de zoom amélioré */
        .zoom img {
            border-radius: 10%;
            transform: scale(1);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .zoom:hover img {
            transform: scale(1.2);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .zoom h3 {
            text-align: center;
            margin-top: 10px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <header class="header-container">
      <h1>Bienvenue à GetCet</h1>
      <a href="#" class="btn-login">Connexion</a>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#decouvrir">Découvrir</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#activites">Que faire</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#hebergement">Où dormir</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#evenements">Événements</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main>
      <section id="decouvrir" class="container text-center py-5">
        <h2> Découvrez GetCet</h2>
        <p>Explorez le patrimoine culturel et naturel unique de GetCet.</p>
        <?php 
            $imageProperties = [
                'src'    => 'Image/aix.png',
                'width'  => '400',
                'height' => '400',
                'class'  => 'custom-image',
            ];
            echo img($imageProperties); 
        ?>
      </section>
      <section id="activites" class="container py-5">
        <h2 class="text-center">Que faire ?</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3>Randonnées</h3>
                <p>Découvrez les magnifiques sentiers de la région.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3>Culture</h3>
                <p>Visitez nos musées et monuments historiques.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3>Sport mécanique</h3>
                <p>Initiation au quad ainsi qu'à la moto-cross dans nos beaux terrains dédiés pour cela.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id='hebergement' class='container py-5' style='background-color: #f9f9f9; color: #333;'>
        <h2 class="text-center">Où dormir ?</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3>Hôtel Le Central</h3>
                <p>Adresse : 12 rue des Lilas, GetCet<br> Téléphone : 01 23 45 67 89</p>
                <?php 
                  $imageProperties = ['src' => "Image/ImageHotelCentral.jpg"];
                  echo img($imageProperties); 
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3>Chambres d'hôtes La Clé des Champs</h3>
                <p>Adresse : 8 chemin des Vignes, GetCet<br> Téléphone : 01 98 76 54 32</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3>Camping Le Ruisseau</h3>
                <p>Adresse : Route de la Forêt, GetCet<br> Téléphone : 01 56 78 90 12</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id='evenements' class='container py-5' style='background-color: #e0f7fa; color: #006064;'>
        <h4 class='text-center'>Nos activités phares</h4>
        <h3 class="outlined-text display-1 text-center">QUI VONT VOUS PLAIRE !</h3>
        <div class='custom-row'>
          <div class="zoom">
              <?php 
                  $imageProperties = ['src' => "Image/foret.jpg"];
                  echo anchor('https://www.google.com/',img($imageProperties)); 
              ?>
              <h3><strong>Immersion en forêt</strong></h3>
          </div>
          <div class="zoom">
              <?php 
                  $imageProperties = ['src' => "Image/theatre.jpg"];
                  echo anchor('https://www.google.com/',img($imageProperties)); 
              ?>
              <h3><strong>Cyrano de Bergerac</strong></h3>
          </div>
          <div class="zoom">
              <?php 
                  $imageProperties = ['src' => "Image/moto.jpg"];
                  echo anchor('https://www.google.com/',img($imageProperties)); 
              ?>
              <h3><strong>MXGP 2025</strong></h3>
          </div>
        </div>
      </section>
    </main>
    <footer class="bg-dark text-white text-center py-3">
      <p>&copy; 2025 Ville de GetCet. Tous droits réservés.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

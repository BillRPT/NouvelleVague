<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez la ville de GetCet, ses événements, ses lieux incontournables et ses informations pratiques.">
    <title>Ville de GetCet</title>
    <style>
        /*Créer une class custom row pour modifier la taille de l'image*/
        .custom-row {
            width: 20%;
        }

        .zoom img {
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }
        .zoom:hover img {
            -webkit-transform: scale(1.3);
            transform: scale(1.3);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <header class="bg-primary text-white py-3">
      <div class="container text-center">
        <h1>Bienvenue à GetCet</h1>
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                  <a class="nav-link" href="#agenda">Agenda</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contact">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <main>
      <section id="decouvrir" class="container text-center py-5">
        <h2>Découvrez GetCet</h2>
        <p>Explorez le patrimoine culturel et naturel unique de GetCet.</p> <?php 
                //Déclarer une variable et définir la taille ect
                $imageProperties = [
                    'src'    => 'Image/aix.png',
                    'width'  => '400',
                    'height' => '400',
                    'class'  => 'custom-image',
                ];

                //L'afficher avec la méthode img de code igniter
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
                <h3>Nature</h3>
                <p>Explorez la beauté naturelle de GetCet.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
        <!--Section des événements-->
      <section id='evenements' class='container py-5' style='background-color: #e0f7fa; color: #006064;'>
        <h4 class='text-center'>Les Événements</h4>
        <h3 class="outlined-text display-1 text-center">QUI VONT VOUS PLAIRE !</h3>
        <div class='row custom-row zoom'>
            
                <?php 
                    $imageProperties = [
                        'src' => "Image/foret.jpg",
                    ];

                    echo img($imageProperties);
                ?>
            
        </div>
      </section>
    </main>
    <footer class="bg-dark text-white text-center py-3">
      <p>&copy; 2025 Ville de GetCet. Tous droits réservés.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
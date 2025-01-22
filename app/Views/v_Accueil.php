  </header>
    <div class="logo">
    <?php
      $imageProperties = [
        'src'    => base_url('Image/logo.png'),
      ];
      echo img($imageProperties); 
    ?>
    </div>
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
                'src'    => base_url('Image/aix.png'),
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
                  $imageProperties2 = [
                    'src'    => 'Image/ImageHotelCentral.jpg',
                    'width'  => '370',
                    'height' => '300',
                    'class'  => 'custom-image',
                ];

                  echo img($imageProperties2); 
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3>Chambres d'hôtes La Clé des Champs</h3>
                <p>Adresse : 8 chemin des Vignes, GetCet<br> Téléphone : 01 98 76 54 32</p>
                <?php 
                  $imageProperties3 = [
                    'src'    => 'Image/ImageHotelHote.jpg',
                    'width'  => '370',
                    'height' => '267',
                    'class'  => 'custom-image',
                ];

                  echo img($imageProperties3); 
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3>Camping Le Ruisseau</h3>
                <p>Adresse : Route de la Forêt, GetCet<br> Téléphone : 01 56 78 90 12</p>
                <?php 
                  $imageProperties4 = [
                    'src'    => 'Image/ImageCamping.jpg',
                    'width'  => '370',
                    'height' => '300',
                    'class'  => 'custom-image',
                ];

                  echo img($imageProperties4); 
                ?>
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
                   $imageProperties = ['src' => "Image/foret.jpg", 'alt' => "Immersion en forêt"];
                   echo anchor('immersion-foret', img($imageProperties));
              ?>
              <h3><strong>Immersion en forêt</strong></h3>
          </div>
          <div class="zoom">
              <?php 
                  $imageProperties = ['src' => "Image/theatre.jpg"];
                  echo anchor('culture',img($imageProperties)); 
              ?>
              <h3><strong>Cyrano de Bergerac</strong></h3>
          </div>
          <div class="zoom">
              <?php 
                  $imageProperties = ['src' => "Image/moto.jpg"];
                  echo anchor('sport-mecanique',img($imageProperties)); 
              ?>
              <h3><strong>MXGP 2025</strong></h3>
          </div>
        </div>
      </section>
    </main>
    <footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <!-- Section Informations -->
            <div class="col-md-4">
                <h5>À propos</h5>
                <p>
                    GetCet est une destination incontournable pour découvrir des paysages magnifiques, des activités enrichissantes et un patrimoine culturel unique.
                </p>
            </div>

            <!-- Section Navigation -->
            <div class="col-md-4">
                <h5>Navigation</h5>
                <ul class="list-unstyled">
                    <li><a href="#decouvrir" class="text-white text-decoration-none">Découvrir</a></li>
                    <li><a href="#activites" class="text-white text-decoration-none">Que faire ?</a></li>
                    <li><a href="#hebergement" class="text-white text-decoration-none">Où dormir</a></li>
                    <li><a href="#evenements" class="text-white text-decoration-none">Événements</a></li>
                    <li><a href="#contact" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>

            <!-- Section Contact -->
            <div class="col-md-4">
                <h5>Contact</h5>
                <p>
                    <strong>Adresse :</strong> 12 rue des Lilas, GetCet<br>
                    <strong>Téléphone :</strong> 01 23 45 67 89<br>
                    <strong>Email :</strong> <a href="mailto:info@getcet.com" class="text-white text-decoration-none">info@getcet.com</a>
                </p>
            </div>
        </div>

        <!-- Ligne de séparation -->
        <hr class="my-4">

        <!-- Section Réseaux Sociaux -->
        <div class="d-flex justify-content-between align-items-center">
            <p class="mb-0">&copy; 2025 Ville de GetCet. Tous droits réservés.</p>
            <div class="social-icons">
                <a href="#" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white mx-2"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

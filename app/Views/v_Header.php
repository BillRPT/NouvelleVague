<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez la ville de GetCet, ses événements, ses lieux incontournables et ses informations pratiques.">
    <title>Ville de GetCet</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
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
        .btn-login-container {
            position: absolute;
            top: 51%;
            right: 20px;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
        }
        .btn-login {
            background-color: #0056b3;
            color: #fff;
            border: none;
            padding: 1px 20px;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            margin: 5px 0;
        }
        .btn-login:hover {
            background-color: #003d82;
        }
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
        .custom-row {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 30px;
            margin: 20px 0;
        }
        .custom-row img {
            width: 250px;
            height: 250px;
            object-fit: cover;
        }
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
        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            display: block;
        }
        .logo img {
            width: 100px;
            height: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }
        .logo img:hover {
            transform: scale(1.1);
        }
        footer .social-icons i {
            font-size: 1.5rem;
            margin: 0 10px;
            color: white;
            transition: color 0.3s ease-in-out;
        }
        footer .social-icons i:hover {
            color: rgb(255, 255, 255);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <header class="header-container">
      <h1>Bienvenue à GetCet</h1>
      <div class="btn-login-container">
        <!-- Bouton pour réserver un événement (si connecté) -->
        <?php if (session()->has('user')): ?>
            <?= anchor('reservation', 'Réserver un événement', ['class' => 'btn-login']); ?>
        <?php else: ?>
          <!-- Sinon, on propose de se connecter -->
          <?= anchor('c onnexion', 'Connectez-vous pour réserver', ['class' => 'btn-login']); ?>
        <?php endif; ?>

        <!-- Bouton pour accéder au profil (si connecté) -->
        <?php if (session()->has('user')): ?>
          <?= anchor('c_Profil', 'Accéder au profil', ['class' => 'btn-login']); ?>
        <?php else: ?>
          <?= anchor('connexion', 'Connectez-vous pour votre profil', ['class' => 'btn-login']); ?>
        <?php endif; ?>
      </div>
    </header>

    

  </body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panneau Administrateur Maire</title>
    <style>
         body {
            background: linear-gradient(to right, #00c6ff, #0072ff); /* Blue gradient */
        }
        
        h1 {
            font-family: Georgia, serif;
            background-color: #0056b3;
            color: white;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 2rem;
            max-width: 90%;
            margin: 0;
        }

        a {
            text-decoration: none;
            font-size: 1.0rem;
            color: #ffffff;
            background-color: #28a745;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin: 5px;
        }

        a:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        a:focus {
            outline: none;
            box-shadow: 0 0 0 2px #0056b3;
        }

        .link-container {
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <center><h1>Bienvenue <?php echo $_SESSION['user']; ?> sur le Panneau Administrateur Maire !</h1></center>
    <div class="link-container" style="text-align: center;">
        <?php echo anchor('consulterinscriptionEvenement', 'Les inscriptions pour chaque événements'); echo anchor ('/c_Administration/consulterpopulariterEvenement', 'Les evenements populaire');?>
    </div>


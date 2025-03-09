<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation Réussie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 18px;
            color: #333;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Votre réservation a été enregistrée !</h1>
        <p>Merci pour votre inscription.</p>
        <?php echo anchor('retour', 'Retourner au menu principal', ['class' => 'btn']); ?>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panneau Administrateur Secretaire</title>
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

        ol {
            list-style-type: none; 
            padding: 0;
            margin: 0;
        }

        ol li {
            background-color: #fff;
            margin: 10px 0;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        ol li span {
            font-weight: bold;
            color: #007bff;
        }

        /* Styling for the table */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 20px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #0072ff;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr {
            background-color: #e0e0e0;
        }

        td {
            color: #333;
        }

        td a {
            color: #0072ff;
            text-decoration: none;
        }

        td a:hover {
            color: #0056b3;
        }

                /* Ajuster la taille et l'apparence des boutons dans le tableau */
        table .btn {
            padding: 5px 10px;
            font-size: 0.9rem;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }

        /* Appliquer un espacement entre les boutons pour ne pas qu'ils se chevauchent */
        table td {
            text-align: center;
        }

        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            font-family: Arial, sans-serif;
        }

    form label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    form input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
    }

    form input:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    form input[type="submit"] {
        background: #007bff;
        color: white;
        border: none;
        padding: 12px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s ease;
        border-radius: 5px;
    }

    form input[type="submit"]:hover {
        background: #0056b3;
    }

    h3 {
        font-size: 1.5rem;
        color: white;
        text-align: center;
        margin-bottom: 10px;
    }


    </style>
</head>
<body>
    <center><h1>Bienvenue <?php echo $_SESSION['user']; ?> sur le Panneau Administrateur Secretaire !</h1></center>
    <div class="link-container" style="text-align: center;">
        <?php echo anchor('creerEvenements', 'Créer un nouvel événement');?><?php echo anchor('supprimerEvenement', 'Supprimer un événement');?>
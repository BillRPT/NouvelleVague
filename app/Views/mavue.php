
<html lang="en">
<head>
    <title>Redirection controleur</title>
    <style>
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
    </style>
</head>
<body>
<center>
    <h1>Mes contacts</h1>
    </br>
    <?php echo anchor('/Moncontroleur/lesContacts', 'Afficher') . ' '; echo anchor('/Moncontroleur/nbContacts', 'Nombre') . ' '; echo anchor('/Moncontroleur/ajouterContacts', 'Ajouter') . ' '; echo anchor('/Moncontroleur/index', 'Accueil') . ' '; echo anchor('/Moncontroleur/testConnexion', 'Connexion')?>
</center>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MXGP 2025 - Sport Mécanique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Hero Section */
        .hero {
            background: #004d40;
            color: white;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            height: 200px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            display: block;
        }
        .logo img {
            width: 120px;
            height:auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }
        .logo img:hover {
            transform: scale(1.1);
        }
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        /* Footer */
        footer {
            background: #004d40;
            color: white;
            padding: 2rem 0;
        }
        footer .social-icons i {
            font-size: 1.5rem;
            margin: 0 10px;
            color: white;
            transition: color 0.3s ease-in-out;
        }
        footer .social-icons i:hover {
            color: #80cbc4;
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
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .btn-login:hover {
            background-color: #003d82;
        }

        .header-container {
            position: relative;
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header class="hero">
    <a href="<?= base_url('accueil'); ?>" class="logo">
        <img src="<?= base_url('Image/logo.png'); ?>" alt="Logo Nouvelle Vague">
    </a>
    <h1>MXGP 2025</h1>
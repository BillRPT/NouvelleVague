
</header>

<main class="container">
    <!-- Présentation -->
    <section class="mt-5">
        <h2 class="text-center mb-4">Présentation</h2>
        <p class="text-center">
            Découvrez l'univers palpitant du sport mécanique avec le MXGP 2025 ! Une compétition de motocross et quad
            qui met à l'épreuve les meilleurs pilotes sur des circuits spectaculaires.
        </p>
    </section>

<!-- Image Section -->
<section class="image-container text-center">
    <h2 class="text-center mb-4">Aperçu</h2>
    <div class="d-flex justify-content-center">
        <img src="<?= base_url('Image/moto-cross.jpg'); ?>" alt="Moto-cross" class="img-fluid" style="border-radius: 10px;">
    </div>
</section>


    <!-- Informations pratiques -->
    <section class="text-center mt-5">
        <h2 class="mb-4">Informations pratiques</h2>
        <p><strong>Date :</strong> 20 juin 2025</p>
        <p><strong>Lieu :</strong> Circuit de GetCet, Route des Collines</p>
        <p><strong>Heure :</strong> 14h00</p>
        <p><strong>Prix :</strong> 50€ par personne</p>
        <?= anchor('#', 'Réserver vos places', ['class' => 'btn btn-primary']); ?>
    </section>
</main>

<footer class="text-center">
    <p>&copy; 2025 Circuit de GetCet. Tous droits réservés.</p>
    <div class="social-icons mt-3">
        <?= anchor('#', '<i class="fab fa-facebook"></i>'); ?>
        <?= anchor('#', '<i class="fab fa-twitter"></i>'); ?>
        <?= anchor('#', '<i class="fab fa-instagram"></i>'); ?>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

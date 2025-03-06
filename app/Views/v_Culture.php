
</header>

<main class="container">
    <!-- Présentation -->
    <section class="mt-5">
        <h2 class="text-center mb-4">Présentation</h2>
        <p class="text-center">
            Découvrez l'épopée théâtrale de Cyrano de Bergerac, une pièce classique qui mêle amour, bravoure et poésie.
            Assistez à une représentation moderne qui rend hommage à l'œuvre d'Edmond Rostand tout en lui apportant une touche contemporaine.
        </p>
    </section>

    <!-- Vidéo Section -->
    <section class="video-container">
        <h2 class="text-center mb-4">Bande-annonce</h2>
        <video controls>
            <source src="<?= base_url('Image/bandeAnnonce.mp4'); ?>" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéo.
        </video>
    </section>

    <!-- Informations pratiques -->
    <section class="text-center mt-5">
        <h2 class="mb-4">Informations pratiques</h2>
        <p><strong>Date :</strong> 15 mars 2025</p>
        <p><strong>Lieu :</strong> Théâtre de GetCet, 12 rue des Lilas</p>
        <p><strong>Heure :</strong> 20h00</p>
        <p><strong>Prix :</strong> 25€ par personne</p>
        <?= anchor('reservation', 'Réserver vos places', ['class' => 'btn btn-primary']); ?>
    </section>
</main>

<footer class="text-center">
    <p>&copy; 2025 Théâtre de GetCet. Tous droits réservés.</p>
    <div class="social-icons">
        <?= anchor('#', '<i class="fab fa-facebook"></i>'); ?>
        <?= anchor('#', '<i class="fab fa-twitter"></i>'); ?>
        <?= anchor('#', '<i class="fab fa-instagram"></i>'); ?>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

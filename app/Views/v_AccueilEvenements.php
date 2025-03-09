<section id="evenements" class="container py-5">
    <h2 class="text-center mb-4">Événements</h2>
    <div class="row">
        <?php if (!empty($lesEvenements)): ?>
            <?php foreach ($lesEvenements as $unEvenement): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <?= img([
                            'src'   => esc($unEvenement["imageEvenement"]),
                            'alt'   => "Image de l'événement",
                            'class' => "card-img-top",
                            'style' => "height:200px; object-fit:cover;"
                        ]) ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($unEvenement["nomEvenement"]) ?></h5>
                            <p class="card-text"><strong>Date :</strong> <?= esc($unEvenement["dateEvenement"]) ?></p>
                            <p class="card-text"><?= esc($unEvenement["descriptionEvenement"]) ?></p>
                            <p class="card-text"><strong>Places :</strong> <?= esc($unEvenement["nbplaceDispo"]) ?> / <?= esc($unEvenement["nbplaceMax"]) ?></p>
                            <p class="card-text"><strong>Durée :</strong> <?= esc($unEvenement["dureeEvenement"]) ?> heures</p>
                            <p class="card-text"><strong>Statut :</strong> <?= esc($unEvenement["statutEvenement"]) ?></p>
                            <p class="card-text"><strong>Représentant :</strong> <?= esc($unEvenement["representant"]) ?></p>
                        </div>
                        <div class="card-footer text-center">
                             <?= anchor('reservation', 'Réserver un événement', ['class' => 'btn-login']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Aucun événement disponible.</p>
        <?php endif; ?>
    </div>
</section>

<section id="evenements" class="container py-5">
    <h2 class="text-center mb-4">Événements</h2>
        <div class="row">
            <?php 
            
            foreach ($lesEvenements as $unEvenement) {
                echo img($unEvenement["imageEvenement"], false, [
                    'style' => 'width:200px; height:200px; object-fit:cover;'
                ]);
                echo "Nom : " . $unEvenement["nomEvenement"];
            }
            
            
            
            ?>
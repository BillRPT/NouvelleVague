<?php 

    namespace Config;

    use FPDF; // Importer FPDF

    Class Fonction {

         //Fonction qui génére le code de parainage
        public function generateCode() {
            $premierCara = 'GC';
            $aleatoire = sprintf('%06d', mt_rand(0, 999999));
            return $premierCara . $aleatoire;
        }

        public function generatePdf($tabevenementPopulaire) {
            // Nettoyer le tampon de sortie
            if (ob_get_length()) ob_end_clean(); 
        
            // S'assurer que $tabevenementPopulaire est un tableau, sinon le rendre vide
            if (!is_array($tabevenementPopulaire)) {
                $tabevenementPopulaire = [];
            }
        
            // Inclure la bibliothèque FPDF
            require('pdf/fpdf.php'); 
        
            // Création du document PDF
            $pdf = new FPDF();
            $pdf->AddPage();
        
            // Définir la police
            $pdf->SetFont('Arial', 'B', 16);
            
            // Titre du document
            $pdf->Cell(0, 10, "Liste des evenements populaires", 0, 1, 'C');
            $pdf->Ln(10); // Espacement avant de commencer la liste des événements
        
            // Boucle à travers les événements
            foreach ($tabevenementPopulaire as $unEvent) {
                $pdf->SetFont('Arial', '', 12); // Réinitialiser la police pour le contenu
        
                // Ajouter les informations de chaque événement
                $pdf->Cell(60, 10, "Nom Evenement : " . $unEvent['nomEvenement'], 0, 1);
                $pdf->Cell(60, 10, "Date Evenement : " . $unEvent['dateEvenement'], 0, 1);
                $pdf->Cell(60, 10, "Nb Reservations Totale : " . $unEvent['nb_reservations'], 0, 1);
                $pdf->Cell(60, 10, "Nb Places Reservees : " . $unEvent['nb_places_reservees'], 0, 1);
                $pdf->Cell(60, 10, "Statut Evenement : " . $unEvent['statutEvenement'], 0, 1);
        
                // Espacement avant la ligne
                $pdf->Ln(5);
        
                // Ajouter une ligne de séparation
                $pdf->SetLineWidth(0.5);
                $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); 
                $pdf->Ln(5); // Espacement après la ligne
            }
        
            // Générer le PDF et l'afficher
            $pdf->Output('I', 'ListeEvenementPopulaire.pdf');
            exit(); // Terminer l'exécution après l'affichage du PDF
        }
        
        

    }
?>
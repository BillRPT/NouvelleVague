<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Réservation</title>
  <!-- Bootstrap 5 -->
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
  >
  <!-- FullCalendar CSS -->
  <link 
    href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' 
    rel='stylesheet' 
  >

  <style>
    body {
      background-color: #f8f9fa;
    }
    .step-content { display: none; }
    .step-content.active { display: block; }
    .calendar-container { max-width: 900px; margin: 0 auto; }
  </style>
</head>
<body>

<div class="container my-5">
  <h1 class="text-center">Réservation d'un événement</h1>

  <!-- Étape 1 : Choix de l'événement via FullCalendar -->
  <div id="step1" class="step-content active">
    <h2>Étape 1 : Choisissez un événement</h2>
    <p class="text-muted">Cliquez sur un événement du calendrier pour continuer.</p>
    <div class="calendar-container">
      <div id="calendar"></div>
    </div>
    <div class="mt-3 text-end">
      <button class="btn btn-secondary" disabled>Retour</button>
      <button id="btn-step1-next" class="btn btn-primary" disabled>Suivant</button>
    </div>
  </div>

  <!-- Étape 2 : Sélection de billets -->
  <div id="step2" class="step-content">
    <h2>Étape 2 : Sélectionnez vos billets</h2>
    <p>Événement sélectionné : <span id="selected-event-title" class="fw-bold"></span></p>
    <p><span id="selected-event-id" class="fw-bold"></span></p>
    
    <table class="table">
      <thead>
        <tr>
          <th>Type de billet</th>
          <th>Prix</th>
          <th>Quantité</th>
          <th>Sous-total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Résident</td>
          <td>0 €</td>
          <td>
            <input type="number" class="form-control billet-qty" data-price="0" value="0" min="0">
          </td>
          <td class="line-total">0 €</td>
        </tr>
        <tr>
          <td>Accompagnateur</td>
          <td>5 €</td>
          <td>
            <input type="number" class="form-control billet-qty" data-price="5" value="0" min="0">
          </td>
          <td class="line-total">0 €</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3" class="text-end fw-bold">Total :</td>
          <td id="grand-total" class="fw-bold">0 €</td>
        </tr>
      </tfoot>
    </table>

    <div class="text-end">
      <button id="btn-step2-back" class="btn btn-secondary">Retour</button>
      <button id="btn-step2-next" class="btn btn-primary" disabled>Suivant</button>
    </div>
  </div>

  <!-- Étape 3 : Confirmation (anciennement Étape 4) -->
  <div id="step3" class="step-content">
    <h2>Étape 3 : Confirmation</h2>
    <form id="form-final" method="post" action="<?= site_url('finaliserReservation') ?>">
      <!-- Champs cachés pour envoyer les données en POST -->
      <input type="hidden" name="idEvenement" id="input-idEvenement" value="">
      <input type="hidden" name="nbBillets" id="input-nbBillets" value="">
      
      <p>
        <strong>ID Événement :</strong> <span id="confirm-idEvenement"></span><br>
        <strong>Nom de l'événement :</strong> <span id="confirm-nomEvenement"></span><br>
        <strong>Total billets :</strong> <span id="confirm-nbBillets"></span>
      </p>

      <div class="text-end">
        <button id="btn-step3-back" class="btn btn-secondary" type="button">Retour</button>
        <button id="btn-step3-submit" class="btn btn-success" type="submit">Valider la réservation</button>
      </div>
    </form>
  </div>
</div>

<!-- Scripts -->
<script 
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
</script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>

<script>
// Variables globales
let currentStep = 1;
let selectedEventId = null;
let selectedEventTitle = null;
let totalBillets = 0;

// Fonction pour afficher l'étape "num"
function showStep(num) {
  document.querySelectorAll('.step-content').forEach(step => {
    step.classList.remove('active');
  });
  const step = document.getElementById('step' + num);
  if (step) {
    step.classList.add('active');
    currentStep = num;
  }
}

// Étape 1 : Calendrier
document.addEventListener('DOMContentLoaded', function() {
  let calendarEl = document.getElementById('calendar');
  let calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'fr',
    // renvoie la liste des événements en JSON
    events: '<?= site_url('getEventsJson') ?>',

    // Contrôle côté client : si la date est passée, on empêche la réservation
    eventClick: function(info) {
      let eventDate = new Date(info.event.startStr);
      let now = new Date();

      // Si la date de l'événement est avant la date du jour, on bloque
      if (eventDate < now) {
        alert("Vous ne pouvez pas réserver un événement déjà passé.");
        return;
      }

      // Sinon, on poursuit la logique
      selectedEventId = info.event.id;
      selectedEventTitle = info.event.title;
      document.getElementById('btn-step1-next').disabled = false;
    }
  });
  calendar.render();
});

// Bouton "Suivant" étape 1
document.getElementById('btn-step1-next').addEventListener('click', () => {
  if (!selectedEventId) {
    alert('Veuillez sélectionner un événement dans le calendrier.');
    return;
  }
  // Passer à l'étape 2
  showStep(2);
  // Afficher l'ID et le titre dans l'étape 2
  document.getElementById('selected-event-id').textContent = selectedEventId;
  document.getElementById('selected-event-title').textContent = selectedEventTitle;
});

// Étape 2 : Calcul des billets
const billetQtyInputs = document.querySelectorAll('.billet-qty');
const lineTotalCells  = document.querySelectorAll('.line-total');
const grandTotalCell  = document.getElementById('grand-total');
const btnStep2Next    = document.getElementById('btn-step2-next');

function CalculBillet() {
  let total = 0;
  let qtyTotal = 0;
  billetQtyInputs.forEach((input, index) => {
    const price = parseFloat(input.dataset.price);
    const qty   = parseInt(input.value) || 0;
    const lineTotal = price * qty;
    lineTotalCells[index].textContent = lineTotal + ' €';
    total += lineTotal;
    qtyTotal += qty;
  });
  grandTotalCell.textContent = total + ' €';
  // Activer ou non le bouton "Suivant"
  btnStep2Next.disabled = (qtyTotal <= 0);
  totalBillets = total;
}

billetQtyInputs.forEach((input, index) => {
  input.addEventListener('input', () => {
    CalculBillet();
  });
});

// Bouton "Retour" étape 2
document.getElementById('btn-step2-back').addEventListener('click', () => {
  showStep(1);
});

// Bouton "Suivant" étape 2
btnStep2Next.addEventListener('click', () => {
  // Maintenant passe directement à l'étape 3 (confirmation)
  showStep(3);

  // Remplir le récap dans l'étape 3
  document.getElementById('confirm-idEvenement').textContent = selectedEventId;
  document.getElementById('confirm-nomEvenement').textContent = selectedEventTitle;

  // Calcul du nombre total de billets
  let totalQuantite = 0;
  billetQtyInputs.forEach((input) => {
    totalQuantite += parseInt(input.value) || 0;
  });
  document.getElementById('confirm-nbBillets').textContent = totalQuantite;

  // Alimentation des champs cachés pour la soumission POST
  document.getElementById('input-idEvenement').value = selectedEventId;
  document.getElementById('input-nbBillets').value = totalQuantite;
});

// Étape 3 : Confirmation (était étape 4 avant)
document.getElementById('btn-step3-back').addEventListener('click', () => {
  showStep(2);
});
</script>

</body>
</html>
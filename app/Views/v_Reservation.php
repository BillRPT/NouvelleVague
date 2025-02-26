<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier des Activités</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">

    <!-- jQuery et Moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
</head>

<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Calendrier des Activités</h2>

    <!-- Affichage du calendrier -->
    <div id="calendar"></div>

    <h3 class="mt-5">Nouvelle réservation</h3>
    <form action="<?= base_url('c_Reservation/reserver') ?>" method="POST">
        <div class="mb-3">
            <label for="nomReservation" class="form-label">Nom de l'activité</label>
            <input type="text" name="nomReservation" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="dateReservation" class="form-label">Date</label>
            <input type="date" name="dateReservation" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="typeReservation" class="form-label">Type</label>
            <select name="typeReservation" class="form-select">
                <option value="Événement">Événement</option>
                <option value="Spectacle">Spectacle</option>
                <option value="Sport">Sport</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nbplaceTotale" class="form-label">Nombre de places</label>
            <input type="number" name="nbplaceTotale" class="form-control" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    if (!window.FullCalendar) {
        console.error("Erreur: FullCalendar n'a pas été chargé !");
        return;
    }

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: "<?= base_url('c_Reservation/getReservations') ?>", // Charge les événements dynamiquement
    });
    calendar.render();
});
console.log(window.FullCalendar);

</script>
 

</body>
</html>

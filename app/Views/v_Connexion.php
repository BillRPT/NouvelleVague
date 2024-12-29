<h3>Connexion</h3>
<?php 
    if (isset($_SESSION['user'])) {
        echo '<h4>Vous êtes co en tant que </h4>' . $_SESSION['user'];
    }
    else {
        echo '<h4>Vous n êtes pas co</h4>';
    }

?>
<?= form_open('/Moncontroleur/testConnexion'); ?>
<?= form_label('Username : '); ?>
<?php echo form_input('username', set_value('username')); ?> <br /><br />
<?= form_label('Email : '); ?>
<?php echo form_input('email', set_value('email')); ?> <br /><br />
<?php echo form_submit('mysubmit', 'Valider'); ?>
<?= form_close(); ?>
</body>
</html>
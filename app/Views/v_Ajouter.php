<h3>Ajouter un contact</h3>
<?=validation_list_errors() ?>
<?= form_open('/Moncontroleur/ajouterContacts'); ?>
<?= form_label('Username : '); ?>
<?php echo form_input('username', set_value('username')); ?> <br /><br />
<?= form_label('Email : '); ?>
<?php echo form_input('email', set_value('email')); ?> <br /><br />
<?= form_label('Password : '); ?>
<?php echo form_input('password', set_value('password')); ?> <br /><br />
<?php echo form_submit('mysubmit', 'Valider'); ?>
<?= form_close(); ?>
</body>
</html>
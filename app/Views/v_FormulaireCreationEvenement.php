<br>
<center>
<h3>Créer un événement</h3>
<?=validation_list_errors() ?>
<?= form_open('/c_Administration/creerEvenements'); ?>
<?= form_label('Nom : '); ?>
<?php echo form_input('nom', set_value('nom')); ?> <br /><br />
<?= form_label('Type Evenement : '); ?>
<?= form_dropdown('evenement', $lestypeEvenements, set_value('evenement')); ?>
<?= form_label('Date : '); ?>
<?php echo form_input(['name' => 'date', 'type' => 'date', 'value' => set_value('date')]); ?> <br /> <br />
<?= form_label('Description : '); ?>
<?php echo form_input('description', set_value('description')); ?> <br /><br />
<?= form_label('Nombre de Place : '); ?>
<?php echo form_input('nbPlace', set_value('nbPlace')); ?> <br /><br />
<?= form_label('Duree : '); ?>
<?php echo form_input('duree', set_value('duree')); ?> <br /><br />
<?php echo form_submit('mysubmit', 'Valider'); ?>
<?= form_close(); ?>
</center>
<br>
<center>
<h3>Créer un événement</h3>
<?=validation_list_errors() ?>
<!--On utilise enctype pour permettre de upload des fichier-->
<?= form_open('/c_Administration/creerEvenements', ['enctype' => 'multipart/form-data']); ?>
<?= form_label('Nom : '); ?>
<?php echo form_input('nom', set_value('nom')); ?> <br /><br />
<?= form_label('Type Evenement : '); ?>
<!--DropDown qui est l'équivalent de "option" et qui permet de faire une liste déroulante-->
<?= form_dropdown('evenement', $lestypeEvenements, set_value('evenement')); ?>
<?= form_label('Date : '); ?>
<?php echo form_input(['name' => 'date', 'type' => 'date', 'value' => set_value('date')]); ?> <br /> <br />
<?= form_label('Description : '); ?>
<?php echo form_input('description', set_value('description')); ?> <br /><br />
<?= form_label('Représentant : '); ?>
<?php echo form_input('representant', set_value('representant')); ?> <br /><br />
<?= form_label('Image : '); ?>
<?php echo form_upload('image', set_value('image')); ?> <br /><br />
<?= form_label('Nombre de Place Max : '); ?>
<?php echo form_input('nbPlace', set_value('nbPlace')); ?> <br /><br />
<?= form_label('Duree : '); ?>
<?php echo form_input(['name' => 'duree', 'type' => 'time', 'value' => set_value('duree')]); ?>
<?php echo form_submit('mysubmit', 'Valider'); ?>
<?= form_close(); ?>
</center>
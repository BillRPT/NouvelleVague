<br>
<center>
<h3>Modifier un événement</h3>
<?=validation_list_errors() ?>
<?= form_open('modificationdelevenement/'.$idEvenement); ?>
<?= form_label('Nom : '); ?>
<?php echo form_input('nom', set_value('nom', $unEvenement['nomEvenement'])); ?> <br /><br />
<?= form_label('Type Evenement : '); ?>
<!--DropDown qui est l'équivalent de "option" et qui permet de faire une liste déroulante-->
<?= form_dropdown('evenement', $lestypeEvenements, set_value('evenement')); ?>
<?= form_label('Date : '); ?>
<?php echo form_input(['name' => 'date', 'type' => 'date', 'value' => set_value('date', $unEvenement['dateEvenement'])]); ?> <br /> <br />
<?= form_label('Description : '); ?>
<?php echo form_input('description', set_value('description', $unEvenement['descriptionEvenement'])); ?> <br /><br />
<?= form_label('Représentant : '); ?>
<?php echo form_input('representant', set_value('representant', $unEvenement['representant'])); ?> <br /><br />
<?= form_label('Nombre de Place Max : '); ?>
<?php echo form_input('nbPlace', set_value('nbPlace', $unEvenement['nbplaceMax'])); ?> <br /><br />
<?= form_label('Duree : '); ?>
<?php echo form_input(['name' => 'duree', 'type' => 'time', 'value' => set_value('duree', $unEvenement['dureeEvenement'])]); ?>
<?php echo form_submit('mysubmit', 'Valider'); ?>
<?= form_close(); ?>
</center>

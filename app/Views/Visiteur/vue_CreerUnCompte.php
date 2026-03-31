<center>
<h2><?php echo $TitreDeLaPage ?></h2>

<?php
    if ($TitreDeLaPage=='Saisie formulaire incorrecte') {
        echo service('validation')->listErrors();
    }

  echo form_open('creeruncompte');
  echo csrf_field();

  echo form_label('Nom ','txtNom');
  echo' ';
  echo form_input('txtNom', set_value('txtNom'));    
  echo '</br>';
  echo '</br>';
  echo form_label('Prénom','txtPrenom');
  echo' ';
  echo form_input('txtPrenom', set_value('txtPrenom'));    
  echo '</br>';
  echo '</br>';
  echo form_label('Adresse','txtAdresse');
  echo' ';
  echo form_input('txtAdresse', set_value('txtAdresse'));    
  echo '</br>';
  echo '</br>';
  echo form_label('Code postal','txtCodePostal');
  echo' ';
  echo form_input('txtCodePostal', set_value('txtCodePostal'));    
  echo '</br>';
  echo '</br>';
  echo form_label('Ville','txtVille');
  echo' ';
  echo form_input('txtVille', set_value('txtVille'));    
  echo '</br>';
  echo '</br>';
  echo form_label('Téléphone fixe','txtFixe');
  echo' ';
  echo form_input('txtFixe', set_value('txtFixe'));    
  echo '</br>';
  echo '</br>';
  echo form_label('Téléphone mobile','txtMobile');
  echo' ';
  echo form_input('txtMobile', set_value('txtMobile'));    
  echo '</br>';
  echo '</br>';
  echo form_label('Mél','txtMel');
  echo' ';
  echo form_input('txtMel', set_value('txtMel'));    
  echo '</br>';
  echo '</br>';
  echo form_label('Mot de passe','txtMdP');
  echo' ';
  echo form_input('txtMdP', set_value('txtMdP'));    
  echo '</br>';
  echo '</br>';
  
  echo form_submit('submit', 'Créer mon compte');
  echo form_close();
  echo '</center>';
?>
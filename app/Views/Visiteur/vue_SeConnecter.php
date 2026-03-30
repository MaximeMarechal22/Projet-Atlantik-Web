<center>
<h2><?php echo $TitreDeLaPage ?></h2>

<?php
  if ($TitreDeLaPage=='Saisie incorrecte')
    echo service('validation')->listErrors();
 
  echo form_open('seconnecter');
  echo csrf_field();
  
  echo form_label('Identifiant ','txtIdentifiant');
  echo' ';
  echo form_input('txtIdentifiant', set_value('txtIdentifiant'));    
  echo '</br>';
  echo '</br>';
  echo form_label('Mot de passe ','txtMotDePasse');
  echo' ';  
  echo form_password('txtMotDePasse', set_value('txtMotDePasse'));  
  echo '</br>';
  echo '</br>';
  
  echo form_submit('submit', 'Se connecter');
  echo form_close();
  echo '</center>';
?>
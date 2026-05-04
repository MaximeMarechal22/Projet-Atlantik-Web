<center>
<h2><?php echo $TitreDeLaPage ?></h2>

<?php
  if ($TitreDeLaPage=='Saisie incorrecte')
    echo service('validation')->listErrors();
 
  echo form_open('seconnecter');
  echo csrf_field();
?>
  <form method="post" action="">

  <input type="text" id="txtIdentifiant" name="txtIdentifiant" 
         placeholder="Identifiant" 
         required>
  <br><br>

  <input type="password" id="txtMotDePasse" name="txtMotDePasse" 
         placeholder="Mot de passe">
  <br><br>
  
  <button class="btn btn-success" type = 'submit'>Se connecter</button>
</form>
</br>
<a href="<?php echo site_url('creeruncompte') ?>">Pas de compte ? Inscrivez-vous !</a>


</center>
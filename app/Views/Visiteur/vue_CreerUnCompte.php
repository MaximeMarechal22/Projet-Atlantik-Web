<center>
<h2><?php echo $TitreDeLaPage ?></h2>

<?php
    if ($TitreDeLaPage=='Saisie formulaire incorrecte') {
        echo service('validation')->listErrors();
    }
?>
  <form method="post" action="">

  <input type="text" id="txtNom" name="txtNom" placeholder="Nom"
         required
         pattern="^[a-zA-ZÀ-ÿ\- ]+$"
         maxlength="30">
  <br><br>

  <input type="text" id="txtPrenom" name="txtPrenom" placeholder="Prénom"
         required
         pattern="^[a-zA-ZÀ-ÿ\- ]+$"
         maxlength="30">
  <br><br>

  <input type="text" id="txtAdresse" name="txtAdresse" placeholder="Adresse"
         required
         maxlength="100">
  <br><br>

  <input type="text" id="txtCodePostal" name="txtCodePostal" placeholder="Code postal"
         required
         pattern="^[0-9]{5}$"
         maxlength="5"
         inputmode="numeric">
  <br><br>

  <input type="text" id="txtVille" name="txtVille" placeholder="Ville"
         required
         maxlength="30">
  <br><br>

  <input type="text" id="txtFixe" name="txtFixe" placeholder="Téléphone fixe (ex: 01.23.45.67.89)"
         required
         pattern="^0[1-5](\.\d{2}){4}$">
  <br><br>

  <input type="text" id="txtMobile" name="txtMobile" placeholder="Téléphone mobile (ex: 06.12.34.56.78)"
         required
         pattern="^0[67](\.\d{2}){4}$">
  <br><br>

  <input type="email" id="txtMel" name="txtMel" placeholder="Mél"
         required
         maxlength="254">
  <br><br>

  <input type="password" id="txtMdP" name="txtMdP" placeholder="Mot de passe"
         required
         minlength="8"
         maxlength="30">
  <br><br>

<button class="btn btn-success" type = 'submit'>Créer mon compte</button>
</form>
</br>
<a href="<?php echo site_url('seconnecter') ?>">Déjà un compte ? Connectez-vous !</a>
</center>

<center>
<h2><?php echo $TitreDeLaPage ?></h2>

<?php
    if ($TitreDeLaPage=='Saisie formulaire incorrecte') {
        echo service('validation')->listErrors();
    }
?>
  <form method="post" action="">

       <strong>Nom </strong><input type="text" name="txtNom"
              value="<?= esc($client->NOM) ?>" required>
       <br><br>

       <strong>Prénom </strong><input type="text" name="txtPrenom"
              value="<?= esc($client->PRENOM) ?>" required>
       <br><br>

       <strong>Adresse </strong><input type="text" name="txtAdresse"
              value="<?= esc($client->ADRESSE) ?>" required>
       <br><br>

       <strong>Code postal </strong><input type="text" name="txtCodePostal"
              value="<?= esc($client->CODEPOSTAL) ?>" required>
       <br><br>

       <strong>Ville </strong><input type="text" name="txtVille"
              value="<?= esc($client->VILLE) ?>" required>
       <br><br>

       <strong>Numéro fixe </strong><input type="text" name="txtFixe"
              value="<?= esc($client->TELEPHONEFIXE) ?>" required>
       <br><br>

       <strong>Numéro mobile </strong><input type="text" name="txtMobile"
              value="<?= esc($client->TELEPHONEMOBILE) ?>" required>

       <br><br>

       <strong>Adresse e-mail </strong><input type="email" name="txtMel"
              value="<?= esc($client->MEL) ?>" required>
       <br><br>
       

<button class="btn btn-success" type = 'submit'>Valider</button>
</center>

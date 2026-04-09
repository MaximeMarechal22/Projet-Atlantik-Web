<center>
<h2><?php echo $TitreDeLaPage ?></h2>

<?php
    if ($TitreDeLaPage=='Saisie formulaire incorrecte') {
        echo service('validation')->listErrors();
    }
?>
  <form method="post" action="">

       <input type="text" name="txtNom"
              value="<?= esc($client->NOM) ?>" required>
       <br><br>

       <input type="text" name="txtPrenom"
              value="<?= esc($client->PRENOM) ?>" required>
       <br><br>

       <input type="text" name="txtAdresse"
              value="<?= esc($client->ADRESSE) ?>" required>
       <br><br>

       <input type="text" name="txtCodePostal"
              value="<?= esc($client->CODEPOSTAL) ?>" required>
       <br><br>

       <input type="text" name="txtVille"
              value="<?= esc($client->VILLE) ?>" required>
       <br><br>

       <input type="text" name="txtFixe"
              value="<?= esc($client->TELEPHONEFIXE) ?>" required>
       <br><br>

       <input type="text" name="txtMobile"
              value="<?= esc($client->TELEPHONEMOBILE) ?>" required>

       <br><br>

       <input type="email" name="txtMel"
              value="<?= esc($client->MEL) ?>" required>
       <br><br>
       

<button class="btn btn-success" type = 'submit'>Valider</button>
</center>

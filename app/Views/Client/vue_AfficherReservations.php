<center>
<h2><?php echo $TitreDeLaPage ?></h2>

<?php
    if ($TitreDeLaPage=='Saisie formulaire incorrecte') {
        echo service('validation')->listErrors();
    }
?>
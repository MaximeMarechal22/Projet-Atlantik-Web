<?php
$session = session();
if ( is_null($session->get('Identifiant')))
    {
        echo '<center><div class="alert alert-danger">Vous devez être connecté en tant que client pour pouvoir réserver </div></center>';
}
else
    {
    ?>
    <center>
    <h2><?php echo '- '. $TitreDeLaPage. ' -' ?></h2>
    <i>(Merci de nous faire confiance !) </br></i>
    </br>
    
    <?php
        foreach($ports as $port)
            {
                echo 'Liaison: <strong>'. $port->portDepart. '</strong> - <strong>' .$port->portArrivee.'</strong> </br>';
            }
        echo "Traversée n°<strong>$traversee </strong> pour le <strong> $date </strong> à <strong> $heure </strong> </br>
        Saisir les informations relatives à la réservation
        </br></br>
        
        Nom : <strong> $client->NOM </strong></br>
        Adresse : <strong> $client->ADRESSE </strong></br>
        Cp : <strong> $client->CODEPOSTAL </strong> Ville : <strong> $client->VILLE </strong></br>
        </br>";
}

<?php
$session = session();
if ( is_null($session->get('Identifiant')))
    {
        echo '<center><div class="alert alert-danger">Vous devez être connecté en tant que client pour pouvoir réserver </div></center>';
}
else
    {
    ?><center>
    <h2><?php echo '- '. $TitreDeLaPage. ' -' ?></h2>
    <i>(Merci de nous faire confiance !)</i>
    </center>
    <?php
}

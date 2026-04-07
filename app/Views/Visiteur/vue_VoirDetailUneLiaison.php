<center>
    <h2><?php echo $TitreDeLaPage ?></h2>
</center>
<?php
    echo "<table class='table table-striped'>";
    echo "
    <tr>
    <th>Catégorie</th>
    <th>Type</th>
    <th>Période</th>
    </tr>";
    foreach ($lesTraversees as $uneTraversee)
{
    echo "<TR>";
    echo "<TD>".$uneTraversee->LETTRECATEGORIE."</TD><TD>"
    .$uneTraversee->LIBELLE."</TD><TD>"
    .$uneTraversee->Depart."\n". $uneTraversee->Arrivee."</TD><TD>";
    echo "</TR>";
}
echo "</table>";
?>
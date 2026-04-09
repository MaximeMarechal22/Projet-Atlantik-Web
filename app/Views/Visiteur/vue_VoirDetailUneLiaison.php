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
    <th>Tarif</th>
    </tr>";
    foreach ($lesTraversees as $uneTraversee)
{
    echo "<TR>";
    echo "<TD>".$uneTraversee->Catégorie."</TD><TD>"
    .$uneTraversee->Type."</TD><TD>"
    .$uneTraversee->DATEDEBUT."\n". $uneTraversee->DATEFIN."</TD><TD>"
    .$uneTraversee->TARIF." € </TD><TD>";
    echo "</TR>";
}
echo "</table>";
?>
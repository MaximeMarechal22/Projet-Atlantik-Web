<center><h2><?php echo $TitreDeLaPage ?></h2></center>

<?php 
if (empty($lesTraversees)) {
    echo '<center><div class="alert alert-danger">Aucune traversée trouvée pour la liaison choisie.</div></center>';
} else {
    $periodes = [];
    foreach ($lesTraversees as $t) {
        $key = $t->NOPERIODE;
        if (!isset($periodes[$key])) {
            $periodes[$key] = $t->DATEDEBUT . '<br>' . $t->DATEFIN;
        }
    }

    $libellesCategorie = [];
    $libellesType = [];
    $tableau = [];

    foreach ($lesTraversees as $t) {
        $cat  = $t->LETTRECATEGORIE;
        $type = $cat . $t->NOTYPE;
        $libellesCategorie[$cat] = $t->LIBELLE;
        $libellesType[$type] = "$type - {$t->LIBELLE}";
        $tableau[$cat][$type][$t->NOPERIODE] = $t->TARIF;
    }

    echo "<table class='table table-striped table-bordered'>";
    echo "<thead><tr>
                <th>Catégorie</th>
                <th>Type</th>
                <th colspan='" . count($periodes) . "'>Périodes</th>
            </tr>
            <tr>
                <th></th>
                <th></th>";
    foreach ($periodes as $noperiode => $dates) {
        echo "<th>$dates</th>";
    }
    echo "</tr> </thead> <tbody>";

    foreach ($tableau as $cat => $types) {
        $nbLignes    = count($types);
        $premiereLigne = true;
        foreach ($types as $typeKey => $tarifsParPeriode) {
            echo "<tr>";
            if ($premiereLigne) {
                echo "<td rowspan='$nbLignes'><strong>$cat</strong><br>" . $libellesCategorie[$cat] . "</td>";
                $premiereLigne = false;
            }
            echo "<td>" . $libellesType[$typeKey] . "</td>";
            foreach ($periodes as $noperiode => $dates) {
                $tarif = $tarifsParPeriode[$noperiode] ?? '-';
                echo "<td>" . $tarif . " €</td>";
            }
            echo "</tr>";
        }
    }

    echo "</tbody></table>";
}
?>
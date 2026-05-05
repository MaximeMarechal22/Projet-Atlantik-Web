<center> <h2><?php echo '- '. $TitreDeLaPage. ' -' ?></h2>
<h6> <i> Les réservations nécessitent un compte client </h6> </i> </center>
<div class="container-fluid">

<?php
    use CodeIgniter\I18n\Time;
    echo "<div class='row'>
        <div class='col-2'>";
        
        $attributsTableau = ["table_open" => "<table class='table table-striped'>",];
        $table = new \CodeIgniter\View\Table($attributsTableau);
        $table->setHeading(['Secteurs']);

        foreach ($lesSecteurs as $unSecteur)
        {
            $table->addRow(anchor("/voirleshoraires/". $unSecteur->NOSECTEUR, $unSecteur->NOM, "class = btn btn-outline-info"));
        }
        echo $table->generate();
        echo "</div>";

    echo "<div class='col-10'>
    Sélectionner la liaison et la date souhaitée </br>";

    echo '<form method="post" action="">
    <select name="liaisons">';
    if ($liaison == null)
    {
        echo '<option> Aucune laision pour le secteur choisi</option>';
    }
    else
    {
        foreach($liaison as $ports)
        {
            echo '<option value ="'.$ports->noLiaison.'"> '.$ports->portDepart. "->". $ports->portArrivee. '</option>';
        }
    }
    echo '</select>';
    
    echo '<select name="date">';
    foreach ($periodes as $periode)
    {
        echo '<option value="' . $periode->DATEDEBUT . '">' 
            . $periode->DATEDEBUT. '</option>';
    }
    echo '</select>';

    if (!isset($_POST['afficherTraversees']))
    {
        echo " <button class='btn btn-success btn-sm' type='submit' value='afficherTraversees' name='afficherTraversees'>Afficher les traversées</button>
        </form> </br>";
    }
    else
    {
        if (isset($message))
        {
            echo " <button class='btn btn-success btn-sm' type='submit' value='afficherTraversees' name='afficherTraversees'> Afficher les traversées</button>
            </form> </br>";
            echo '<center><div class="alert alert-danger">'.$message.'</div></center>';
        }
        else
        {
            if (isset($categories))
            {
                echo " <button class='btn btn-success btn-sm' type='submit' value='afficherTraversees' name='afficherTraversees'> Afficher les traversées</button>
                </form> </br>";

                foreach ($liaisonRetour as $ports)
                {
                    echo $ports->portDepart . " - " . $ports->portArrivee
                        . '</br> Traversées pour le ' . $dateSaisie . '. Sélectionnez la traversée souhaitée en cliquant sur son numéro </br>';

                    if (!empty($tableauTraversees))
                    {
                        echo "<table class='table table-striped table-bordered'>
                            </br>
                            <strong> Traversée </strong>
                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Heure</th>
                                    <th>Bateau</th>";
                                    foreach ($categories as $cat)
                                    {
                                        echo "<th>" . $cat->LETTRECATEGORIE . " " . $cat->LIBELLE . "</th>";
                                    }
                        echo "</tr>
                            </thead>
                            <tbody>";

                        foreach ($tableauTraversees as $traversee)
                        {
                            $session = session();
                            if (!is_null($session->get('Identifiant')))
                            {
                                echo "<tr>
                                    <td>" . anchor('/reserver/' . $traversee['numero'], $traversee['numero'], "class = btn btn-outline-info'") . "</td>";
                            }
                            else
                            {
                                echo "<strong> Places disponnibles par catégorie </strong>
                                <tr>
                                <td>" . $traversee['numero'] . "</td>";

                            }
                            echo "<td>" . $traversee['heure'] . "</td> <td>" . $traversee['bateau'] . "</td>";
                            foreach ($categories as $cat)
                            {
                                echo "<td>" . ($traversee['places'][$cat->LETTRECATEGORIE]) . "</td>";
                            }
                            echo "</tr>";
                            echo "</tbody></table>";
                            if (is_null($session->get('Identifiant')))
                            {
                                echo '<center>
                                    <div class="alert alert-warning">
                                    Vous devez être connecté pour pouvoir réserver.<br>
                                    <a href="'.site_url("seconnecter").'" class="btn btn-white btn-sm">Se connecter</a>
                                    ou
                                    <a href="'.site_url("creeruncompte").'" class="btn btn-white btn-sm">Créer un compte</a>
                                    </div>
                                    </center>';
                                
                            }
                        }
                    }
                    else
                    {
                        echo "<center> <div class='alert alert-warning'>Aucun horaire pour cette date.</div></center>";
                    }
                }
            }
        }
        echo "</div> </div>";
    }
?>
</div>
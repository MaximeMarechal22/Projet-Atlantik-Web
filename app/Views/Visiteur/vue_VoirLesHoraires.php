<center> <h2><?php echo '- '. $TitreDeLaPage. ' -' ?></h2>
<h6> <i> Les réservations nécessitent un compte client </h6> </i> </center>

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
        foreach($periodes as $periode)
        {
            echo '<option>'.$periode->DATEDEBUT.'</option>';
        }
    echo "</select>
    <button class='btn btn-success btn-sm' type ='submit' value='afficherTraversees' name='afficherTraversees'>Afficher les traversées</button>
    </form>";
    

    echo "</br> </div>";
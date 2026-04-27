<center> <h2><?php echo '- '. $TitreDeLaPage. ' -' ?></h2> </center>
<?php
    use CodeIgniter\I18n\Time;
    echo "<div class='row'>
        <div class='col-md-2'>";
        
        $attributsTableau = ["table_open" => "<table class='table table-striped'>",];
        $table = new \CodeIgniter\View\Table($attributsTableau);
        $table->setHeading(['Secteurs']);
        

        foreach ($lesSecteurs as $unSecteur)
        {
            $table->addRow(anchor("/voirleshoraires/". $unSecteur->NOSECTEUR, $unSecteur->NOM, "class = btn btn-outline-info"));
        }
        echo $table->generate();
        echo "</div>";
        
    
    echo "<div class='col-md-10'>
    Sélectionner la liaison et la date souhaitée </br>";

    echo '<select>';
    if ($liaison == null)
        {
            echo '<option> Aucune laision pour le secteur choisi</option>';
        }
    else
    {
        foreach($liaison as $ports)
        {
            echo '<option>'.$ports->portDepart. "->". $ports->portArrivee. '</option>';
        }
    }
    echo '</select>';
    
    echo '<select>';
        foreach($periodes as $periode)
        {
            echo '<option>'.$periode->DATEDEBUT.'</option>';
        }
    
    
    echo "</br> </div>";
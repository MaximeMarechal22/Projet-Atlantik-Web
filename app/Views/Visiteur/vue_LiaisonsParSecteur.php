<center>
    <h2><?php echo '- '. $TitreDeLaPage. ' -' ?></h2>
    <i>(Les codes de liaison sont cliquables pour afficher les liaisons correspondantes)</i>
</center>

<?php
    $attributsTableau = ["table_open" => "<table class='table table-striped'>",];
    $table = new \CodeIgniter\View\Table($attributsTableau);
    $table->setHeading(['Secteur', 'Code Liaison', 'Distance en miles marin', 'Port de départ', "Port d'arrivée"]);
    $dernierSecteur = null;

    foreach ($lesSecteurs as $ligne)
    {
        if ($ligne->nomSecteur === $dernierSecteur)
        {
            $table->addRow(" ", anchor("/voirlesliaisons/". $ligne->noLiaison, $ligne->noLiaison, "class = btn btn-outline-info"), $ligne->distance, $ligne->portDepart, $ligne->portArrivee);
        }
        else
        {
            $dernierSecteur = $ligne->nomSecteur;
            $table->addRow($dernierSecteur, anchor("/voirlesliaisons/". $ligne->noLiaison, $ligne->noLiaison, "class = btn btn-outline-info"), $ligne->distance, $ligne->portDepart, $ligne->portArrivee);
        }
    }

    echo $table->generate();
?>
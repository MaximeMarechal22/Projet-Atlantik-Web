<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleTraversee extends Model
{
    protected $table = 'traversee trav';
    protected $primaryKey = 'NOTRAVERSEE';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['NOLIAISON, NOBATEAU, DATEHEUREDEPART, DATEHEUREARRIVEE, CLOTUREEMBARQUEMENT'];

    public function getAllTraversees($liaison, $date)
    {
        $condition = "sec.nosecteur = $nosecteur";

        return $this->join('liaison li', 'sec.nosecteur = li.nosecteur', 'inner')
        ->join('port port_depart', 'li.noport_depart = port_depart.noport',  'inner')
        ->join('port port_arrivee', 'li.noport_arrivee = port_arrivee.noport',  'inner')
        ->where($condition)
        ->select('traversee.noTraversee, traversee.noBateau, traversee.dateHeureDepart, bateau.nom')
        ->get()->getResult();
    }

    public function getQuantiteEnregistrer($noTraversee, $lettreCategorie)
    {
        $condition = "traversee.NOTRAVERSEE =  $noTraversee AND LETTRECATEGORIE = $lettreCategorie";
        return $this->join('reservation', 'traversee.NOTRAVERSEE = reservation.NOTRAVERSEE', 'inner')
        ->join('enregistrer', 'reservation.NORESERVATION = enregistrer.NORESERVATION','inner')
        ->where($condition)
        ->select('QUANTITERESERVEE')
        ->get()->getResult();
    }

    public function getCapaciteMaximale($noTraversee, $lettreCategorie)
    {
        $condition = "NOTRAVERSEE = $noTraversee AND LETTRECATEGORIE = $lettreCategorie";
        return $this->join('contenir', 'NOBATEAU = contenir.NOBATEAU', 'inner')
        ->where($condition)
        ->select('CAPACITEMAX')
        ->get()->getResult();
    }

    public function getLesTraverseesBateau($noLiaison, $dateTraversee)
    {
        $condition = "NOLIAISON = $noLiaison AND DATEHEUREDEPART LIKE $dateTraversee";
        return $this->join('bateau', 'traversee.NOBATEAU = bateau.NOBATEAU', 'inner')
        ->select("NOTRAVERSEE as numero, DATE_FORMAT(traversee.dateheuredepart, '%T') as heuredepart, ba.NOM as nom")
        ->get()->getResult();
    }
}
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

    public function getQuantiteEnregistree($noTraversee, $lettreCategorie)
    {
        $condition = "trav.NOTRAVERSEE = $noTraversee AND enregistrer.LETTRECATEGORIE = '$lettreCategorie'";
        return $this->join('reservation', 'trav.NOTRAVERSEE = reservation.NOTRAVERSEE', 'inner')
            ->join('enregistrer', 'reservation.NORESERVATION = enregistrer.NORESERVATION', 'inner')
            ->where($condition)
            ->select('SUM(enregistrer.QUANTITERESERVEE) as quantite')
            ->get()->getRow();
    }

    public function getCapaciteMaximale($noTraversee, $lettreCategorie)
    {
        $condition = "trav.NOTRAVERSEE = $noTraversee AND contenir.LETTRECATEGORIE = '$lettreCategorie'";
        return $this->join('contenir', 'trav.NOBATEAU = contenir.NOBATEAU', 'inner')
            ->where($condition)
            ->select('contenir.CAPACITEMAX')
            ->get()->getRow();
    }

    public function getLesTraverseesBateaux($noLiaison, $dateDebut)
    {
        return $this->join('bateau', 'trav.NOBATEAU = bateau.NOBATEAU', 'inner')
            ->join('periode', "DATE(DATEHEUREDEPART) BETWEEN periode.DATEDEBUT AND periode.DATEFIN", 'inner')
            ->select("NOTRAVERSEE as numero, DATE_FORMAT(DATEHEUREDEPART, '%T') as heuredepart, bateau.NOM as nom")
            ->where('trav.NOLIAISON', $noLiaison)
            ->where('periode.DATEDEBUT', $dateDebut)
            ->get()->getResult();
    }
}
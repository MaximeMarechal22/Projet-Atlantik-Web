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
        $condition = ['sec.nosecteur =' => $nosecteur];

        return $this->join('liaison li', 'sec.nosecteur = li.nosecteur', 'inner')
        ->join('port port_depart', 'li.noport_depart = port_depart.noport',  'inner')
        ->join('port port_arrivee', 'li.noport_arrivee = port_arrivee.noport',  'inner')
        ->where($condition)
        ->select('traversee.noTraversee, traversee.noBateau, traversee.dateHeureDepart, bateau.nom')
        ->get()->getResult();
    }

}
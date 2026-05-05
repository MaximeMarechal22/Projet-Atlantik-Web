<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleLiaison extends Model
{
    protected $table = 'liaison';
    protected $primaryKey = 'NOLIAISON';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
 
    protected $allowedFields = ['NOPORT_DEPART', 'NOSECTEUR', 'NOPORT_ARRIVEE', 'DISTANCE'];
    
    public function getPortDepart($referenceLiaison)
    {   
            $condition = "liaison.NOLIAISON = $referenceLiaison";        
            return $this->join('port p', 'liaison.NOPORT_DEPART = p.NOPORT', 'inner')
            ->select("p.NOM as portDepart")
            ->where($condition)
            ->first();
    }

    public function getPortArrivee($referenceLiaison)
    {           
        $condition = "liaison.NOLIAISON = $referenceLiaison";
        return $this->join('port p', 'liaison.NOPORT_ARRIVEE = p.NOPORT', 'inner')
            ->select("p.NOM as portArrivee")            
            ->where($condition)
            ->first();
    }

    public function getPortsLiaison($referenceLiaison)
    {
        return $this->join('port port_depart', 'liaison.noport_depart = port_depart.noport', 'inner')
        ->join('port port_arrivee', 'liaison.noport_arrivee = port_arrivee.noport',  'inner')
        ->where('liaison.noliaison =', $referenceLiaison)
        ->select('port_depart.nom as portDepart, port_arrivee.nom as portArrivee')
        ->get()->getResult();
    }
}
?>
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
}
?>
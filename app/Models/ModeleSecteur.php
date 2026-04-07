<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleSecteur extends Model
{
    protected $table = 'secteur sec';
    protected $primaryKey = 'NOSECTEUR';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['NOM'];

    public function getAllSecteur()
    {
        return $this->join('liaison li', 'sec.NOSECTEUR = li.NOSECTEUR', 'inner')
            ->join('port p1', 'li.NOPORT_DEPART = p1.NOPORT', 'inner')
            ->join('port p2', 'li.NOPORT_ARRIVEE = p2.NOPORT', 'inner')
            ->select("sec.NOM as nomSecteur, li.NOLIAISON as noLiaison, li.DISTANCE as distance , p1.NOM AS portDepart, p2.NOM AS portArrivee")
            ->orderBy('sec.NOM', 'ASC')
            ->get()->getResult();
    }
}
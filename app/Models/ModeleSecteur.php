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

    public function getSecteurs()
    {
        return $this->select("NOSECTEUR, NOM")
        ->get()->getResult();
    }
    public function getAllSecteur()
    {
        return $this->join('liaison li', 'sec.NOSECTEUR = li.NOSECTEUR', 'inner')
            ->join('port p1', 'li.NOPORT_DEPART = p1.NOPORT', 'inner')
            ->join('port p2', 'li.NOPORT_ARRIVEE = p2.NOPORT', 'inner')
            ->select("sec.NOM as nomSecteur, li.NOLIAISON as noLiaison, li.DISTANCE as distance , p1.NOM AS portDepart, p2.NOM AS portArrivee")
            ->orderBy('sec.NOSECTEUR', 'ASC')
            ->get()->getResult();
    }

    public function getAllLiaisonsParSecteur($nosecteur)
    {
        $condition = ['sec.nosecteur =' => $nosecteur];

        return $this->join('liaison li', 'sec.nosecteur = li.nosecteur', 'inner')
        ->join('port port_depart', 'li.noport_depart = port_depart.noport',  'inner')
        ->join('port port_arrivee', 'li.noport_arrivee = port_arrivee.noport',  'inner')
        ->where($condition)
        ->select('port_depart.nom as portDepart, port_arrivee.nom as portArrivee')
        ->get()->getResult();
    }
}
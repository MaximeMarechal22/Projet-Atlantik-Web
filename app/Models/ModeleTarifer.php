<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleTarifer extends Model
{
    protected $table = 'tarifer';
    protected $primaryKey = 'NOPERIODE';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['LETTRECATEGORIE, TARIF, NOTYPE, NOLIAISON'];

    public function getAllTraversee($referenceLiaison)
    {
    $date = date("Y-m-d");
    $condition = "tarifer.NOLIAISON = $referenceLiaison AND periode.DATEFIN ";
    return $this->join('periode', 'tarifer.NOPERIODE = periode.NOPERIODE', 'inner')
        ->join('categorie', 'tarifer.LETTRECATEGORIE = categorie.LETTRECATEGORIE', 'inner')
        ->join('type', 'tarifer.LETTRECATEGORIE = type.LETTRECATEGORIE AND tarifer.NOTYPE = type.NOTYPE', 'inner')
        ->select("tarifer.LETTRECATEGORIE, '<br>', categorie.LIBELLE AS Categorie, type.LETTRECATEGORIE, type.NOTYPE, ' - ', type.LIBELLE, periode.NOPERIODE, periode.DATEDEBUT, periode.DATEFIN, tarifer.TARIF")
        ->where($condition)
        ->get()->getResult();
    }
}
?>
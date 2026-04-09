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
        $date = date("2021-06-16");
        $condition = "NOLIAISON = $referenceLiaison AND DATEDEBUT > $date";
        return $this->join('periode', 'tarifer.NOPERIODE = periode.NOPERIODE', 'inner')
            ->join('categorie', 'tarifer.LETTRECATEGORIE = categorie.LETTRECATEGORIE', 'inner')
            ->join('type', 'tarifer.LETTRECATEGORIE = type.LETTRECATEGORIE AND tarifer.NOTYPE = type.NOTYPE', 'inner')
            ->select("CONCAT(tarifer.LETTRECATEGORIE, '\n', categorie.LIBELLE) AS 'Catégorie', CONCAT(type.LETTRECATEGORIE, type.NOTYPE, ' - ',  type.LIBELLE) AS 'Type', DATEDEBUT, DATEFIN, tarifer.TARIF")
            ->where($condition)
            ->get()->getResult();
    }
}
?>
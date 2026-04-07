<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleTraversee extends Model
{
    protected $table = 'traversee';
    protected $primaryKey = 'NOTRAVERSEE';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['DATEHEUREDEPART, DATEHEUREARRIVEE'];

    public function getAllTraversee($referenceLiaison)
    {
        $condition = "liaison.NOLIAISON = $referenceLiaison";
        return $this->join('tarifer', 'traversee.NOLIAISON = tarifer.NOLIAISON', 'inner')
            ->join('type', 'tarifer.LETTRECATEGORIE = type.LETTRECATEGORIE', 'inner')
            ->join('categorie', 'type.LETTRECATEGORIE = categorie.LETTRECATEGORIE', 'inner')
            ->join('liaison', 'traversee.NOLIAISON = liaison.NOLIAISON', 'inner')
            ->select("type.LETTRECATEGORIE, categorie.LIBELLE, type.NOTYPE, type.LIBELLE, DATEHEUREDEPART AS 'Depart', DATEHEUREARRIVEE AS 'Arrivee', TARIF")
            ->orderBy('LETTRECATEGORIE, NOTYPE', 'ASC')
            ->where($condition)
            ->get()->getResult();
    }
}
?>
<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModelePeriode extends Model
{
    protected $table = 'periode';
    protected $primaryKey = 'NOPERIODE';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['DATEDEBUT, DATEFIN'];

    public function getAllDatesSuperieuresAjd()
    {
        $date = date('Y-m-d');
        $condition = ["DATEDEBUT >" => $date];
        return $this->select("DATEDEBUT")
            ->where($condition)
            ->get()->getResult();
    }
}
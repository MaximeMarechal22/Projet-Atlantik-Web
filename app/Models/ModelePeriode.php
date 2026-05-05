<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModelePeriode extends Model
{
    protected $table = 'periode';
    protected $primaryKey = 'NOPERIODE';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['DATEDEBUT', 'DATEFIN'];

    public function getAllDatesSuperieuresAjd()
    {
        return $this->select("NOPERIODE, DATEDEBUT, DATEFIN")
            ->get()
            ->getResult();
    }
}
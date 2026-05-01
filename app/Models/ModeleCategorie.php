<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleCategorie extends Model
{
    protected $table = 'categorie';
    protected $primaryKey = 'LETTRECATEGORIE';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['LIBELLE'];
}
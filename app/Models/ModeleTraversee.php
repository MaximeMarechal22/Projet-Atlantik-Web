<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleTraversee extends Model
{
    protected $table = 'traversee trav';
    protected $primaryKey = 'NOTRAVERSEE';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $allowedFields = ['NOLIAISON, NOBATEAU, DATEHEUREDEPART, DATEHEUREARRIVEE, CLOTUREEMBARQUEMENT'];

}
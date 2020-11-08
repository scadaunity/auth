<?php


namespace Scadaunity\Auth\Models;

use CodeIgniter\Model;

class RolesModel extends Model
{
    protected $table = 'Auth_Roles';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'name'
    ];
    protected $useTimestamps = true;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

}
<?php


namespace Scadaunity\Auth\Models;

use CodeIgniter\Model;

class PermissionsModel extends Model
{
    protected $table = 'Auth_Permissions';
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
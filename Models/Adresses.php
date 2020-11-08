<?php


namespace Scadaunity\Auth\Models;

use CodeIgniter\Model;

class Adresses extends Model
{
    protected $table = "adresses";
    protected $primaryKey = "addr_id";
    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['user_id', 'street','number'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
        'user_id' => 'required',
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function add(UserModel $user, string $street, string $number) : Adresses
    {
        $this->user_id = $user->id;
        $this->street = $street;
        $this->number = $number;
    }
}
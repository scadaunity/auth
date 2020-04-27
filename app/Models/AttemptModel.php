<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class AttemptModel extends Model
{
    // Configuração do model
    protected $limit = 5;
    //Configuração da tabela
    protected $db;
    protected $table = 'login_Attempt';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['ip', 'device'];
    protected $useTimestamps = true;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function __construct()
    {
        $this->db = db_connect();
    }

    /**
     * Busca as tentativas de login.
     *
     * @param string $email
     *
     * @return array    Retorna os dados do usuario ou valor null.
     */
    public function getAttempt($ip)
    {
        $data = array(
            $ip
        );

        $query = "SELECT * FROM login_Attempt WHERE ip = ?";
        $result = $this->db->query($query, $data)->getResult('array');

        if (count($result) == 0) {
            return false;
        } else {
            return $result;
        }
    }
}

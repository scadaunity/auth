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
    protected $allowedFields = ['ip', 'email'];
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
    public function getByEmail(string $email): array
    {
        $data = array(
            $email
        );

        $query = "SELECT * FROM login_Attempt WHERE email = ?";
        return $this->db->query($query, $data)->getResult('array');


    }

    /**
     * conta as tentativas de login.
     *
     * @param string $email
     *
     * @return int    Retorna os dados do usuario ou valor null.
     */
    public function countAttempt(string $email)
    {
        // busca os dados na tabela attempt
        $result = $this->getAttempt($email);

        // Verifica se foi retornado algum registro
        if (is_array($result)) {
            return count($result);
        }
    }
}

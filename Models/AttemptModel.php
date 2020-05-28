<?php namespace Scadaunity\Auth\Models;


use CodeIgniter\Model;


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
     * conta as tentativas de login.
     *
     * @param string $email
     *
     * @return int    Retorna os dados do usuario ou valor null.
     */
    public function countAttempt(string $email)
    {
        // busca os dados na tabela attempt
        $result = $this->getByEmail($email);

        // Verifica se foi retornado algum registro
        if (is_array($result)) {
            return count($result);
        }
    }

    /**
     * Busca as tentativas de login.
     *
     * @param string $email
     *
     * @return array    Retorna as tentativas de login do usuario.
     */
    public function getByEmail(string $email): array
    {
        $data = array(
            $email
        );

        $query = "SELECT * FROM login_Attempt WHERE email = ?";
        return $this->db->query($query, $data)->getResult('array');


    }
}

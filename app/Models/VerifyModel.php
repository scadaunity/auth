<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

/**
 * Created by Scada Unity.
 * User: Paulo César Andrade Souza
 * Date: 18/04/2020
 * Time: 22:17
 */

class VerifyModel extends Model
{
    // Configuração do model
    protected $limit = 5;
    //Configuração da tabela
    protected $db;
    protected $table = 'login_verify';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['ip','code'];
    protected $useTimestamps = true;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function __construct()
    {
        $this->db = db_connect();
    }

    //--------------------------------------------------------------------

    /**
     * Busca se existe verificação da conta para efetuar o login.
     *
     * @param string $ip
     *
     * @return boolean    Retorna true ou false.
     */
    public function checkVerify($ip)
    {
        $data = array(
            $ip
        );

        $query = "SELECT * FROM $this->table WHERE ip = ?";
        $result = $this->db->query($query, $data)->getResult('array');

        if (count($result) == 0) {
            return false;
        } else {
            return true;
        }
    }

    //--------------------------------------------------------------------

    /**
     * Busca se existe verificação da conta para efetuar o login.
     *
     * @param string $ip
     *
     * @return boolean    Retorna true ou false.
     */
    public function getVerify($ip)
    {
        $data = array(
            $ip
        );

        $query = "SELECT * FROM $this->table WHERE ip = ?";
        $result = $this->db->query($query, $data)->getResult('array');

        if (count($result) == 0) {
            return false;
        } else {
            return $result;
        }
    }

    //--------------------------------------------------------------------

    /**
     * Busca se existe verificação da conta.
     *
     * @param string $user_id
     *
     * @return array $result
     */
    public function getByUserId($user_id)
    {
        $data = array(
            $user_id
        );

        $query = "SELECT * FROM $this->table WHERE user_id = ?";
        $result = $this->db->query($query, $data)->getResult('array');

        if (count($result) > 0) {
            return $result[0];
        }
    }

}

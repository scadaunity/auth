<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use CodeIgniter\Validation\ValidationInterface;

class UserModel extends Model
{
    protected $db;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['name', 'email', 'password'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function __construct()
    {
        $this->db = db_connect();
    }

    //--------------------------------------------------------------------

    /**
     * Verifica se o email do usuario existe na base de dados.
     *
     * @param string $email
     *
     * @return array    Retorna os dados do usuario ou valor null.
     */
    public function checkEmail($email)
    {
        $data = array(
            $email
        );

        $query = 'SELECT * FROM $this->table WHERE email = ?';
        $result = $this->db->query($query, $data)->getResult('array');

        if (count($result) == 0) {
            return false;
        } else {
            return $result[0];
        }
    }

    //--------------------------------------------------------------------

    /**
     * Busca os dados do usuarios pelo e-mail.
     *
     * @param string $email
     *
     * @return array
     */
    public function getByEmail(string $email)
    {
        $query = "SELECT * FROM $this->table WHERE email = ?";
        $result = $this->db->query($query, $email)->getResult('array');
        if (count($result) == 0) {
            return false;
        } else {
            return $result[0];
        }
    }

    //--------------------------------------------------------------------

    /**
     * Verifica se o password e o mesmo passado.
     *
     * @param string $password
     * @param string $hash
     *
     * @return bool    Retorna true se for valido, false de for diferente.
     */
    public function checkPassword($password, $hash)
    {
        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }
}

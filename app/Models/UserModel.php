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

    /**
     * Verifica se o usuario possui um login valido.
     *
     * @param string $email
     * @param string $password
     *
     * @return array $user   Retorna os dados do usuario ou valor null.
     */
    public function checkLogin($email, $password)
    {
        /* Verifica o email*/
        $user = $this->checkEmail($email);
        if ($user) {
            // Usuario encontrado
            $checkPassword = $this->checkPassword($password, $user['password']);
            if ($checkPassword) {
                if ($user['state'] == 1) {
                    // Remove o password
                    $key = array_search($user['password'], $user);
                    if ($key !== false) {
                        unset($user[$key]);
                    }
                    return $user;
                }
            }

        }
    }

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

        $query = "SELECT * FROM users WHERE email = ?";
        $result = $this->db->query($query, $data)->getResult('array');

        if (count($result) == 0) {
            return false;
        } else {
            return $result[0];
        }
    }

    /**
     * Verifica se o password e o mesmo passado.
     *
     * @param string $password
     * @param string $hash
     *
     * @return bool    Retorna true se for valido, false de for diferente.
     */
    protected function checkPassword($password, $hash)
    {
        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }
}

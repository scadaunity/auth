<?php namespace Scadaunity\Auth\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'Auth_Users';
    protected $returnType = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'name',
        'email',
        'password',
        'activation_code',
        'state',
        'avatar',
        'token',
        'email_verified'
    ];
    protected $useTimestamps = true;
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    /* Getters*/
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
     * @return bool
     */
    public function checkPassword($password, $hash)
    {
        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }

    public function addresses()
    {
        return (new Adresses())->where('user_id',uid);
    }
}

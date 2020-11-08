<?php


namespace Scadaunity\Auth\Database\Seeds;


use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Scada Unity',
            'email'    => 'scadaunity@gmail.com',
            'password' => '$2y$10$F/fpufRnNXXY8tROZuc1DeokBcuMmG9ZJout8CHMDBauZMMwFSUVq',
            'email_verified' => 1,
            'token' => '547345',
            'state' => 1,
            'avatar' => 1,
        ];

        // Using Query Builder
        $this->db->table('Auth_Users')->insert($data);
    }
}
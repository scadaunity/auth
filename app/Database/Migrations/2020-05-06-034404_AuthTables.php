<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthTables extends Migration
{
	public function up()
	{
        /*
         * Create table Users
         */
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'email'         => ['type' => 'varchar', 'constraint' => 256],
            'password'      => ['type' => 'varchar', 'constraint' => 100],
            'state'         => ['type' => 'tinyint', 'constraint' => 1],
            'avatar'        => ['type' => 'varchar', 'constraint' => 256],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
            'deleted_at'    => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		// users
        $this->forge->dropTable('users', true);
	}
}

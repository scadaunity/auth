<?php namespace Scadaunity\Auth\Database\Migrations;

use CodeIgniter\Database\Migration;

class AuthTables extends Migration
{
    public function up()
    {
        /*
         * Create table Auth_Users
         */
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'email' => ['type' => 'varchar', 'constraint' => 256],
            'password' => ['type' => 'varchar', 'constraint' => 100],
            'email_verified' => ['type' => 'tinyint', 'constraint' => 1],
            'token' => ['type' => 'varchar', 'constraint' => 256],
            'state' => ['type' => 'tinyint', 'constraint' => 1],
            'avatar' => ['type' => 'varchar', 'constraint' => 256],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Auth_Users');

        /*
         * Create table Auth_Login_Attempt
         */
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'email' => ['type' => 'varchar', 'constraint' => 256],
            'ip' => ['type' => 'varchar', 'constraint' => 50],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Auth_Login_Attempt');

        /*
         * -------------------------------------------------------------------------------------
         * Teste de permissoes dos usuarios (03/06/2020)
         * -------------------------------------------------------------------------------------
        */

        /*
         * Create table Auth_Roles
         */
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Auth_Roles');

        /*
         * Create table Auth_Permissions
         */
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Auth_Permissions');

        /*
         * Create table Auth_Role_Permissions
         */
        $this->forge->addField([
            'role_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'permission_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->createTable('Auth_Role_Permissions');

        /*
         * Create table Auth_User_Roles
         */
        $this->forge->addField([
            'user_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'role_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'created_at' => ['type' => 'datetime', 'null' => true],
            'updated_at' => ['type' => 'datetime', 'null' => true],
            'deleted_at' => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->createTable('Auth_User_Roles');

        /*
         * Create table Auth_User_Addresses
         */
        $this->forge->addField([
            'addr_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'user_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'street' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'number' => ['type' => 'varchar', 'constraint' => 100, 'null' => true],

        ]);
        $this->forge->createTable('Auth_User_Addresses');

        /*
         * Create table Auth_Config
         */
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'user_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'street' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'number' => ['type' => 'varchar', 'constraint' => 100, 'null' => true],

        ]);
        $this->forge->createTable('Auth_Config');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        // users
        $this->forge->dropTable('Auth_Users', true);
        $this->forge->dropTable('Auth_Login_Attempt', true);
        $this->forge->dropTable('Auth_Roles', true);
        $this->forge->dropTable('Auth_Permissions', true);
        $this->forge->dropTable('Auth_Role_Permissions', true);
        $this->forge->dropTable('Auth_User_Roles', true);
        $this->forge->dropTable('Auth_User_Addresses', true);
    }
}

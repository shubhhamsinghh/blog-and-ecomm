<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 9, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false],
            'email' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => false],
            'password' => ['type' => 'TEXT', 'null' => false,],
            'created_at'  => ['type' => 'TIMESTAMP' ],
            'updated_at'  => ['type' => 'TIMESTAMP', 'default' => null],
            'deleted_at'  => ['type' => 'TIMESTAMP', 'default' => null],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}

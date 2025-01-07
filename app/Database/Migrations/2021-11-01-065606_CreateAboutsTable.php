<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAboutsTable extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR'],
            'about_us' => ['type' => 'TEXT'],
            'thumbnail' => ['type' => 'VARCHAR'],
            'created_at'  => ['type' => 'TIMESTAMP' ],
            'updated_at'  => ['type' => 'TIMESTAMP', 'default' => null],
            'deleted_at'  => ['type' => 'TIMESTAMP', 'default' => null]
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('abouts', true);
    }

    public function down()
    {
        $this->forge->dropTable('abouts', true);
    }
}

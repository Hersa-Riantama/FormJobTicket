<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableGrup extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_grup' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_koord' => [
                'type' => 'INT',
            ],
            'id_editor' => [
                'type' => 'INT',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
                'on_update' => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id_grup', true);
        $this->forge->createTable('tbl_grup');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_grup');
    }
}

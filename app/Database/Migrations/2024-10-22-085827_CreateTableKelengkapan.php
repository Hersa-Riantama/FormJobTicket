<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableKelengkapan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kelengkapan' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_tiket' => [
                'type' => 'INT',
            ],
            'nama_kelengkapan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addKey('id_kelengkapan', true);
        $this->forge->createTable('tbl_kelengkapan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_kelengkapan');
    }
}

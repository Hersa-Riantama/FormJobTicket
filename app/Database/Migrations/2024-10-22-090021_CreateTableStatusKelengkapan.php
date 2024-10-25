<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableStatusKelengkapan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status_kelengkapan' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_tiket' => [
                'type' => 'INT',
            ],
            'tahap_kelengkapan' => [
                'type' => 'LONGTEXT',
            ],
            'status_kelengkapan' => [
                'type' => 'ENUM',
                'constraint' => ['N', 'Y'],
                'default' => 'N',
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
        $this->forge->addKey('id_status_kelengkapan', true);
        $this->forge->createTable('tbl_status_kelengkapan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_status_kelengkapan');
    }
}

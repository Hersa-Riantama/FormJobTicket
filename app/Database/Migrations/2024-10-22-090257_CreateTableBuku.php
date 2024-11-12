<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableBuku extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_buku' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_buku' => [
                'type' => 'INT',
                'constraint' => '12',
            ],
            'judul_buku' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pengarang' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'target_terbit' => [
                'type' => 'YEAR',
            ],
            'warna' => [
                'type' => 'ENUM',
                'constraint' => ['BW', '2/2', '3/3', '4/4']
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
        $this->forge->addKey('id_buku', true);
        $this->forge->createTable('tbl_buku');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_buku');
    }
}

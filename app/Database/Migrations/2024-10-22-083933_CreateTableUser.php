<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nomor_induk' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_tlp' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'jk' => [
                'type' => 'ENUM',
                'constraint' => ['Laki-Laki', 'Perempuan'],
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'avatar' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'verifikasi' => [
                'type' => 'VARCHAR',
                'constraint' => ['N', 'Y', 'R'],
                'null' => true,
                'default' => 'N',
            ],
            'status_user' => [
                'type' => 'VARCHAR',
                'constraint' => ['aktif', 'nonaktif', 'suspend'],
                'null' => true,
                'default' => 'nonaktif',
            ],
            'level_user' => [
                'type' => 'ENUM',
                'constraint' => ['Admin Sistem', 'Tim Multimedia', 'Editor', 'Koord Editor', 'Manager Platform'],
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
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('tbl_users');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_users');
    }
}

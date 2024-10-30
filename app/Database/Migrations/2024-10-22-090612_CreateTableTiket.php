<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableTiket extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tiket' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_form' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 'C1',
            ],
            'id_kategori' => [
                'type' => 'LONGTEXT',
            ],
            'tgl_selesai' => [
                'type' => 'DATE',
            ],
            'tgl_upload' => [
                'type' => 'DATE',
            ],
            'id_user' => [
                'type' => 'INT',
            ],
            'nomor_job' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_buku' => [
                'type' => 'INT',
            ],
            'jml_qrcode' => [
                'type' => 'INT',
            ],
            'id_editor' => [
                'type' => 'INT',
            ],
            'id_koord' => [
                'type' => 'INT',
            ],
            'id_multimedia' => [
                'type' => 'INT',
            ],
            'id_admin' => [
                'type' => 'INT',
            ],
            'tgl_order_editor' => [
                'type' => 'DATE',
            ],
            'tgl_order_koord' => [
                'type' => 'DATE',
            ],
            'tgl_acc_multimedia' => [
                'type' => 'DATE',
            ],
            'tgl_acc_koord' => [
                'type' => 'DATE',
            ],
            'tgl_acc_manager' => [
                'type' => 'DATE',
            ],
            'tgl_acc_admin' => [
                'type' => 'DATE',
            ],
            'approved_order_editor' => [
                'type' => 'ENUM',
                'constraint' => ['Y', 'N'],
                'deafult' => 'N',
            ],
            'approved_order_koord' => [
                'type' => 'ENUM',
                'constraint' => ['Y', 'N'],
                'deafult' => 'N',
            ],
            'approved_order_admin' => [
                'type' => 'ENUM',
                'constraint' => ['Y', 'N'],
                'deafult' => 'N',
            ],
            'approved_acc_koord' => [
                'type' => 'ENUM',
                'constraint' => ['Y', 'N'],
                'deafult' => 'N',
            ],
            'approved_acc_manager' => [
                'type' => 'ENUM',
                'constraint' => ['Y', 'N'],
                'deafult' => 'N',
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
        $this->forge->addKey('id_tiket', true);
        $this->forge->createTable('tbl_tiket');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_tiket');
    }
}

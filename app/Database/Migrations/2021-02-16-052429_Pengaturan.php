<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengaturan extends Migration
{
	public function up()
	{
		$this->forge->addField([
         'id' => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
            'auto_increment' => true,
         ],
         'nama_sekolah' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
         ],
         'alamat' => [
            'type' => 'TEXT',
         ],
         'kecamatan' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
         ],
         'kabupaten' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
         ],
         'no_telp' => [
            'type' => 'INT',
            'constraint' => 11,
         ],
         'email' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
         ],
         'web' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
         ],
         'deskripsi' => [
            'type' => 'TEXT',
         ],
         'logo' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
         ],
      ]);

      $this->forge->addKey('id', true);
      $this->forge->createTable('pengaturan');
	}

	public function down()
	{
		$this->forge->dropTable('pengaturan');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBerkas extends Migration
{
	public function up()
	{
		$this->forge->addField([
         'id_berkas' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true,
         ],
         'id_siswa' => [
            'type' => 'INT',
            'constraint' => 11,
            'null' => true,
         ],
         'id_lampiran' => [
            'type' => 'INT',
            'constraint' => 11,
            'null' => true,
         ],
         'ket_berkas' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => true,
         ],
         'berkas' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => true,
         ],
      ]);

      $this->forge->addKey('id_berkas', true);
      $this->forge->createTable('berkas');
	}

	public function down()
	{
		$this->forge->dropTable('berkas');
	}
}

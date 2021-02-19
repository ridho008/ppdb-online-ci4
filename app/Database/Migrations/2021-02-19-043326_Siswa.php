<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
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
         'nisn' => [
            'type' => 'VARCHAR',
            'constraint' => 20,
         ],
         'nama' => [
            'type' => 'VARCHAR',
            'constraint' => 50,
         ],
         'password' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => true,
         ],
         'tmp_lahir' => [
            'type' => 'VARCHAR',
            'constraint' => 20,
         ],
         'tgl_lahir' => [
            'type' => 'DATE',
         ],
      ]);

      $this->forge->addKey('id', true);
      $this->forge->createTable('siswa');
	}

	public function down()
	{
		$this->forge->dropTable('siswa');
	}
}

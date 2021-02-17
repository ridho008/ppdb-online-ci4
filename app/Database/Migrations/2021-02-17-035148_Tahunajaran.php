<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tahunajaran extends Migration
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
         'tahun' => [
            'type' => 'YEAR',
            'constraint' => 4,
         ],
         'ta' => [
            'type' => 'VARCHAR',
            'constraint' => 30,
         ],
         'status' => [
            'type' => 'INT',
            'constraint' => 1,
         ],
      ]);

      $this->forge->addKey('id', true);
      $this->forge->createTable('tahun_ajaran');
	}

	public function down()
	{
		$this->forge->dropTable('tahun_ajaran');
	}
}

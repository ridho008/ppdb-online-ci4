<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jalurmasuk extends Migration
{
	public function up()
	{
		$this->forge->addField([
         'id_jalur' => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
            'auto_increment' => true,
         ],
         'jalur_masuk' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
         ],
         'kouta' => [
            'type' => 'INT',
            'constraint' => 11,
         ],
      ]);

      $this->forge->addKey('id_jalur', true);
      $this->forge->createTable('jalur_masuk');
	}

	public function down()
	{
		$this->forge->dropTable('jalur_masuk');
	}
}

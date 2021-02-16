<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pendidikan extends Migration
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
         'pendidikan' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
         ],
      ]);

      $this->forge->addKey('id', true);
      $this->forge->createTable('pendidikan');
	}

	public function down()
	{
		$this->forge->dropTable('pendidikan');
	}
}

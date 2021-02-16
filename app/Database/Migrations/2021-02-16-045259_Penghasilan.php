<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penghasilan extends Migration
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
         'penghasilan' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
         ],
      ]);

      $this->forge->addKey('id', true);
      $this->forge->createTable('penghasilan');
	}

	public function down()
	{
		$this->forge->dropTable('penghasilan');
	}
}

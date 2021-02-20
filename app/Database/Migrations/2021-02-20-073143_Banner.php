<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Banner extends Migration
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
         'ket' => [
            'type' => 'TEXT',
         ],
         'banner' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
         ],
      ]);

      $this->forge->addKey('id', true);
      $this->forge->createTable('banner');
	}

	public function down()
	{
		$this->forge->dropTable('banner');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
         'nama' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
         ],
         'username' => [
            'type' => 'VARCHAR',
            'constraint' => 20,
         ],
         'password' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
         ],
         'foto' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => true,
         ]
      ]);

      $this->forge->addKey('id', true);
      $this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}

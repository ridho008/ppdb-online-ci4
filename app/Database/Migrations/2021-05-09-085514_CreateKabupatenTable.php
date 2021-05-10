<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKabupatenTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
         'id_kabupaten' => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
            'auto_increment' => true,
         ],
         'id_provinsi' => [
            'type' => 'INT',
            'constraint' => 11,
         ],
         'nama_kabupaten' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
         ],
      ]);

      $this->forge->addKey('id_kabupaten', true);
      $this->forge->createTable('kabupaten');
	}

	public function down()
	{
		$this->forge->dropTable('kabupaten');
	}
}

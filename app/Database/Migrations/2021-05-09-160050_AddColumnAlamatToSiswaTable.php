<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnAlamatToSiswaTable extends Migration
{
	public function up()
	{
		$fields = [
        'id_provinsi' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
        'id_kabupaten' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
        'kecamatan' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
        'alamat' => ['type' => 'TEXT', 'null' => true],
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('siswa', ['id_provinsi', 'id_kabupaten', 'kecamatan']);
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnIdJurusanToSiswaTable extends Migration
{
	public function up()
	{
		$fields = [
        'id_jurusan' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('siswa', 'id_jurusan');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnTahunToSiswaTable extends Migration
{
	public function up()
	{
		$fields = [
        'tahun' => ['type' => 'YEAR', 'constraint' => 4, 'null' => true],
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('siswa', 'tahun');
	}
}

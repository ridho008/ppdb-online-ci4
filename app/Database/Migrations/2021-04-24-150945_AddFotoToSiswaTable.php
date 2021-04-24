<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFotoToSiswaTable extends Migration
{
	public function up()
	{
		$fields = [
        'foto' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true,]
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$forge->dropColumn('siswa', 'foto');
	}
}

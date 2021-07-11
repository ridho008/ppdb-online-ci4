<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnStatusPpdbToSiswaTable extends Migration
{
	public function up()
	{
		$fields = [
        'status_ppdb' => ['type' => 'INT', 'constraint' => 1, 'default' => 0],
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('siswa', 'status_ppdb');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnStatusPendaftaranToTableSiswa extends Migration
{
	public function up()
	{
		$fields = [
        'status_pendaftaran' => ['type' => 'INT', 'constraint' => 1, 'null' => true],
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('siswa', 'status_pendaftaran');
	}
}

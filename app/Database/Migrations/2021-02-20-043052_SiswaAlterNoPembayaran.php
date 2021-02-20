<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiswaAlterNoPembayaran extends Migration
{
	public function up()
	{
		$fields = [
        'no_pendaftaran' => ['type' => 'VARCHAR', 'constraint' => 15]
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('siswa', 'no_pendaftaran');
	}
}

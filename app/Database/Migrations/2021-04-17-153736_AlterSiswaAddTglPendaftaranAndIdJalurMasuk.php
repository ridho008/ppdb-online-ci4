<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterSiswaAddTglPendaftaranAndIdJalurMasuk extends Migration
{
	public function up()
	{
		$fields = [
              'tgl_pendaftaran' => ['type' => 'date'],
              'id_jalur_masuk' => ['type' => 'INT', 'constraint' => 11]
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('siswa', ['tgl_pendaftaran', 'id_jalur_masuk']);
	}
}

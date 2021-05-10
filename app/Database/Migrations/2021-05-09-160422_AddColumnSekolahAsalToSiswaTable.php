<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnSekolahAsalToSiswaTable extends Migration
{
	public function up()
	{
		$fields = [
        'nama_sekolah' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
        'tahun_lulus' => ['type' => 'YEAR', 'null' => true],
        'no_izajah' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
        'no_skhun' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('siswa', ['nama_sekolah', 'tahun_lulus', 'no_izajah', 'no_skhun']);
	}
}

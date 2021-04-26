<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAyahKandungToSiswaTable extends Migration
{
	public function up()
	{
		$fields = [
        'nik_ayah' => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
        'nama_ayah' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
        'pendidikan_ayah' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
        'pekerjaan_ayah' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
        'penghasilan_ayah' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
        'telp_ayah' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('siswa', ['nik_ayah', 'nama_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'telp_ayah']);
	}
}

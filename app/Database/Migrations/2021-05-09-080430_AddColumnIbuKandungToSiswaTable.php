<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnIbuKandungToSiswaTable extends Migration
{
	public function up()
	{
		$fields = [
        'nik_ibu' => ['type' => 'VARCHAR', 'constraint' => 30, 'null' => true],
        'nama_ibu' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
        'pendidikan_ibu' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
        'pekerjaan_ibu' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
        'penghasilan_ibu' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
        'telp_ibu' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('siswa', ['nik_ibu', 'nama_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'telp_ibu']);
	}
}

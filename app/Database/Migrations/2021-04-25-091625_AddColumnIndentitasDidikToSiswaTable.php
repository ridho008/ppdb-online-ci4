<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnIndentitasDidikToSiswaTable extends Migration
{
	public function up()
	{
		$fields = [
        'jk' => ['type' => 'VARCHAR', 'constraint' => 2, 'null' => true],
        'nik' => ['type' => 'VARCHAR', 'constraint' => 25, 'null' => true],
        'id_agama' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
        'no_telp' => ['type' => 'VARCHAR', 'constraint' => 15, 'null' => true],
        'tinggi' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
        'berat' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
        'jml_saudara' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
        'anak_ke' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
      ];
      $this->forge->addColumn('siswa', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('siswa', ['jk', 'nik', 'id_agama', 'no_telp', 'tinggi', 'berat', 'jml_saudara', 'anak_ke']);
	}
}

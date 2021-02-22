<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengaturanalterberanda extends Migration
{
	public function up()
	{
		$fields = [
        'beranda' => ['type' => 'TEXT',]
      ];
      $this->forge->addColumn('pengaturan', $fields);
	}

	public function down()
	{
		$this->forge->dropColumn('pengaturan', 'beranda');
	}
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model
{
	protected $table = 'kecamatan';
   protected $primaryKey = 'id_kecamatan';
   protected $allowedFields = ['id_kabupaten', 'nama_kecamatan'];
}

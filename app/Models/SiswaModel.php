<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
   protected $table = 'siswa';
   protected $primaryKey = 'id';
   protected $allowedFields = ['nisn', 'nama', 'password', 'tmp_lahir', 'tgl_lahir', 'no_pendaftaran'];
   protected $returnType = 'App\Entities\Siswa';

   public function noPendaftaran()
   {
    $this->db->table('siswa')
             ->select('RIGHT(no_pendaftaran,3) AS no_pendaftaran', false)
             ->orderBy('no_pendaftaran', 'desc')
             ->limit(1)
             ->get()->getRow();
   }

   public function getBiodataSiswa($id_siswa)
   {
      return $this->db->table('siswa')
              ->where('id', $id_siswa)
              ->get()->getRow();
   }
}
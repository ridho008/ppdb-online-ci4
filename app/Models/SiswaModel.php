<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
   protected $table = 'siswa';
   protected $primaryKey = 'id';
   protected $allowedFields = ['nisn', 'nama', 'password', 'tmp_lahir', 'tgl_lahir', 'no_pendaftaran', 'foto'];
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
              ->join('jalur_masuk', 'jalur_masuk.id_jalur = siswa.id_jalur_masuk', 'left')
              ->where('id', $id_siswa)
              ->get()->getRow();
   }

   public function updateSiswa($id, $data)
   {
      $this->db->table('siswa')
                ->where('id', $id)
                ->update($data);
   }

   public function getRowSiswa($id)
   {
    return $this->db->table('siswa')
            ->where('id', $id)
            ->get()->getRowArray();
   }
}
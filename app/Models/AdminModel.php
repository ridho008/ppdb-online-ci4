<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
   protected $table = 'pengaturan';
   protected $allowedFields = ['logo'];

   public function detailSetting()
   {
      return $this->db->table('pengaturan')
                      ->where('id', 1)
                      ->get()->getRowArray();
   }

   public function savePengaturan($id, $logo)
   {
      $this->db->table('pengaturan')
                  ->set('logo', $logo)
                  ->where('id', $id)
                  ->update();
   }

   public function updatePengaturan($data)
   {
      $this->db->table('pengaturan')
                  ->set($data)
                  ->where('id', 1)
                  ->update();
   }

   // ********************** Pendaftaran Admin *************************
   public function getAllPendaftaranByStatus($statusPPDB, $statusPendaftaran)
   {
      return $this->db->table('siswa')
              ->select('*, siswa.id AS idSiswa')
              ->join('jalur_masuk', 'jalur_masuk.id_jalur = siswa.id_jalur_masuk', 'left')
              ->join('agama', 'agama.id = siswa.id_agama', 'left')
              ->join('kabupaten', 'kabupaten.id_kabupaten = siswa.id_kabupaten', 'left')
              ->join('provinsi', 'provinsi.id_provinsi = siswa.id_provinsi', 'left')
              ->join('jurusan', 'jurusan.id = siswa.id_jurusan', 'left')
              ->where('siswa.status_ppdb', $statusPPDB)
              ->where('siswa.status_pendaftaran', $statusPendaftaran)
              ->get()->getResultArray();
   }

   
}
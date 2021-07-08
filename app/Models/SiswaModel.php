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
              ->select('*', 'agama.id AS id_agama')
              ->join('jalur_masuk', 'jalur_masuk.id_jalur = siswa.id_jalur_masuk', 'left')
              ->join('agama', 'id_agama = siswa.id_agama', 'left')
              ->join('kabupaten', 'kabupaten.id_kabupaten = siswa.id_kabupaten', 'left')
              ->join('provinsi', 'provinsi.id_provinsi = siswa.id_provinsi', 'left')
              ->where('siswa.id', $id_siswa)
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

   public function getAllProvinsi()
   {
    return $this->db->table('provinsi')
            ->get()->getResultArray();
   }

   public function getAllBerkas($id_siswa)
   {
    return $this->db->table('berkas')
            ->join('siswa', 'berkas.id_siswa = siswa.id', 'left')
            ->join('lampiran', 'berkas.id_lampiran = lampiran.id', 'left')
            ->where('berkas.id_siswa', $id_siswa)
            ->get()->getResultArray();
   }

   public function getByIdProvinsi($id_provinsi)
   {
    return $this->db->table('kabupaten')
            ->where('id_provinsi', $id_provinsi)
            ->get()->getResultArray();
   }

   public function insertBerkas($data)
   {
      $this->db->table('berkas')
                ->insert($data);
   }

   public function deleteBerkas($id_berkas)
   {
      $this->db->table('berkas')
               ->where('id_berkas', $id_berkas)
               ->delete();
   }

   public function getBerkasById($id_berkas)
   {
      return $this->db->table('berkas')
            ->where('id_berkas', $id_berkas)
            ->get()->getRowArray();
   }
}
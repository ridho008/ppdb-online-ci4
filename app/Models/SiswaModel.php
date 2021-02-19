<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
   protected $table = 'siswa';
   protected $primaryKey = 'id';
   protected $allowedFields = ['nisn', 'nama', 'password', 'tmp_lahir', 'tgl_lahir'];
   protected $returnType = 'App\Entities\Siswa';

   public function getAgamaID($id)
   {
      return $this->db->table('agama')
                      ->where('id', $id)
                      ->get()->getRowArray();
   }

   public function countAgama()
   {
      return $this->db->table('agama')
                      ->countAllResults();
   }

   public function getAllAgama($limit, $offset, $keyword)
   {
      return $this->db->table('agama')
                      ->like('agama', $keyword)
                      ->get($limit, $offset)->getResult();
   }
}
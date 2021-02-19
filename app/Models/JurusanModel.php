<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
   protected $table = 'jurusan';
   protected $primaryKey = 'id';
   protected $allowedFields = ['jurusan'];
   protected $returnType = 'App\Entities\Jurusan';

   public function getJurusanID($id)
   {
      return $this->db->table('jurusan')
                      ->where('id', $id)
                      ->get()->getRowArray();
   }

   public function countJurusan()
   {
      return $this->db->table('jurusan')
                      ->countAllResults();
   }

   public function getAllJurusan($limit, $offset, $keyword)
   {
      return $this->db->table('jurusan')
                      ->like('jurusan', $keyword)
                      ->get($limit, $offset)->getResult();
   }
}
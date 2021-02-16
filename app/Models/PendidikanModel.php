<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
   protected $table = 'pendidikan';
   protected $primaryKey = 'id';
   protected $allowedFields = ['pendidikan'];
   protected $returnType = 'App\Entities\Pendidikan';

   public function getPendidikanID($id)
   {
      return $this->db->table('pendidikan')
                      ->where('id', $id)
                      ->get()->getRowArray();
   }

   public function countPendidikan()
   {
      return $this->db->table('pendidikan')
                      ->countAllResults();
   }

   public function getAllPendidikan($limit, $offset, $keyword)
   {
      return $this->db->table('pendidikan')
                      ->like('pendidikan', $keyword)
                      ->get($limit, $offset)->getResult();
   }
}
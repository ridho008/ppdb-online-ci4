<?php

namespace App\Models;

use CodeIgniter\Model;

class AgamaModel extends Model
{
   protected $table = 'agama';
   protected $primaryKey = 'id';
   protected $allowedFields = ['agama'];
   protected $returnType = 'App\Entities\Agama';

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
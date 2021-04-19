<?php

namespace App\Models;

use CodeIgniter\Model;

class LampiranModel extends Model
{
   protected $table = 'lampiran';
   protected $primaryKey = 'id';
   protected $allowedFields = ['id','lampiran'];
   protected $returnType = 'App\Entities\Lampiran';

   public function getLampiranID($id)
   {
      return $this->db->table('lampiran')
                      ->where('id', $id)
                      ->get()->getRowArray();
   }

   public function countLampiran()
   {
      return $this->db->table('lampiran')
                      ->countAllResults();
   }

   public function getAllLampiran($limit, $offset, $keyword)
   {
      return $this->db->table('lampiran')
                      ->like('lampiran', $keyword)
                      ->get($limit, $offset)->getResult();
   }
}
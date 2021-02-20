<?php

namespace App\Models;

use CodeIgniter\Model;

class JalurMasukModel extends Model
{
   protected $table = 'jalur_masuk';
   protected $primaryKey = 'id';
   protected $allowedFields = ['jalur_masuk', 'kouta'];
   protected $returnType = 'App\Entities\JalurMasuk';

   public function getJalurID($id)
   {
      return $this->db->table('jalur_masuk')
                      ->where('id', $id)
                      ->get()->getRowArray();
   }

   public function countJalur()
   {
      return $this->db->table('jalur_masuk')
                      ->countAllResults();
   }

   public function getAllJalur($limit, $offset, $keyword)
   {
      return $this->db->table('jalur_masuk')
                      ->like('jalur_masuk', $keyword)
                      ->like('kouta', $keyword)
                      ->get($limit, $offset)->getResult();
   }
}
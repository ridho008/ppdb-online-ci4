<?php

namespace App\Models;

use CodeIgniter\Model;

class PenghasilanModel extends Model
{
   protected $table = 'penghasilan';
   protected $primaryKey = 'id';
   protected $allowedFields = ['penghasilan'];
   protected $returnType = 'App\Entities\Penghasilan';

   public function getPenghasilanID($id)
   {
      return $this->db->table('penghasilan')
                      ->where('id', $id)
                      ->get()->getRowArray();
   }

   public function countPenghasilan()
   {
      return $this->db->table('penghasilan')
                      ->countAllResults();
   }

   public function getAllPenghasilan($limit, $offset, $keyword)
   {
      return $this->db->table('penghasilan')
                      ->like('penghasilan', $keyword)
                      ->get($limit, $offset)->getResult();
   }
}
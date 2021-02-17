<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunAjaranModel extends Model
{
   protected $table = 'tahun_ajaran';
   protected $primaryKey = 'id';
   protected $allowedFields = ['tahun', 'ta', 'status'];
   protected $returnType = 'App\Entities\TahunAjaran';

   public function getTahunID($id)
   {
      return $this->db->table('tahun_ajaran')
                      ->where('id', $id)
                      ->get()->getRowArray();
   }

   public function countTahun()
   {
      return $this->db->table('tahun_ajaran')
                      ->countAllResults();
   }

   public function getAllTahun($limit, $offset, $keyword)
   {
      return $this->db->table('tahun_ajaran')
                      ->like('tahun', $keyword)
                      ->orLike('ta', $keyword)
                      ->get($limit, $offset)->getResult();
   }

   public function resetStatus()
   {
    $this->db->table('tahun_ajaran')
             ->update(['status' => 0]);
   }

   public function updateStatus($data)
   {
    $this->db->table('tahun_ajaran')
              ->where('id', $data['id'])
              ->update($data);
   }
}
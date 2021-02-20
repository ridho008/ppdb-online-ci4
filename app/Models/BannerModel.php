<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
   protected $table = 'banner';
   protected $primaryKey = 'id';
   protected $allowedFields = ['ket', 'banner'];
   protected $returnType = 'App\Entities\Banner';

   public function getbannerID($id)
   {
      return $this->db->table('banner')
                      ->where('id', $id)
                      ->get()->getRowArray();
   }

   public function countBanner()
   {
      return $this->db->table('banner')
                      ->countAllResults();
   }

   public function getAllBanner($limit, $offset, $keyword)
   {
      return $this->db->table('banner')
                      ->like('ket', $keyword)
                      ->get($limit, $offset)->getResult();
   }
}
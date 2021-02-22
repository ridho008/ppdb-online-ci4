<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
   protected $table = 'pengaturan';
   protected $allowedFields = ['logo'];

   public function detailSetting()
   {
      return $this->db->table('pengaturan')
                      ->where('id', 1)
                      ->get()->getRowArray();
   }

   public function savePengaturan($id, $logo)
   {
      $this->db->table('pengaturan')
                  ->set('logo', $logo)
                  ->where('id', $id)
                  ->update();
   }

   public function updatePengaturan($data)
   {
      $this->db->table('pengaturan')
                  ->set($data)
                  ->where('id', 1)
                  ->update();
   }

   
}
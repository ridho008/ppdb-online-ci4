<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaanModel extends Model
{
   protected $table = 'pekerjaan';
   protected $primaryKey = 'id';
   protected $allowedFields = ['pekerjaan'];
   protected $returnType = 'App\Entities\Pekerjaan';

   public function getPekerjaanID($id)
   {
      return $this->db->table('pekerjaan')
                      ->where('id', $id)
                      ->get()->getRowArray();
   }
}
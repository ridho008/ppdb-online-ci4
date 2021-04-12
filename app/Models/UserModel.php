<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
   protected $table = 'user';
   protected $primaryKey = 'id';
   protected $allowedFields = ['username', 'nama', 'foto', 'password'];
   protected $returnType = 'App\Entities\User';

   public function getUserID($id)
   {
      return $this->db->table('user')
                      ->where('id', $id)
                      ->get()->getRowArray();
   }

   public function countUser()
   {
      return $this->db->table('user')
                      ->countAllResults();
   }

   public function getAllUser($limit, $offset, $keyword)
   {
      return $this->db->table('user')
                      ->like('username', $keyword)
                      ->orLike('nama', $keyword)
                      ->get($limit, $offset)->getResult();
   }
}
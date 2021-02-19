<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
   public function getUser($username, $password) {
      return $this->db->table('user')
                      ->where('username', $username)
                      ->get()->getRowArray();
   }

   public function getSiswa($nisn, $password) {
      return $this->db->table('siswa')
                      ->where('nisn', $nisn)
                      ->get()->getRowArray();
   }
}
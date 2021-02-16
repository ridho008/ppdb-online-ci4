<?php

namespace App\Entities;

use CodeIgniter\Entity;

class User extends Entity
{
   public function setFoto($file)
   {
      $fileName = $file->getRandomName();
      $writePath = './img/user';
      $file->move($writePath, $fileName);
      $this->attributes['foto'] = $fileName;
      return $this;
   }

   public function setPassword(string $pass)
    {
        $this->attributes['password'] = md5($pass);
        return $this;
    }
}
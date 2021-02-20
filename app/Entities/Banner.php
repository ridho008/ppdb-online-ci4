<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Banner extends Entity
{
   public function setBanner($file)
   {
      $fileName = $file->getRandomName();
      $writePath = './img';
      $file->move($writePath, $fileName);
      $this->attributes['banner'] = $fileName;
      return $this;
   }

   
}
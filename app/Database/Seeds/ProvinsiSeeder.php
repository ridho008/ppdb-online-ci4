<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
	public function run()
	{
		$curl = curl_init();

         curl_setopt_array($curl, array(
           CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => "",
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 30,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => "GET",
           CURLOPT_HTTPHEADER => array(
             "key: 9000c3eb2c5a219fded1eb17cce0144f"
           ),
         ));

         $response = curl_exec($curl);
         $province = json_decode($response,true);
         $provinsi = $province['rajaongkir']['results'];

         foreach ($provinsi as $value) {
            $data = [
                  'provinsi'    => $value['province']
            ];
            $this->db->table('provinsi')->insert($data);
         }
	}
}

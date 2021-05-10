<?php

namespace App\Database\Seeds;
use App\Models\Kecamatan;
use CodeIgniter\Database\Seeder;

class KabupatenSeeder extends Seeder
{
		public function run()
      {
         $curl = curl_init();

         curl_setopt_array($curl, array(
           CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
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
         $city = json_decode($response,true);
         $cities = $city['rajaongkir']['results'];

         foreach ($cities as $value) {
            $data = [
                  'id_provinsi'    => $value['province_id'],
                  'nama_kabupaten'    => $value['city_name']
            ];
            $this->db->table('kabupaten')->insert($data);
         }
            
      }
}

<?php

use Illuminate\Database\Seeder;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
          'Aceh',
          'Bali',
          'Banten',
          'Bengkulu',
          'Gorontalo',
          'Jakarta',
          'Jambi',
          'Jawa Barat',
          'Jawa Tengah',
          'Jawa Timur',
          'Kalimantan Barat',
          'Kalimantan Selatan',
          'Kalimantan Tengah',
          'Kalimantan Timur',
          'Kalimantan Utara',
          'Kepulauan Bangka Belitung',
          'Kepulauan Riau',
          'Lampung',
          'Maluku',
          'Maluku Utara',
          'Nusa Tenggara Barat',
          'Nusa Tenggara Timur',
          'Papua',
          'Papua Barat',
          'Riau',
          'Sulawesi Barat',
          'Sulawesi Selatan',
          'Sulawesi Tengah',
          'Sulawesi Tenggara',
          'Sulawesi Utara',
          'Sumatra Barat',
          'Sumatra Selatan',
          'Sumatra Utara',
          'Yogyakarta',
        ];
        $insertValue = [];
        foreach($provinces as $province) {
          array_push($insertValue, [
            'name' => $province
          ]);
        }
        DB::table('provinces')->insert($insertValue);
    }
}

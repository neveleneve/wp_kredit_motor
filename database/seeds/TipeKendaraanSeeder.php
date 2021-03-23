<?php

use App\TipeKendaraan;
use Illuminate\Database\Seeder;

class TipeKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipeKendaraan::insert([
            [
                'id_merk' => 3,
                'tipe' => 'Suzuki Satria FU',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_merk' => 3,
                'tipe' => 'Suzuki GSX 150',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_merk' => 3,
                'tipe' => 'Suzuki GSX 250',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_merk' => 3,
                'tipe' => 'Lainnya (Hayate, Lets, New Thunder, dll)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}

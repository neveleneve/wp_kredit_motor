<?php

use App\TahunHarga;
use Illuminate\Database\Seeder;

class TahunHargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TahunHarga::insert([
            // id 1
            [
                'id_tipe_kendaraan' => 1,
                'tahun' => 2010,
                'harga_otr' => 7500000,
                'maks_pencairan' => 4500000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 1,
                'tahun' => 2011,
                'harga_otr' => 8500000,
                'maks_pencairan' => 5000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 1,
                'tahun' => 2012,
                'harga_otr' => 9000000,
                'maks_pencairan' => 5500000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 1,
                'tahun' => 2013,
                'harga_otr' => 10000000,
                'maks_pencairan' => 6000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 1,
                'tahun' => 2014,
                'harga_otr' => 11000000,
                'maks_pencairan' => 6500000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 1,
                'tahun' => 2015,
                'harga_otr' => 12000000,
                'maks_pencairan' => 7000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 1,
                'tahun' => 2016,
                'harga_otr' => 15000000,
                'maks_pencairan' => 8000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 1,
                'tahun' => 2017,
                'harga_otr' => 16000000,
                'maks_pencairan' => 8500000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 1,
                'tahun' => 2018,
                'harga_otr' => 17000000,
                'maks_pencairan' => 9000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 1,
                'tahun' => 2019,
                'harga_otr' => 18000000,
                'maks_pencairan' => 10000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            // id 2
            [
                'id_tipe_kendaraan' => 2,
                'tahun' => 2016,
                'harga_otr' => 16000000,
                'maks_pencairan' => 9000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 2,
                'tahun' => 2017,
                'harga_otr' => 17500000,
                'maks_pencairan' => 10000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 2,
                'tahun' => 2018,
                'harga_otr' => 19000000,
                'maks_pencairan' => 11000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 2,
                'tahun' => 2019,
                'harga_otr' => 22000000,
                'maks_pencairan' => 12000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            // id 3
            [
                'id_tipe_kendaraan' => 3,
                'tahun' => 2018,
                'harga_otr' => 23000000,
                'maks_pencairan' => 13500000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 3,
                'tahun' => 2019,
                'harga_otr' => 24000000,
                'maks_pencairan' => 14000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            // id 4
            [
                'id_tipe_kendaraan' => 4,
                'tahun' => '2015 Ke Atas',
                'harga_otr' => 0,
                'maks_pencairan' => 3000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_tipe_kendaraan' => 4,
                'tahun' => '2014 Ke Bawah',
                'harga_otr' => 0,
                'maks_pencairan' => 2000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            
        ]);
    }
}

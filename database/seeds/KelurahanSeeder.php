<?php

use App\Kelurahan;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelurahan::insert([
            [
                'id_kecamatan' => 1,
                'kelurahan' => 'Dompak',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 1,
                'kelurahan' => 'Sei Jang',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 1,
                'kelurahan' => 'Tanjung Ayun Sakti',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 1,
                'kelurahan' => 'Tanjungpinang Timur',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 1,
                'kelurahan' => 'Tanjung Unggat',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 2,
                'kelurahan' => 'Bukit Cermin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 2,
                'kelurahan' => 'Kampung Baru',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 2,
                'kelurahan' => 'Kemboja',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 2,
                'kelurahan' => 'Tanjungpinang Barat',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 3,
                'kelurahan' => 'Kampung Bugis',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 3,
                'kelurahan' => 'Penyengat',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 3,
                'kelurahan' => 'Senggarang',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 3,
                'kelurahan' => 'Tanjungpinang Kota',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 4,
                'kelurahan' => 'Air Raja',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 4,
                'kelurahan' => 'Batu IX',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 4,
                'kelurahan' => 'Kampung Bulang',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 4,
                'kelurahan' => 'Melayu Kota Piring',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id_kecamatan' => 4,
                'kelurahan' => 'Pinang Kencana',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}

<?php

use App\Kredit;
use Illuminate\Database\Seeder;

class KreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kredit::insert([
            [
                'pinjaman' => 2000000,
                'tenor' => 6,
                'angsuran' => 486000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 2500000,
                'tenor' => 6,
                'angsuran' => 583000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 2500000,
                'tenor' => 12,
                'angsuran' => 333000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 3000000,
                'tenor' => 6,
                'angsuran' => 680000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 3000000,
                'tenor' => 12,
                'angsuran' => 389000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 3500000,
                'tenor' => 6,
                'angsuran' => 778000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 3500000,
                'tenor' => 12,
                'angsuran' => 444000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 3500000,
                'tenor' => 18,
                'angsuran' => 333000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 4000000,
                'tenor' => 6,
                'angsuran' => 875000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 4000000,
                'tenor' => 12,
                'angsuran' => 500000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 4000000,
                'tenor' => 18,
                'angsuran' => 375000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 4000000,
                'tenor' => 24,
                'angsuran' => 319000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 4500000,
                'tenor' => 6,
                'angsuran' => 972000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 4500000,
                'tenor' => 12,
                'angsuran' => 555000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 4500000,
                'tenor' => 18,
                'angsuran' => 417000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 4500000,
                'tenor' => 24,
                'angsuran' => 254000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 5000000,
                'tenor' => 6,
                'angsuran' => 1069000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 5000000,
                'tenor' => 12,
                'angsuran' => 611000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 5000000,
                'tenor' => 18,
                'angsuran' => 458000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 5000000,
                'tenor' => 24,
                'angsuran' => 390000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 5500000,
                'tenor' => 6,
                'angsuran' => 1167000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 5500000,
                'tenor' => 12,
                'angsuran' => 667000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 5500000,
                'tenor' => 18,
                'angsuran' => 500000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 5500000,
                'tenor' => 24,
                'angsuran' => 425000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 6000000,
                'tenor' => 6,
                'angsuran' => 1264000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 6000000,
                'tenor' => 12,
                'angsuran' => 722000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 6000000,
                'tenor' => 18,
                'angsuran' => 541000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 6000000,
                'tenor' => 24,
                'angsuran' => 460000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 6500000,
                'tenor' => 6,
                'angsuran' => 1361000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 6500000,
                'tenor' => 12,
                'angsuran' => 778000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 6500000,
                'tenor' => 18,
                'angsuran' => 583000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 6500000,
                'tenor' => 24,
                'angsuran' => 496000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 7000000,
                'tenor' => 6,
                'angsuran' => 1458000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 7000000,
                'tenor' => 12,
                'angsuran' => 833000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 7000000,
                'tenor' => 18,
                'angsuran' => 625000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 7000000,
                'tenor' => 24,
                'angsuran' => 531000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 7500000,
                'tenor' => 6,
                'angsuran' => 1555000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 7500000,
                'tenor' => 12,
                'angsuran' => 889000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 7500000,
                'tenor' => 18,
                'angsuran' => 666000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 7500000,
                'tenor' => 24,
                'angsuran' => 567000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 8000000,
                'tenor' => 6,
                'angsuran' => 1653000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 8000000,
                'tenor' => 12,
                'angsuran' => 944000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 8000000,
                'tenor' => 18,
                'angsuran' => 708000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 8000000,
                'tenor' => 24,
                'angsuran' => 602000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 8500000,
                'tenor' => 6,
                'angsuran' => 1750000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 8500000,
                'tenor' => 12,
                'angsuran' => 1000000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 8500000,
                'tenor' => 18,
                'angsuran' => 750000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 8500000,
                'tenor' => 24,
                'angsuran' => 638000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 9000000,
                'tenor' => 6,
                'angsuran' => 1847000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 9000000,
                'tenor' => 12,
                'angsuran' => 1055000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 9000000,
                'tenor' => 18,
                'angsuran' => 791000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 9000000,
                'tenor' => 24,
                'angsuran' => 673000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 9500000,
                'tenor' => 6,
                'angsuran' => 1944000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 9500000,
                'tenor' => 12,
                'angsuran' => 1111000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 9500000,
                'tenor' => 18,
                'angsuran' => 833000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 9500000,
                'tenor' => 24,
                'angsuran' => 708000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 10000000,
                'tenor' => 6,
                'angsuran' => 2041000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 10000000,
                'tenor' => 12,
                'angsuran' => 1166000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 10000000,
                'tenor' => 18,
                'angsuran' => 875000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'pinjaman' => 10000000,
                'tenor' => 24,
                'angsuran' => 744000,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}

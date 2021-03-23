<?php

use App\TahunHarga;
use App\TipeKendaraan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KecamatanSeeder::class);
        $this->call(KelurahanSeeder::class);
        $this->call(KreditSeeder::class);
        $this->call(LoginSeeder::class);
        $this->call(MerkSeeder::class);
        $this->call(TipeKendaraanSeeder::class);
        $this->call(TahunHargaSeeder::class);
    }
}

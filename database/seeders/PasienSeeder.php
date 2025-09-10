<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pasien;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pasien::create([
            'nama_pasien' => 'Budi Santoso',
            'alamat' => 'Jl. Mawar No.1',
            'no_telepon' => '0812340000',
            'rumah_sakit_id' => 1
        ]);
        Pasien::create([
            'nama_pasien' => 'Siti Aminah',
            'alamat' => 'Jl. Melati No.2',
            'no_telepon' => '0822330000',
            'rumah_sakit_id' => 1
        ]);
        Pasien::create([
            'nama_pasien' => 'Joko Widodo',
            'alamat' => 'Jl. Kenanga No.3',
            'no_telepon' => '0833440000',
            'rumah_sakit_id' => 2
        ]);
    }
}

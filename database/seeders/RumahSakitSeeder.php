<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RumahSakit;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        RumahSakit::create([
            'nama_rumah_sakit' => 'RS Sehat Selalu',
            'alamat' => 'Jl. Kesehatan No.1',
            'email' => 'info@rssehat.com',
            'telepon' => '08123456789'
        ]);
        RumahSakit::create([
            'nama_rumah_sakit' => 'RS Aman Sentosa',
            'alamat' => 'Jl. Aman No.2',
            'email' => 'info@rsaman.com',
            'telepon' => '08987654321'
        ]);
    }
}

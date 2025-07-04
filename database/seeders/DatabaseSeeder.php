<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DetailSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(Defect1PumpSeeder::class);
        $this->call(DefectValueSeeder::class);
    }
}

// php artisan db:seed --class=DetailSeeder --force
// php artisan db:seed --class=GroupSeeder --force
// php artisan db:seed --class=Defect1PumpSeeder --force
// php artisan db:seed --class=DefectValueSeeder --force

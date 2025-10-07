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
        $this->call(UserGroupSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DetailSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(Defect1PumpSeeder::class);
        $this->call(DefectValue1PumpSeeder::class);
        $this->call(Defect2MotorSeeder::class);
        $this->call(DefectValue2MotorSeeder::class);
        $this->call(Defect3MppSeeder::class);
        $this->call(DefectValue3MppSeeder::class);
        $this->call(Defect4AghSeeder::class);
        $this->call(DefectValue4AghSeeder::class);
    }
}

// php artisan db:seed --class=UserGroupSeeder --force
// php artisan db:seed --class=UserSeeder --force
// php artisan db:seed --class=DetailSeeder --force
// php artisan db:seed --class=GroupSeeder --force
// php artisan db:seed --class=Defect1PumpSeeder --force
// php artisan db:seed --class=DefectValue1PumpSeeder --force

// php artisan db:seed --class=Defect2MotorSeeder
// php artisan db:seed --class=DefectValue2MotorSeeder

// php artisan db:seed --class=Defect3MppSeeder
// php artisan db:seed --class=DefectValue3MppSeeder

// php artisan db:seed --class=Defect4AghSeeder
// php artisan db:seed --class=DefectValue4AghSeeder

// Очистка
// php artisan app:clear-groups
// php artisan app:clear-mpp
// php artisan app:clear-agh

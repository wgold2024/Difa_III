<?php

namespace Database\Seeders;

use App\Models\Detail;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Common',
            ],
            [
                'id' => '2',
                'name' => 'Вращение',
            ],
            [
                'id' => '3',
                'name' => 'Верхнее положение',
            ],
            [
                'id' => '4',
                'name' => 'Нижнее положение',
            ],
        ];

        foreach ($data as $item) {
            Group::create($item);
        }
    }
}

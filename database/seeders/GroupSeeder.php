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
            [
                'id' => '5',
                'name' => 'Слом вала',
            ],
            [
                'id' => '6',
                'name' => 'Коррозия корпуса',
            ],
            [
                'id' => '7',
                'name' => 'Коррозия резьбы',
            ],
            [
                'id' => '8',
                'name' => 'Мех. повреждение корпуса',
            ],
            [
                'id' => '9',
                'name' => 'Мех. повреждение резьбы',
            ],
            [
                'id' => '10',
                'name' => 'Промыв корпуса',
            ],
            [
                'id' => '11',
                'name' => 'Промыв резьбы',
            ],
            [
                'id' => '12',
                'name' => 'Износ верхнего диска',
            ],
            [
                'id' => '13',
                'name' => 'Износ нижнего диска',
            ],
            [
                'id' => '14',
                'name' => 'Износ внутреннего диаметра ступицы',
            ],

        ];

        foreach ($data as $item) {
            Group::create($item);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPump = [
            [
                'id' => '1',
                'name' => 'Общая информация',
            ],
            [
                'id' => '2',
                'name' => 'Вал',
            ],
            [
                'id' => '3',
                'name' => 'Корпус',
            ],
            [
                'id' => '4',
                'name' => 'Рабочие колеса',
            ],
            [
                'id' => '5',
                'name' => 'Направляющие аппараты',
            ],
            [
                'id' => '6',
                'name' => 'Втулка защитная вала',
            ],
            [
                'id' => '7',
                'name' => 'Муфта шлицевая',
            ],
            [
                'id' => '8',
                'name' => 'Концевые детали',
            ],
            [
                'id' => '9',
                'name' => 'Осевые опоры',
            ],
            [
                'id' => '10',
                'name' => 'Промежуточные подшипники',
            ],
        ];

        // Детали насоса
        $dataPump = array_map(function ($item) {
            $item['unit'] = 'Pump';
            return $item;
        }, $dataPump);

        foreach ($dataPump as $item) {
            Detail::create($item);
        }
    }
}

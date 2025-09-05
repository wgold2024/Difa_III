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
                'name' => 'Концевые детали: голова',
            ],
            [
                'id' => '9',
                'name' => 'Концевые детали: основание',
            ],
            [
                'id' => '10',
                'name' => 'Концевые детали: верхний подшипник',
            ],
            [
                'id' => '11',
                'name' => 'Концевые детали: нижний подшипник',
            ],
            [
                'id' => '12',
                'name' => 'Осевые опоры',
            ],
            [
                'id' => '13',
                'name' => 'Промежуточные подшипники',
            ],
        ];

        $dataMotor = [
            [
                'id' => '51',
                'name' => 'Общая информация',
            ],
            [
                'id' => '52',
                'name' => 'Ротор в сборе',
            ],
            [
                'id' => '53',
                'name' => 'Вал',
            ],
            [
                'id' => '54',
                'name' => 'Корпус',
            ],
            [
                'id' => '55',
                'name' => 'Масло',
            ],
            [
                'id' => '56',
                'name' => 'Узел пяты',
            ],
            [
                'id' => '57',
                'name' => 'Узел токоввода',
            ],
            [
                'id' => '58',
                'name' => 'Статор',
            ],
            [
                'id' => '59',
                'name' => 'Пакеты ротора (вентильный)',
            ],
            [
                'id' => '60',
                'name' => 'Пакеты ротора (асинхронный)',
            ],
            [
                'id' => '61',
                'name' => 'Втулка подшипника',
            ],
            [
                'id' => '62',
                'name' => 'Муфта шлицевая',
            ],
            [
                'id' => '63',
                'name' => 'Голова',
            ],
            [
                'id' => '64',
                'name' => 'Основание',
            ],
            [
                'id' => '65',
                'name' => 'Фильтр',
            ],
            [
                'id' => '66',
                'name' => 'Клапан',
            ],
            [
                'id' => '67',
                'name' => 'Подшипники (ротора)',
            ],
            [
                'id' => '68',
                'name' => 'Узел секционирования',
            ],
            [
                'id' => '69',
                'name' => 'Стыковочный узел с ТМС/ТМС',
            ],
        ];

        $dataMpp = [
            [
                'id' => '101',
                'name' => 'Общая информация',
            ],
            [
                'id' => '102',
                'name' => 'Вал',
            ],
            [
                'id' => '103',
                'name' => 'Корпус',
            ],
            [
                'id' => '104',
                'name' => 'Рабочие колеса',
            ],
            [
                'id' => '105',
                'name' => 'Направляющие аппараты',
            ],
            [
                'id' => '106',
                'name' => 'Проставок',
            ],
            [
                'id' => '107',
                'name' => 'Втулка защитная вала',
            ],
            [
                'id' => '108',
                'name' => 'Муфта шлицевая',
            ],
            [
                'id' => '109',
                'name' => 'Концевые детали: голова',
            ],
            [
                'id' => '110',
                'name' => 'Концевые детали: основание',
            ],
            [
                'id' => '111',
                'name' => 'Концевые детали: верхний подшипник',
            ],
            [
                'id' => '112',
                'name' => 'Концевые детали: нижний подшипник',
            ],
            [
                'id' => '113',
                'name' => 'Подшипники',
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

        // Детали двигателя
        $dataMotor = array_map(function ($item) {
            $item['unit'] = 'Motor';
            return $item;
        }, $dataMotor);

        foreach ($dataMotor as $item) {
            Detail::create($item);
        }

        // Детали МФОН
        $dataMpp = array_map(function ($item) {
            $item['unit'] = 'Mpp';
            return $item;
        }, $dataMpp);

        foreach ($dataMpp as $item) {
            Detail::create($item);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\DefectValue;
use App\Models\Detail;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefectValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Схема сборки
            [
                'defect_id' => '4',
                'name' => 'Плавающая',
            ],
            [
                'defect_id' => '4',
                'name' => 'Пакетная',
            ],
            [
                'defect_id' => '4',
                'name' => 'Компрессионная',
            ],
            // Тип секции
            [
                'defect_id' => '5',
                'name' => 'Верхняя',
            ],
            [
                'defect_id' => '5',
                'name' => 'Средняя',
            ],
            [
                'defect_id' => '5',
                'name' => 'Нижняя',
            ],
            // Тип ремонта
            [
                'defect_id' => '6',
                'name' => 'Новый',
            ],
            [
                'defect_id' => '6',
                'name' => 'Ремонтный',
            ],
            // Длина секции
            [
                'defect_id' => '7',
                'name' => '0.5',
            ],
            [
                'defect_id' => '7',
                'name' => '6',
            ],
            // Тип шлицевого соединения
            [
                'defect_id' => '8',
                'name' => 'Эвольвентный',
            ],
            [
                'defect_id' => '8',
                'name' => 'Прямобочный',
            ],
            // Группа прочности вала
            [
                'defect_id' => '9',
                'name' => 'Т8',
            ],
            [
                'defect_id' => '9',
                'name' => 'Т14',
            ],
            // Диаметр вала
            [
                'defect_id' => '10',
                'name' => '1',
            ],
            [
                'defect_id' => '10',
                'name' => '2',
            ],
            [
                'defect_id' => '10',
                'name' => '3',
            ],
            // Вращение вала
            [
                'defect_id' => '13',
                'name' => 'Свободное',
            ],
            [
                'defect_id' => '13',
                'name' => 'Тугое',
            ],
            [
                'defect_id' => '13',
                'name' => 'Отсутствует',
            ],
            // Момент вращения
            [
                'defect_id' => '14',
                'measure_unit' => 'Н*м',
            ],
            // Ход вала
            [
                'defect_id' => '15',
                'name' => 'Да',
            ],
            [
                'defect_id' => '15',
                'name' => 'Нет',
            ],
            // Вылет вала (верхнее положение)
            [
                'defect_id' => '16',
                'measure_unit' => 'мм',
            ],
            // Норматив
            [
                'defect_id' => '17',
                'measure_unit' => 'мм',
            ],
            // Вылет вала (нижнее положение)
            [
                'defect_id' => '18',
                'measure_unit' => 'мм',
            ],
            // Норматив
            [
                'defect_id' => '19',
                'measure_unit' => 'мм',
            ],
            // Суммарная наработка вала
            [
                'defect_id' => '20',
                'measure_unit' => 'сут',
            ],
        ];

        foreach ($data as $item) {
            DefectValue::create($item);
        }

    }

}

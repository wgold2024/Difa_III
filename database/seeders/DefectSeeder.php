<?php

namespace Database\Seeders;

use App\Models\Defect;
use App\Models\Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => '1',
                'detail_id' => '1',
                'group_id' => 1,
                'name' => 'Наименование',
                'type' => 'string',
            ],
            [
                'id' => '2',
                'detail_id' => '1',
                'group_id' => 1,
                'name' => 'Серийный номер',
                'type' => 'string',
            ],
            [
                'id' => '3',
                'detail_id' => '1',
                'group_id' => 1,
                'name' => 'Производитель',
                'type' => 'string',
            ],
            [
                'id' => '4',
                'detail_id' => '1',
                'name' => 'Схема сборки',
                'type' => 'select',
            ],
            [
                'id' => '5',
                'detail_id' => '1',
                'name' => 'Тип секции',
                'type' => 'select',
            ],
            [
                'id' => '6',
                'detail_id' => '1',
                'name' => 'Тип ремонта',
                'type' => 'select',
            ],
            [
                'id' => '7',
                'detail_id' => '1',
                'name' => 'Длина секции',
                'type' => 'select',
            ],
            [
                'id' => '8',
                'detail_id' => '1',
                'name' => 'Тип шлицевого соединения',
                'type' => 'select',
            ],
            [
                'id' => '9',
                'detail_id' => '1',
                'name' => 'Группа прочности вала',
                'type' => 'select',
            ],
            [
                'id' => '10',
                'detail_id' => '1',
                'name' => 'Диаметр вала',
                'type' => 'select',
            ],
            [
                'id' => '11',
                'detail_id' => '1',
                'name' => 'Номер вала',
                'type' => 'string',
                'is_option' => true
            ],
            [
                'id' => '12',
                'detail_id' => '1',
                'name' => 'Номер муфты ',
                'type' => 'string',
                'is_option' => true
            ],
            [
                'id' => '13',
                'detail_id' => '1',
                'group_id' => 2,
                'name' => 'Вращение вала',
                'type' => 'select',
            ],
            [
                'id' => '14',
                'detail_id' => '1',
                'group_id' => 2,
                'name' => 'Момент вращения',
                'type' => 'number',
            ],
            [
                'id' => '15',
                'detail_id' => '1',
                'name' => 'Ход вала',
                'type' => 'select',
            ],
            [
                'id' => '16',
                'detail_id' => '1',
                'group_id' => 3,
                'name' => 'Вылет вала',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '17',
                'detail_id' => '1',
                'group_id' => 3,
                'name' => 'Норматив',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '18',
                'detail_id' => '1',
                'group_id' => 4,
                'name' => 'Вылет вала',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '19',
                'detail_id' => '1',
                'group_id' => 4,
                'name' => 'Норматив',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '20',
                'detail_id' => '1',
                'name' => 'Суммарная наработка вала',
                'type' => 'number',
                'is_option' => true
            ],
        ];

        foreach ($data as $item) {
            Defect::create($item);
        }
    }
}

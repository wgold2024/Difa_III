<?php

namespace Database\Seeders;

use App\Models\Defect;
use App\Models\Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Defect2MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // 31. Общая информация
            [
                'id' => '501',
                'detail_id' => '51',
                'name' => 'Наименование',
                'type' => 'string',
            ],
            [
                'id' => '502',
                'detail_id' => '51',
                'name' => 'Серийный номер',
                'type' => 'string',
            ],
            [
                'id' => '503',
                'detail_id' => '51',
                'name' => 'Производитель',
                'type' => 'string',
            ],
            [
                'id' => '504',
                'detail_id' => '51',
                'name' => 'Тип ПЭД',
                'type' => 'select',
            ],
            [
                'id' => '505',
                'detail_id' => '51',
                'name' => 'Термостойкость',
                'type' => 'select',
            ],
            [
                'id' => '506',
                'detail_id' => '51',
                'name' => 'Тип секции',
                'type' => 'select',
            ],
            [
                'id' => '507',
                'detail_id' => '51',
                'name' => 'Тип ремонта',
                'type' => 'select',
            ],
            [
                'id' => '508',
                'detail_id' => '51',
                'name' => 'Длина секции',
                'type' => 'select',
            ],
            [
                'id' => '509',
                'detail_id' => '51',
                'name' => 'Тип шлицевого соединения',
                'type' => 'select',
            ],
            [
                'id' => '510',
                'detail_id' => '51',
                'name' => 'Группа прочности вала',
                'type' => 'select',
            ],
            [
                'id' => '511',
                'detail_id' => '51',
                'name' => 'Диаметр вала',
                'type' => 'select',
            ],
            [
                'id' => '512',
                'detail_id' => '51',
                'name' => 'Номер вала',
                'type' => 'string',
            ],
            [
                'id' => '513',
                'detail_id' => '51',
                'name' => 'Номер муфты',
                'type' => 'string',
            ],
            [
                'id' => '514',
                'detail_id' => '51',
                'name' => 'Вращение вала',
                'type' => 'select',
            ],
            [
                'id' => '515',
                'detail_id' => '51',
                'name' => 'Момент вращения',
                'type' => 'number',
            ],
            [
                'id' => '516',
                'detail_id' => '51',
                'name' => 'Ход вала',
                'type' => 'select',
            ],
            [
                'id' => '517',
                'detail_id' => '51',
                'name' => 'Вылет вала (верхнее положение)',
                'type' => 'number',
            ],
            [
                'id' => '518',
                'detail_id' => '51',
                'name' => 'Норматив',
                'type' => 'number',
            ],
            [
                'id' => '519',
                'detail_id' => '51',
                'name' => 'Вылет вала (нижнее положение)',
                'type' => 'number',
            ],
            [
                'id' => '520',
                'detail_id' => '51',
                'name' => 'Норматив',
                'type' => 'number',
            ],
            [
                'id' => '521',
                'detail_id' => '51',
                'name' => 'Суммарная наработка вала',
                'type' => 'number',
            ],
            [
                'id' => '522',
                'detail_id' => '51',
                'name' => 'Суммарная наработка статора',
                'type' => 'number',
            ],
            [
                'id' => '523',
                'detail_id' => '51',
                'name' => 'Испытание на герметичность',
                'type' => 'select',
            ],
//            [
//                'id' => '524',
//                'detail_id' => '51',
//                'name' => 'Наружный термоиндикатор',
//                'type' => 'boolean',
//            ],
            [
                'id' => '525',
                'detail_id' => '51',
                'group_id' => 51,
                'name' => '1 глазок (120°С)',
                'type' => 'boolean',
            ],
            [
                'id' => '526',
                'detail_id' => '51',
                'group_id' => 51,
                'name' => '2 глазка (140°С)',
                'type' => 'boolean',
            ],
            [
                'id' => '527',
                'detail_id' => '51',
                'group_id' => 51,
                'name' => '3 глазка (160°С)',
                'type' => 'boolean',
            ],
            [
                'id' => '528',
                'detail_id' => '51',
                'group_id' => 51,
                'name' => '4 глазка (180°С)',
                'type' => 'boolean',
            ],
            [
                'id' => '529',
                'detail_id' => '51',
                'group_id' => 51,
                'name' => '5 глазков (200°С)',
                'type' => 'boolean',
            ],
//            [
//                'id' => '530',
//                'detail_id' => '51',
//                'name' => 'Внутренний термоиндикатор',
//                'type' => 'boolean',
//            ],
            [
                'id' => '531',
                'detail_id' => '51',
                'group_id' => 52,
                'name' => '1 глазок (120°С)',
                'type' => 'boolean',
            ],
            [
                'id' => '532',
                'detail_id' => '51',
                'group_id' => 52,
                'name' => '2 глазка (140°С)',
                'type' => 'boolean',
            ],
            [
                'id' => '533',
                'detail_id' => '51',
                'group_id' => 52,
                'name' => '3 глазка (160°С)',
                'type' => 'boolean',
            ],
            [
                'id' => '534',
                'detail_id' => '51',
                'group_id' => 52,
                'name' => '4 глазка (180°С)',
                'type' => 'boolean',
            ],
            [
                'id' => '535',
                'detail_id' => '51',
                'group_id' => 52,
                'name' => '5 глазков (200°С)',
                'type' => 'boolean',
            ],
            [
                'id' => '536',
                'detail_id' => '51',
                'name' => 'Rизоляции (в сборе)',
                'type' => 'number',
            ],
            [
                'id' => '537',
                'detail_id' => '51',
                'name' => 'Rизоляции ТМСП',
                'type' => 'number',
            ],
            [
                'id' => '538',
                'detail_id' => '51',
                'name' => 'Rизоляции ПЭД',
                'type' => 'number',
            ],
            [
                'id' => '539',
                'detail_id' => '51',
                'name' => 'Rизоляции статора',
                'type' => 'number',
            ],
            [
                'id' => '540',
                'detail_id' => '51',
                'name' => 'Наличие «звезды»',
                'type' => 'select',
            ],
            [
                'id' => '541',
                'detail_id' => '51',
                'name' => 'Ry',
                'type' => 'number',
            ],






            // 32. Ротор в сборе

        ];








        foreach ($data as $item) {
            Defect::create($item);
        }
    }
}

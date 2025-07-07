<?php

namespace Database\Seeders;

use App\Models\DefectValue;
use App\Models\Detail;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefectValue2MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // --- 31. Общая информация
            // 504. Тип ПЭД
            [
                'defect_id' => '504',
                'name' => 'Асинхронный',
            ],
            [
                'defect_id' => '504',
                'name' => 'Вентильный',
            ],
            // 505. Термостойкость
            [
                'defect_id' => '505',
                'name' => '120',
            ],
            [
                'defect_id' => '505',
                'name' => '150',
            ],
            [
                'defect_id' => '505',
                'name' => '170',
            ],
            [
                'defect_id' => '505',
                'name' => '180',
            ],
            [
                'defect_id' => '505',
                'name' => '200',
            ],
            [
                'defect_id' => '505',
                'name' => '250',
            ],
            // 506. Тип секции
            [
                'defect_id' => '506',
                'name' => 'Верхняя',
            ],
            [
                'defect_id' => '506',
                'name' => 'Средняя',
            ],
            [
                'defect_id' => '506',
                'name' => 'Нижняя',
            ],
            // 507. Тип ремонта
            [
                'defect_id' => '507',
                'name' => 'Новый',
            ],
            [
                'defect_id' => '507',
                'name' => 'Ремонтный',
            ],
            [
                'defect_id' => '507',
                'name' => 'Капитальный ремонт',
            ],
            // 508. Длина секции
            [
                'defect_id' => '508',
                'name' => '0,5м',
            ],
            [
                'defect_id' => '508',
                'name' => '6м',
            ],
            // 509. Тип шлицевого соединения
            [
                'defect_id' => '509',
                'name' => 'Эвольвентный',
            ],
            [
                'defect_id' => '509',
                'name' => 'Прямобочный',
            ],
            // 510. Тип шлицевого соединения
            [
                'defect_id' => '510',
                'name' => 'Т8',
            ],
            [
                'defect_id' => '510',
                'name' => 'Т11',
            ],
            // 511. Диаметр вала
            [
                'defect_id' => '511',
                'name' => '1',
            ],
            [
                'defect_id' => '511',
                'name' => '2',
            ],
            [
                'defect_id' => '511',
                'name' => '3',
            ],
            // 514. Вращение вала
            [
                'defect_id' => '514',
                'name' => 'Свободное',
            ],
            [
                'defect_id' => '514',
                'name' => 'Тугое',
            ],
            [
                'defect_id' => '514',
                'name' => 'Отсутствует',
            ],
            // 515. Момент вращения
            [
                'defect_id' => '515',
                'measure_unit' => 'Н*м',
            ],
            // 516. Ход вала
            [
                'defect_id' => '516',
                'name' => 'Да',
            ],
            [
                'defect_id' => '516',
                'name' => 'Нет',
            ],
            // 517. Вылет вала (верхнее положение)
            [
                'defect_id' => '517',
                'measure_unit' => 'мм',
            ],
            // 518. Норматив
            [
                'defect_id' => '518',
                'measure_unit' => 'мм',
            ],
            // 519. Вылет вала (нижнее положение)
            [
                'defect_id' => '519',
                'measure_unit' => 'мм',
            ],
            // 520. Норматив
            [
                'defect_id' => '520',
                'measure_unit' => 'мм',
            ],
            // 521. Суммарная наработка вала
            [
                'defect_id' => '521',
                'measure_unit' => 'сут',
            ],
            // 522. Суммарная наработка статора
            [
                'defect_id' => '522',
                'measure_unit' => 'сут',
            ],
            // 523. Испытание на герметичность
            [
                'defect_id' => '523',
                'name' => 'Герметично',
            ],
            [
                'defect_id' => '523',
                'name' => 'Не герметично',
            ],
            // 536. Rизоляции (в сборе)
            [
                'defect_id' => '536',
                'measure_unit' => 'МОм',
            ],
            // 537. Rизоляции ТМСП
            [
                'defect_id' => '537',
                'measure_unit' => 'МОм',
            ],
            // 538. Rизоляции ПЭД
            [
                'defect_id' => '538',
                'measure_unit' => 'МОм',
            ],
            // 539. Rизоляции статора
            [
                'defect_id' => '539',
                'measure_unit' => 'МОм',
            ],
            // 540. Наличие «звезды»
            [
                'defect_id' => '540',
                'name' => 'Да',
            ],
            [
                'defect_id' => '540',
                'name' => 'Нет',
            ],
            // 541. Ry
            [
                'defect_id' => '541',
                'measure_unit' => 'МОм',
            ],

            // --- 32. Ротор в сборе


        ];

        foreach ($data as $item) {
            DefectValue::create($item);
        }

    }

}

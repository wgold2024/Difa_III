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
            // Общая информация
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
            // Вал
            [
                'id' => '21',
                'detail_id' => '2',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '22',
                'detail_id' => '2',
                'name' => 'Износ односторонний',
                'description' => 'Износ односторонний - это односторонний износ',
                'reason' => 'Износ односторонний возникает вследствии неправильного угла установки',
                'type' => 'boolean'
            ],
            [
                'id' => '23',
                'detail_id' => '2',
                'name' => 'Износ радиальный',
                'description' => 'Износ радиальный - это радиальный износ',
                'reason' => 'Износ радиальный возникает вследствии неправильного радиуса установки',
                'type' => 'boolean'
            ],
            [
                'id' => '24',
                'detail_id' => '2',
                'name' => 'Износ посадочного места под шпонку',
                'description' => 'Износ посадочного места под шпонку - это уменьшение посадочного места под шпонкой',
                'reason' => 'Износ посадочного места под шпонку - это уменьшение посадочного места под шпонкой',
                'type' => 'boolean'
            ],
            [
                'id' => '25',
                'detail_id' => '2',
                'name' => 'Срыв шпонки',
                'description' => 'Срыв шпонки - срыв шпонки',
                'type' => 'boolean'
            ],
            [
                'id' => '26',
                'detail_id' => '2',
                'name' => 'Скручивание верхней шлицевой части вала',
                'reason' => 'Причина скручивание верхней шлицевой части вала может быть увеличение вращательного момента',
                'type' => 'boolean'
            ],
            [
                'id' => '27',
                'detail_id' => '2',
                'name' => 'Скручивание нижней шлицевой части вала',
                'type' => 'boolean'
            ],
            [
                'id' => '28',
                'detail_id' => '2',
                'group_id' => 5,
                'name' => 'Слом вала',
                'type' => 'boolean'
            ],
            [
                'id' => '29',
                'detail_id' => '2',
                'group_id' => 5,
                'name' => 'Расположение',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '30',
                'detail_id' => '2',
                'group_id' => 5,
                'name' => 'Расстояние',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '31',
                'detail_id' => '2',
                'name' => 'Твердый налет',
                'type' => 'boolean'
            ],
            [
                'id' => '32',
                'detail_id' => '2',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            // Корпус
            [
                'id' => '33',
                'detail_id' => '3',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '34',
                'detail_id' => '3',
                'name' => 'Вздутие ЛКП',
                'type' => 'boolean'
            ],
            [
                'id' => '35',
                'detail_id' => '3',
                'group_id' => 6,
                'name' => 'Коррозия корпуса',
                'type' => 'boolean'
            ],
            [
                'id' => '36',
                'detail_id' => '3',
                'group_id' => 6,
                'name' => 'Область поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '37',
                'detail_id' => '3',
                'group_id' => 6,
                'name' => 'Глубина поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '38',
                'detail_id' => '3',
                'group_id' => 7,
                'name' => 'Коррозия резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '39',
                'detail_id' => '3',
                'group_id' => 7,
                'name' => 'Область поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '40',
                'detail_id' => '3',
                'group_id' => 7,
                'name' => 'Глубина поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '41',
                'detail_id' => '3',
                'group_id' => 8,
                'name' => 'Мех. повреждение корпуса',
                'type' => 'boolean'
            ],
            [
                'id' => '42',
                'detail_id' => '3',
                'group_id' => 8,
                'name' => 'Расположение',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '43',
                'detail_id' => '3',
                'group_id' => 8,
                'name' => 'Расстояние',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '44',
                'detail_id' => '3',
                'group_id' => 9,
                'name' => 'Мех. повреждение резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '45',
                'detail_id' => '3',
                'group_id' => 9,
                'name' => 'Расположение',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '46',
                'detail_id' => '3',
                'group_id' => 10,
                'name' => 'Промыв корпуса',
                'type' => 'boolean'
            ],
            [
                'id' => '47',
                'detail_id' => '3',
                'group_id' => 10,
                'name' => 'Глубина поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '48',
                'detail_id' => '3',
                'group_id' => 10,
                'name' => 'Расположение',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '49',
                'detail_id' => '3',
                'group_id' => 10,
                'name' => 'Расстояние',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '50',
                'detail_id' => '3',
                'group_id' => 11,
                'name' => 'Промыв резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '51',
                'detail_id' => '3',
                'group_id' => 11,
                'name' => 'Расположение',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '52',
                'detail_id' => '3',
                'group_id' => 11,
                'name' => 'Глубина поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '53',
                'detail_id' => '3',
                'name' => 'Твердый налет',
                'type' => 'boolean'
            ],
            [
                'id' => '54',
                'detail_id' => '3',
                'name' => 'Электрохимический след от кабеля',
                'type' => 'boolean'
            ],
            [
                'id' => '55',
                'detail_id' => '3',
                'name' => 'Изгиб корпуса',
                'type' => 'boolean'
            ],
            // Рабочие колеса
            [
                'id' => '56',
                'detail_id' => '4',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '57',
                'detail_id' => '4',
                'group_id' => 12,
                'name' => 'Износ верхнего диска',
                'type' => 'boolean'
            ],
            [
                'id' => '58',
                'detail_id' => '4',
                'group_id' => 12,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '59',
                'detail_id' => '4',
                'group_id' => 12,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '60',
                'detail_id' => '4',
                'group_id' => 13,
                'name' => 'Износ нижнего диска',
                'type' => 'boolean'
            ],
            [
                'id' => '61',
                'detail_id' => '4',
                'group_id' => 13,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '62',
                'detail_id' => '4',
                'group_id' => 13,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '63',
                'detail_id' => '4',
                'group_id' => 14,
                'name' => 'Износ внутреннего диаметра ступицы',
                'type' => 'boolean'
            ],
            [
                'id' => '64',
                'detail_id' => '4',
                'group_id' => 14,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '65',
                'detail_id' => '4',
                'group_id' => 14,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],

        ];








        foreach ($data as $item) {
            Defect::create($item);
        }
    }
}

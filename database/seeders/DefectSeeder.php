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
                'name' => 'Наименование',
                'type' => 'string',
            ],
            [
                'id' => '2',
                'detail_id' => '1',
                'name' => 'Серийный номер',
                'type' => 'string',
            ],
            [
                'id' => '3',
                'detail_id' => '1',
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
            ],
            [
                'id' => '12',
                'detail_id' => '1',
                'name' => 'Номер муфты ',
                'type' => 'string',
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
                'name' => 'Вылет вала (верхнее положение)',
                'type' => 'number',
            ],
            [
                'id' => '17',
                'detail_id' => '1',
                'group_id' => 3,
                'name' => 'Норматив (верхнее положение)',
                'type' => 'number',
            ],
            [
                'id' => '18',
                'detail_id' => '1',
                'group_id' => 4,
                'name' => 'Вылет вала (нижнее положение)',
                'type' => 'number',
            ],
            [
                'id' => '19',
                'detail_id' => '1',
                'group_id' => 4,
                'name' => 'Норматив (нижнее положение)',
                'type' => 'number',
            ],
            [
                'id' => '20',
                'detail_id' => '1',
                'name' => 'Суммарная наработка вала',
                'type' => 'number',
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
            [
                'id' => '66',
                'detail_id' => '4',
                'group_id' => 15,
                'name' => 'Износ наружного диаметра ступицы',
                'type' => 'boolean'
            ],
            [
                'id' => '67',
                'detail_id' => '4',
                'group_id' => 15,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '68',
                'detail_id' => '4',
                'group_id' => 15,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '69',
                'detail_id' => '4',
                'group_id' => 16,
                'name' => 'Износ диспергирующих лопаток',
                'type' => 'boolean'
            ],
            [
                'id' => '70',
                'detail_id' => '4',
                'group_id' => 16,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '71',
                'detail_id' => '4',
                'group_id' => 16,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '72',
                'detail_id' => '4',
                'group_id' => 17,
                'name' => 'Износ юбки',
                'type' => 'boolean'
            ],
            [
                'id' => '73',
                'detail_id' => '4',
                'group_id' => 17,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '74',
                'detail_id' => '4',
                'group_id' => 17,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '75',
                'detail_id' => '4',
                'name' => 'Износ шпоночного паза',
                'type' => 'boolean'
            ],
            [
                'id' => '76',
                'detail_id' => '4',
                'group_id' => 18,
                'name' => 'Износ посадочного места под опорные шайбы (верхние)',
                'type' => 'boolean'
            ],
            [
                'id' => '77',
                'detail_id' => '4',
                'group_id' => 18,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '78',
                'detail_id' => '4',
                'group_id' => 19,
                'name' => 'Износ посадочного места под опорные шайбы (средние)',
                'type' => 'boolean'
            ],
            [
                'id' => '79',
                'detail_id' => '4',
                'group_id' => 19,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '80',
                'detail_id' => '4',
                'group_id' => 20,
                'name' => 'Износ посадочного места под опорные шайбы (нижние)',
                'type' => 'boolean'
            ],
            [
                'id' => '81',
                'detail_id' => '4',
                'group_id' => 20,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '82',
                'detail_id' => '4',
                'name' => 'Разрушение',
                'type' => 'boolean'
            ],
            [
                'id' => '83',
                'detail_id' => '4',
                'group_id' => 21,
                'name' => 'Износ текстолитовых шайб (верхние)',
                'type' => 'boolean'
            ],
            [
                'id' => '84',
                'detail_id' => '4',
                'group_id' => 21,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '85',
                'detail_id' => '4',
                'group_id' => 22,
                'name' => 'Износ текстолитовых шайб (средние)',
                'type' => 'boolean'
            ],
            [
                'id' => '86',
                'detail_id' => '4',
                'group_id' => 22,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '87',
                'detail_id' => '4',
                'group_id' => 23,
                'name' => 'Износ текстолитовых шайб (нижние)',
                'type' => 'boolean'
            ],
            [
                'id' => '88',
                'detail_id' => '4',
                'group_id' => 23,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '89',
                'detail_id' => '4',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            [
                'id' => '90',
                'detail_id' => '4',
                'name' => 'Твердый налет',
                'type' => 'boolean'
            ],
            [
                'id' => '91',
                'detail_id' => '4',
                'name' => 'Цвета побежалости',
                'type' => 'boolean'
            ],
            [
                'id' => '92',
                'detail_id' => '4',
                'group_id' => 24,
                'name' => 'Засорение',
                'type' => 'boolean'
            ],
            [
                'id' => '93',
                'detail_id' => '4',
                'group_id' => 24,
//                'name' => 'Степень перекрытия проточных каналов',
                'name' => 'Перекрытие проточных каналов',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '94',
                'detail_id' => '4',
                'group_id' => 24,
                'name' => 'Тип засорения',
                'type' => 'select',
                'is_option' => true
            ],
            // Направляющие аппараты
            [
                'id' => '95',
                'detail_id' => '5',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '96',
                'detail_id' => '5',
                'group_id' => 25,
                'name' => 'Износ верхнего диска',
                'type' => 'boolean'
            ],
            [
                'id' => '97',
                'detail_id' => '5',
                'group_id' => 25,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '98',
                'detail_id' => '5',
                'group_id' => 25,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '99',
                'detail_id' => '5',
                'group_id' => 26,
                'name' => 'Износ нижнего диска',
                'type' => 'boolean'
            ],
            [
                'id' => '100',
                'detail_id' => '5',
                'group_id' => 26,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '101',
                'detail_id' => '5',
                'group_id' => 26,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '102',
                'detail_id' => '5',
                'group_id' => 27,
                'name' => 'Износ лопаток',
                'type' => 'boolean'
            ],
            [
                'id' => '103',
                'detail_id' => '5',
                'group_id' => 27,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '104',
                'detail_id' => '5',
                'group_id' => 27,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '105',
                'detail_id' => '5',
                'group_id' => 28,
                'name' => 'Износ ступиц',
                'type' => 'boolean'
            ],
            [
                'id' => '106',
                'detail_id' => '5',
                'group_id' => 28,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '107',
                'detail_id' => '5',
                'group_id' => 28,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '108',
                'detail_id' => '5',
                'group_id' => 29,
                'name' => 'Износ опорного бурта',
                'type' => 'boolean'
            ],
            [
                'id' => '109',
                'detail_id' => '5',
                'group_id' => 29,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '110',
                'detail_id' => '5',
                'group_id' => 29,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '111',
                'detail_id' => '5',
                'group_id' => 30,
                'name' => 'Износ втулки внутреннего диаметра',
                'type' => 'boolean'
            ],
            [
                'id' => '112',
                'detail_id' => '5',
                'group_id' => 30,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '113',
                'detail_id' => '5',
                'group_id' => 30,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '114',
                'detail_id' => '5',
                'group_id' => 31,
                'name' => 'Износ стакана',
                'type' => 'boolean'
            ],
            [
                'id' => '115',
                'detail_id' => '5',
                'group_id' => 31,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '116',
                'detail_id' => '5',
                'group_id' => 31,
                'name' => 'Степень износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '117',
                'detail_id' => '5',
                'group_id' => 32,
                'name' => 'Засорение',
                'type' => 'boolean'
            ],
            [
                'id' => '118',
                'detail_id' => '5',
                'group_id' => 32,
//                'name' => 'Степень перекрытия проточных каналов',
                'name' => 'Перекрытие проточных каналов',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '119',
                'detail_id' => '5',
                'group_id' => 32,
                'name' => 'Тип засорения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '120',
                'detail_id' => '5',
                'name' => 'Проворот',
                'type' => 'select',
            ],
            [
                'id' => '121',
                'detail_id' => '5',
                'name' => 'Разрушение',
                'type' => 'select',
            ],
            [
                'id' => '122',
                'detail_id' => '5',
                'name' => 'Коррозия',
                'type' => 'select',
            ],
            [
                'id' => '123',
                'detail_id' => '5',
                'name' => 'Твердый налет',
                'type' => 'select',
            ],
            [
                'id' => '124',
                'detail_id' => '5',
                'name' => 'Цвета побежалости',
                'type' => 'select',
            ],
            // Втулка защитная вала
            [
                'id' => '125',
                'detail_id' => '6',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '126',
                'detail_id' => '6',
                'group_id' => 33,
                'name' => 'Износ',
                'type' => 'boolean'
            ],
            [
                'id' => '127',
                'detail_id' => '6',
                'group_id' => 33,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '128',
                'detail_id' => '6',
                'group_id' => 33,
                'name' => 'Тип износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '129',
                'detail_id' => '6',
                'name' => 'Коррозия',
                'type' => 'boolean',
            ],
            [
                'id' => '130',
                'detail_id' => '6',
                'name' => 'Мех. повреждение',
                'type' => 'boolean',
            ],
            // Муфта шлицевая
            [
                'id' => '131',
                'detail_id' => '7',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '132',
                'detail_id' => '7',
                'name' => 'Отсутствует',
                'type' => 'boolean'
            ],
            [
                'id' => '133',
                'detail_id' => '7',
                'group_id' => 34,
                'name' => 'Износ',
                'type' => 'boolean'
            ],
            [
                'id' => '134',
                'detail_id' => '7',
                'group_id' => 34,
                'name' => 'Место износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '135',
                'detail_id' => '7',
                'name' => 'Разрушение',
                'type' => 'boolean'
            ],
            [
                'id' => '136',
                'detail_id' => '7',
                'name' => 'Отсутствие перегородки',
                'type' => 'boolean'
            ],
            [
                'id' => '137',
                'detail_id' => '7',
                'name' => 'Налет',
                'type' => 'boolean'
            ],
            [
                'id' => '138',
                'detail_id' => '7',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            // Концевые детали: голова
            [
                'id' => '139',
                'detail_id' => '8',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '140',
                'detail_id' => '8',
                'name' => 'Срыв витков резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '141',
                'detail_id' => '8',
                'name' => 'Промыв витков резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '142',
                'detail_id' => '8',
                'name' => 'Механическое повреждение',
                'type' => 'boolean'
            ],
            [
                'id' => '143',
                'detail_id' => '8',
                'name' => 'Налет',
                'type' => 'boolean'
            ],
            [
                'id' => '144',
                'detail_id' => '8',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            [
                'id' => '145',
                'detail_id' => '8',
                'name' => 'Износ посадочного места под подшипник',
                'type' => 'boolean'
            ],
            // Концевые детали: основание
            [
                'id' => '146',
                'detail_id' => '9',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '147',
                'detail_id' => '9',
                'name' => 'Срыв витков резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '148',
                'detail_id' => '9',
                'name' => 'Промыв витков резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '149',
                'detail_id' => '9',
                'name' => 'Механическое повреждение',
                'type' => 'boolean'
            ],
            [
                'id' => '150',
                'detail_id' => '9',
                'name' => 'Налет',
                'type' => 'boolean'
            ],
            [
                'id' => '151',
                'detail_id' => '9',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            [
                'id' => '152',
                'detail_id' => '9',
                'name' => 'Износ посадочного места под подшипник',
                'type' => 'boolean'
            ],
            // Концевые детали: верхний подшипник
            [
                'id' => '153',
                'detail_id' => '10',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '154',
                'detail_id' => '10',
                'name' => 'Износ внутреннего диаметра',
                'type' => 'boolean'
            ],
            [
                'id' => '155',
                'detail_id' => '10',
                'name' => 'Износ наружного диаметра',
                'type' => 'boolean'
            ],
            [
                'id' => '156',
                'detail_id' => '10',
                'name' => 'Трещины стенок',
                'type' => 'boolean'
            ],
            [
                'id' => '157',
                'detail_id' => '10',
                'name' => 'Скол/механическое повреждение',
                'type' => 'boolean'
            ],
            [
                'id' => '158',
                'detail_id' => '10',
                'name' => 'Разрушение',
                'type' => 'boolean'
            ],
            [
                'id' => '159',
                'detail_id' => '10',
                'name' => 'Твердый налет',
                'type' => 'boolean'
            ],
            [
                'id' => '160',
                'detail_id' => '10',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            [
                'id' => '161',
                'detail_id' => '10',
                'name' => 'Заклинивание',
                'type' => 'boolean'
            ],
            // Концевые детали: верхний подшипник
            [
                'id' => '162',
                'detail_id' => '11',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '163',
                'detail_id' => '11',
                'name' => 'Износ внутреннего диаметра',
                'type' => 'boolean'
            ],
            [
                'id' => '164',
                'detail_id' => '11',
                'name' => 'Износ наружного диаметра',
                'type' => 'boolean'
            ],
            [
                'id' => '165',
                'detail_id' => '11',
                'name' => 'Трещины стенок',
                'type' => 'boolean'
            ],
            [
                'id' => '166',
                'detail_id' => '11',
                'name' => 'Скол/механическое повреждение',
                'type' => 'boolean'
            ],
            [
                'id' => '167',
                'detail_id' => '11',
                'name' => 'Разрушение',
                'type' => 'boolean'
            ],
            [
                'id' => '168',
                'detail_id' => '11',
                'name' => 'Твердый налет',
                'type' => 'boolean'
            ],
            [
                'id' => '169',
                'detail_id' => '11',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            [
                'id' => '170',
                'detail_id' => '11',
                'name' => 'Заклинивание',
                'type' => 'boolean'
            ],
            // Осевые опоры
            [
                'id' => '171',
                'detail_id' => '12',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '172',
                'detail_id' => '12',
                'name' => 'Износ внутреннего диаметра',
                'type' => 'boolean'
            ],
            [
                'id' => '173',
                'detail_id' => '12',
                'name' => 'Износ наружного диаметра',
                'type' => 'boolean'
            ],
            [
                'id' => '174',
                'detail_id' => '12',
                'name' => 'Трещины стенок',
                'type' => 'boolean'
            ],
            [
                'id' => '175',
                'detail_id' => '12',
                'name' => 'Скол/механическое повреждение',
                'type' => 'boolean'
            ],
            [
                'id' => '176',
                'detail_id' => '12',
                'name' => 'Разрушение',
                'type' => 'boolean'
            ],
            [
                'id' => '177',
                'detail_id' => '12',
                'name' => 'Твердый налет',
                'type' => 'boolean'
            ],
            [
                'id' => '178',
                'detail_id' => '12',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            [
                'id' => '179',
                'detail_id' => '12',
                'name' => 'Заклинивание',
                'type' => 'boolean'
            ],
            // Промежуточные подшипники
            [
                'id' => '180',
                'detail_id' => '13',
                'name' => 'В норме',
                'type' => 'boolean'
            ],
            [
                'id' => '181',
                'detail_id' => '13',
                'name' => 'Износ внутреннего диаметра',
                'type' => 'boolean'
            ],
            [
                'id' => '182',
                'detail_id' => '13',
                'name' => 'Износ наружного диаметра',
                'type' => 'boolean'
            ],
            [
                'id' => '183',
                'detail_id' => '13',
                'name' => 'Трещины стенок',
                'type' => 'boolean'
            ],
            [
                'id' => '184',
                'detail_id' => '13',
                'name' => 'Скол/механическое повреждение',
                'type' => 'boolean'
            ],
            [
                'id' => '185',
                'detail_id' => '13',
                'name' => 'Разрушение',
                'type' => 'boolean'
            ],
            [
                'id' => '186',
                'detail_id' => '13',
                'name' => 'Твердый налет',
                'type' => 'boolean'
            ],
            [
                'id' => '187',
                'detail_id' => '13',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            [
                'id' => '188',
                'detail_id' => '13',
                'name' => 'Заклинивание',
                'type' => 'boolean'
            ],
        ];








        foreach ($data as $item) {
            Defect::create($item);
        }
    }
}

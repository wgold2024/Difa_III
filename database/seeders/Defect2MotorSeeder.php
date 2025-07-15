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
            // 51. Общая информация
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
            [
                'id' => '542',
                'detail_id' => '51',
                'name' => 'Диэлектрическая прочность масла',
                'type' => 'number',
            ],

            // 52. Ротор в сборе
            [
                'id' => '543',
                'detail_id' => '52',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '544',
                'detail_id' => '52',
                'group_id' => 53,
                'name' => 'Заклинивание пакета на валу при демонтаже',
                'type' => 'boolean',
            ],
            [
                'id' => '545',
                'detail_id' => '52',
                'group_id' => 53,
                'name' => 'Указать номер пакета',
                'type' => 'string',
                'is_option' => true,
                'is_required' => true,
                'hint' => 'Расчет осуществлять сверху',
            ],
            [
                'id' => '546',
                'detail_id' => '52',
                'name' => 'Истирание стеклотекстолитовых шайб до стальных. Истирание стальных шайб до пакета',
                'type' => 'boolean',
            ],
            [
                'id' => '547',
                'detail_id' => '52',
                'group_id' => 54,
                'name' => 'Заклинивание подшипника',
                'type' => 'boolean',
            ],
            [
                'id' => '548',
                'detail_id' => '52',
                'group_id' => 54,
                'name' => 'Указать номер подшипника',
                'type' => 'string',
                'is_option' => true,
                'is_required' => true,
                'hint' => 'Расчет осуществлять сверху',
            ],

            // 53. Вал
            [
                'id' => '549',
                'detail_id' => '53',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '550',
                'detail_id' => '53',
                'name' => 'Износ односторонний',
                'type' => 'boolean',
            ],
            [
                'id' => '551',
                'detail_id' => '53',
                'name' => 'Износ радиальный',
                'type' => 'boolean',
            ],
            [
                'id' => '552',
                'detail_id' => '53',
                'name' => 'Износ посадочного места под шпонку',
                'type' => 'boolean',
            ],
            [
                'id' => '553',
                'detail_id' => '53',
                'name' => 'Срыв шпонки/износ шпоночного паза',
                'type' => 'boolean',
            ],
            [
                'id' => '554',
                'detail_id' => '53',
                'name' => 'Скручивание верхней шлицевой части вала',
                'type' => 'boolean',
            ],
            [
                'id' => '555',
                'detail_id' => '53',
                'name' => 'Скручивание нижней шлицевой части вала',
                'type' => 'boolean',
            ],
            [
                'id' => '556',
                'detail_id' => '53',
                'group_id' => 55,
                'name' => 'Износ шлицев',
                'type' => 'boolean'
            ],
            [
                'id' => '557',
                'detail_id' => '53',
                'group_id' => 55,
                'name' => 'Вид износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '558',
                'detail_id' => '53',
                'group_id' => 56,
                'name' => 'Слом вала',
                'type' => 'boolean'
            ],
            [
                'id' => '559',
                'detail_id' => '53',
                'group_id' => 56,
                'name' => 'Расположение',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '560',
                'detail_id' => '53',
                'group_id' => 56,
                'name' => 'Расстояние',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '561',
                'detail_id' => '53',
                'name' => 'Твердый налет',
                'type' => 'boolean',
            ],
            [
                'id' => '562',
                'detail_id' => '53',
                'name' => 'Коррозия',
                'type' => 'boolean',
            ],
            [
                'id' => '563',
                'detail_id' => '53',
                'name' => 'Проворот',
                'type' => 'boolean',
            ],
            // 54. Корпус
            [
                'id' => '564',
                'detail_id' => '54',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '565',
                'detail_id' => '54',
                'name' => 'Вздутие ЛКП',
                'type' => 'boolean'
            ],
            [
                'id' => '566',
                'detail_id' => '54',
                'group_id' => 57,
                'name' => 'Коррозия корпуса',
                'type' => 'boolean'
            ],
            [
                'id' => '567',
                'detail_id' => '54',
                'group_id' => 57,
                'name' => 'Область поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '568',
                'detail_id' => '54',
                'group_id' => 57,
                'name' => 'Глубина поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '569',
                'detail_id' => '54',
                'group_id' => 58,
                'name' => 'Коррозия резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '570',
                'detail_id' => '54',
                'group_id' => 58,
                'name' => 'Область поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '571',
                'detail_id' => '54',
                'group_id' => 58,
                'name' => 'Глубина поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '572',
                'detail_id' => '54',
                'group_id' => 59,
                'name' => 'Мех. повреждение корпуса',
                'type' => 'boolean'
            ],
            [
                'id' => '573',
                'detail_id' => '54',
                'group_id' => 59,
                'name' => 'Расположение',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '574',
                'detail_id' => '54',
                'group_id' => 59,
                'name' => 'Расстояние',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '575',
                'detail_id' => '54',
                'group_id' => 60,
                'name' => 'Мех. повреждение резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '576',
                'detail_id' => '54',
                'group_id' => 60,
                'name' => 'Расположение',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '577',
                'detail_id' => '54',
                'group_id' => 61,
                'name' => 'Промыв корпуса',
                'type' => 'boolean'
            ],
            [
                'id' => '578',
                'detail_id' => '54',
                'group_id' => 61,
                'name' => 'Глубина поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '579',
                'detail_id' => '54',
                'group_id' => 61,
                'name' => 'Расположение',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '580',
                'detail_id' => '54',
                'group_id' => 61,
                'name' => 'Расстояние',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '581',
                'detail_id' => '54',
                'group_id' => 62,
                'name' => 'Промыв резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '582',
                'detail_id' => '54',
                'group_id' => 62,
                'name' => 'Расположение',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '583',
                'detail_id' => '54',
                'group_id' => 62,
                'name' => 'Глубина поражения',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '584',
                'detail_id' => '54',
                'name' => 'Твердый налет',
                'type' => 'boolean'
            ],
            [
                'id' => '585',
                'detail_id' => '54',
                'name' => 'Электрохимический след от кабеля',
                'type' => 'boolean'
            ],
            [
                'id' => '586',
                'detail_id' => '54',
                'name' => 'Изгиб корпуса',
                'type' => 'boolean'
            ],
            [
                'id' => '587',
                'detail_id' => '54',
                'name' => 'Пробой изоляции корпуса',
                'type' => 'boolean'
            ],
            // 55. Масло
            [
                'id' => '588',
                'detail_id' => '55',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '589',
                'detail_id' => '55',
                'name' => 'Потемневшее',
                'type' => 'boolean'
            ],
            [
                'id' => '590',
                'detail_id' => '55',
                'name' => 'Темное',
                'type' => 'boolean'
            ],
            [
                'id' => '591',
                'detail_id' => '55',
                'name' => 'Недостаточное количество масла для испытаний',
                'type' => 'boolean'
            ],
            [
                'id' => '592',
                'detail_id' => '55',
                'name' => 'С пластовой жидкостью',
                'type' => 'boolean'
            ],
            [
                'id' => '593',
                'detail_id' => '55',
                'name' => 'С металлической стружкой',
                'type' => 'boolean'
            ],
            [
                'id' => '594',
                'detail_id' => '55',
                'name' => 'С мех. примесями',
                'type' => 'boolean'
            ],
            [
                'id' => '595',
                'detail_id' => '55',
                'name' => 'С запахом гари',
                'type' => 'boolean'
            ],
            [
                'id' => '596',
                'detail_id' => '55',
                'name' => 'С запахом газоконденсата',
                'type' => 'boolean'
            ],
            // 56. Узел пяты
            [
                'id' => '597',
                'detail_id' => '55',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '598',
                'detail_id' => '56',
                'name' => 'Износ',
                'type' => 'boolean'
            ],
            [
                'id' => '599',
                'detail_id' => '56',
                'name' => 'Вздутие покрытия',
                'type' => 'boolean'
            ],
            [
                'id' => '600',
                'detail_id' => '56',
                'name' => 'Кольцевые риски',
                'type' => 'boolean'
            ],
            [
                'id' => '601',
                'detail_id' => '56',
                'name' => 'В лаке',
                'type' => 'boolean'
            ],
            [
                'id' => '602',
                'detail_id' => '56',
                'name' => 'Разрушение',
                'type' => 'boolean'
            ],
            // 57. Узел токоввода
            [
                'id' => '603',
                'detail_id' => '57',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '604',
                'detail_id' => '57',
                'name' => 'Выводные провода в норме',
                'type' => 'boolean'
            ],
            [
                'id' => '605',
                'detail_id' => '57',
                'name' => 'РТИ в норме',
                'type' => 'boolean'
            ],
            [
                'id' => '606',
                'detail_id' => '57',
                'group_id' => 63,
                'name' => 'Электропробой с наружной стороны',
                'type' => 'boolean'
            ],
            [
                'id' => '607',
                'detail_id' => '57',
                'group_id' => 63,
                'name' => 'Фаза А',
                'type' => 'boolean',
                'is_option' => true
            ],
            [
                'id' => '608',
                'detail_id' => '57',
                'group_id' => 63,
                'name' => 'Фаза B',
                'type' => 'boolean',
                'is_option' => true
            ],
            [
                'id' => '609',
                'detail_id' => '57',
                'group_id' => 63,
                'name' => 'Фаза C',
                'type' => 'boolean',
                'is_option' => true
            ],
            [
                'id' => '610',
                'detail_id' => '57',
                'group_id' => 64,
                'name' => 'Электропробой с внутренней стороны',
                'type' => 'boolean'
            ],
            [
                'id' => '611',
                'detail_id' => '57',
                'group_id' => 64,
                'name' => 'Фаза А',
                'type' => 'boolean',
                'is_option' => true
            ],
            [
                'id' => '612',
                'detail_id' => '57',
                'group_id' => 64,
                'name' => 'Фаза B',
                'type' => 'boolean',
                'is_option' => true
            ],
            [
                'id' => '613',
                'detail_id' => '57',
                'group_id' => 64,
                'name' => 'Фаза C',
                'type' => 'boolean',
                'is_option' => true
            ],
            [
                'id' => '614',
                'detail_id' => '57',
                'name' => 'Разрушение',
                'type' => 'boolean'
            ],
            [
                'id' => '615',
                'detail_id' => '57',
                'name' => 'Трещины',
                'type' => 'boolean'
            ],
            [
                'id' => '616',
                'detail_id' => '57',
                'name' => 'Выводные провода оплавлены',
                'type' => 'boolean'
            ],
            [
                'id' => '617',
                'detail_id' => '57',
                'name' => 'Выводные провода повреждены',
                'type' => 'boolean'
            ],
            [
                'id' => '618',
                'detail_id' => '57',
                'group_id' => 65,
                'name' => 'Выводные провода электропробой',
                'type' => 'boolean'
            ],
            [
                'id' => '619',
                'detail_id' => '57',
                'group_id' => 65,
                'name' => 'Фаза А',
                'type' => 'boolean',
                'is_option' => true
            ],
            [
                'id' => '620',
                'detail_id' => '57',
                'group_id' => 65,
                'name' => 'Фаза B',
                'type' => 'boolean',
                'is_option' => true
            ],
            [
                'id' => '621',
                'detail_id' => '57',
                'group_id' => 65,
                'name' => 'Фаза C',
                'type' => 'boolean',
                'is_option' => true
            ],
            [
                'id' => '622',
                'detail_id' => '57',
                'name' => 'Выводные провода жесткие вследствие перегрева',
                'type' => 'boolean'
            ],
            [
                'id' => '623',
                'detail_id' => '57',
                'name' => 'Выводные провода оплавление наконечников',
                'type' => 'boolean'
            ],
            [
                'id' => '624',
                'detail_id' => '57',
                'name' => 'РТИ потеря эластичности',
                'type' => 'boolean'
            ],
            [
                'id' => '625',
                'detail_id' => '57',
                'name' => 'РТИ повреждены',
                'type' => 'boolean'
            ],
            [
                'id' => '626',
                'detail_id' => '57',
                'name' => 'Обрыв нулевого провода',
                'type' => 'boolean'
            ],
            // 58. Статор
            [
                'id' => '627',
                'detail_id' => '58',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '628',
                'detail_id' => '58',
                'name' => 'Электропробой',
                'type' => 'boolean'
            ],
            [
                'id' => '629',
                'detail_id' => '58',
                'name' => 'Износ статорного железа',
                'type' => 'boolean'
            ],
            [
                'id' => '630',
                'detail_id' => '58',
                'name' => 'Проворот',
                'type' => 'boolean'
            ],
            [
                'id' => '631',
                'detail_id' => '58',
                'name' => 'Выплавление компаунда',
                'type' => 'boolean'
            ],
            [
                'id' => '632',
                'detail_id' => '58',
                'name' => 'Потемнение',
                'type' => 'boolean'
            ],
            [
                'id' => '633',
                'detail_id' => '58',
                'name' => 'Повреждение нулевого провода вследствии электропробоя',
                'type' => 'boolean'
            ],
            [
                'id' => '634',
                'detail_id' => '58',
                'name' => 'Повреждение выводных проводов вследствии электропробоя',
                'type' => 'boolean'
            ],
            [
                'id' => '635',
                'detail_id' => '58',
                'name' => 'Механические повреждения фланцев (сколы, трещины)',
                'type' => 'boolean'
            ],
            // 59. Пакеты ротора (вентильный)
            [
                'id' => '636',
                'detail_id' => '59',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '637',
                'detail_id' => '59',
                'name' => 'Расслоение',
                'type' => 'boolean'
            ],
            [
                'id' => '638',
                'detail_id' => '59',
                'name' => 'Оплавление',
                'type' => 'boolean'
            ],
            [
                'id' => '639',
                'detail_id' => '59',
                'name' => 'Разрушение',
                'type' => 'boolean'
            ],
            [
                'id' => '640',
                'detail_id' => '59',
                'name' => 'Цвета побежалости',
                'type' => 'boolean'
            ],
            [
                'id' => '641',
                'detail_id' => '59',
                'name' => 'Темные',
                'type' => 'boolean'
            ],
            [
                'id' => '642',
                'detail_id' => '59',
                'name' => 'В лаке',
                'type' => 'boolean'
            ],
            [
                'id' => '643',
                'detail_id' => '59',
                'name' => 'Износ (мех. повреждение внешней поверхности)',
                'type' => 'boolean'
            ],
            [
                'id' => '644',
                'detail_id' => '59',
                'name' => 'Посторонние примеси',
                'type' => 'boolean'
            ],
            [
                'id' => '645',
                'detail_id' => '59',
                'name' => 'Разрушение магнитов/локальное вспучивание гильзы',
                'type' => 'boolean'
            ],
            [
                'id' => '646',
                'detail_id' => '59',
                'group_id' => 66,
                'name' => 'Заклинивание пакетов на валу',
                'type' => 'boolean'
            ],
            [
                'id' => '647',
                'detail_id' => '59',
                'group_id' => 66,
                'name' => 'Номер пакета',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '648',
                'detail_id' => '59',
                'name' => 'Несоответствие значения теплового зазора КД',
                'type' => 'boolean'
            ],
            [
                'id' => '649',
                'detail_id' => '59',
                'name' => 'Истирание стеклотекстолитывах шайб до стальных',
                'type' => 'boolean'
            ],
            [
                'id' => '650',
                'detail_id' => '59',
                'group_id' => 67,
                'name' => 'Заклинивание подшипника',
                'type' => 'boolean'
            ],
            [
                'id' => '651',
                'detail_id' => '59',
                'group_id' => 67,
                'name' => 'Номер',
                'type' => 'number',
                'is_option' => true
            ],
            // 60. Пакеты ротора (асинхронный)
            [
                'id' => '652',
                'detail_id' => '60',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '653',
                'detail_id' => '60',
                'name' => 'Расслоение/смещение листов',
                'type' => 'boolean'
            ],
            [
                'id' => '654',
                'detail_id' => '60',
                'name' => 'Оплавление',
                'type' => 'boolean'
            ],
            [
                'id' => '655',
                'detail_id' => '60',
                'name' => 'Разрушение',
                'type' => 'boolean'
            ],
            [
                'id' => '656',
                'detail_id' => '60',
                'name' => 'Цвета побежалости',
                'type' => 'boolean'
            ],
            [
                'id' => '657',
                'detail_id' => '60',
                'name' => 'Темные',
                'type' => 'boolean'
            ],
            [
                'id' => '658',
                'detail_id' => '60',
                'name' => 'В лаке',
                'type' => 'boolean'
            ],
            [
                'id' => '659',
                'detail_id' => '60',
                'name' => 'Износ',
                'type' => 'boolean'
            ],
            [
                'id' => '660',
                'detail_id' => '60',
                'name' => 'Посторонние примеси',
                'type' => 'boolean'
            ],
            [
                'id' => '661',
                'detail_id' => '60',
                'name' => 'Торцевой износ (в месте установки подшипника)',
                'type' => 'boolean'
            ],
            // 61. Втулка подшипника
            [
                'id' => '662',
                'detail_id' => '61',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '663',
                'detail_id' => '61',
                'group_id' => 68,
                'name' => 'Износ',
                'type' => 'boolean'
            ],
            [
                'id' => '664',
                'detail_id' => '61',
                'group_id' => 68,
                'name' => 'Характер износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '665',
                'detail_id' => '61',
                'group_id' => 68,
                'name' => 'Тип износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '666',
                'detail_id' => '61',
                'name' => 'Трещина по шпоночному пазу',
                'type' => 'boolean'
            ],
            [
                'id' => '667',
                'detail_id' => '61',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            [
                'id' => '668',
                'detail_id' => '61',
                'name' => 'Мех. повреждение',
                'type' => 'boolean'
            ],
            [
                'id' => '669',
                'detail_id' => '61',
                'name' => 'Засорение отверстий',
                'type' => 'boolean'
            ],
            // 62. Муфта шлицевая
            [
                'id' => '670',
                'detail_id' => '62',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '671',
                'detail_id' => '62',
                'name' => 'Отсутствует',
                'type' => 'boolean'
            ],
            [
                'id' => '672',
                'detail_id' => '62',
                'group_id' => 69,
                'name' => 'Износ',
                'type' => 'boolean'
            ],
            [
                'id' => '673',
                'detail_id' => '62',
                'group_id' => 69,
                'name' => 'Место износа',
                'type' => 'select',
                'is_option' => true
            ],
            [
                'id' => '674',
                'detail_id' => '62',
                'name' => 'Разрушение',
                'type' => 'boolean'
            ],
            [
                'id' => '675',
                'detail_id' => '62',
                'name' => 'Отсутствие перегородки',
                'type' => 'boolean'
            ],
            [
                'id' => '676',
                'detail_id' => '62',
                'name' => 'Налет',
                'type' => 'boolean'
            ],
            [
                'id' => '677',
                'detail_id' => '62',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            // 63. Голова
            [
                'id' => '678',
                'detail_id' => '63',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '679',
                'detail_id' => '63',
                'name' => 'Срыв витков резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '680',
                'detail_id' => '63',
                'name' => 'Промыв витков резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '681',
                'detail_id' => '63',
                'name' => 'Промыв по соединению',
                'type' => 'boolean'
            ],
            [
                'id' => '682',
                'detail_id' => '63',
                'name' => 'Механическое повреждение',
                'type' => 'boolean'
            ],
            [
                'id' => '683',
                'detail_id' => '63',
                'name' => 'Налет',
                'type' => 'boolean'
            ],
            [
                'id' => '684',
                'detail_id' => '63',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            [
                'id' => '685',
                'detail_id' => '63',
                'name' => 'Износ рабочей поверхности подшипника (задиры, кольцевые риски)',
                'type' => 'boolean'
            ],
            [
                'id' => '686',
                'detail_id' => '63',
                'name' => 'Отворот',
                'type' => 'boolean'
            ],
            [
                'id' => '687',
                'detail_id' => '63',
                'name' => 'Повреждение посадочных мест под РТИ',
                'type' => 'boolean'
            ],
            // 64. Основание
            [
                'id' => '688',
                'detail_id' => '64',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '689',
                'detail_id' => '64',
                'name' => 'Срыв витков резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '690',
                'detail_id' => '64',
                'name' => 'Промыв витков резьбы',
                'type' => 'boolean'
            ],
            [
                'id' => '691',
                'detail_id' => '64',
                'name' => 'Промыв по соединению',
                'type' => 'boolean'
            ],
            [
                'id' => '692',
                'detail_id' => '64',
                'name' => 'Механическое повреждение',
                'type' => 'boolean'
            ],
            [
                'id' => '693',
                'detail_id' => '64',
                'name' => 'Налет',
                'type' => 'boolean'
            ],
            [
                'id' => '694',
                'detail_id' => '64',
                'name' => 'Коррозия',
                'type' => 'boolean'
            ],
            [
                'id' => '695',
                'detail_id' => '64',
                'name' => 'Износ рабочей поверхности подшипника (задиры, кольцевые риски)',
                'type' => 'boolean'
            ],
            [
                'id' => '696',
                'detail_id' => '64',
                'name' => 'Отворот',
                'type' => 'boolean'
            ],
            [
                'id' => '697',
                'detail_id' => '64',
                'name' => 'Повреждение посадочных мест под РТИ',
                'type' => 'boolean'
            ],
            // 65. Фильтр
            [
                'id' => '698',
                'detail_id' => '65',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '699',
                'detail_id' => '65',
                'group_id' => 70,
                'name' => 'Засорен',
                'type' => 'boolean'
            ],
            [
                'id' => '700',
                'detail_id' => '65',
                'group_id' => 70,
                'name' => 'Вид засорения',
                'type' => 'select',
                'is_option' => true
            ],
            // 66. Клапан
            [
                'id' => '701',
                'detail_id' => '66',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '702',
                'detail_id' => '66',
                'group_id' => 71,
                'name' => 'Недокручен',
                'type' => 'boolean'
            ],
            [
                'id' => '703',
                'detail_id' => '66',
                'group_id' => 71,
                'name' => 'Момент затяжки',
                'type' => 'number',
                'is_option' => true
            ],
            [
                'id' => '704',
                'detail_id' => '66',
                'name' => 'Коррозия под пробкой',
                'type' => 'boolean'
            ],
            [
                'id' => '705',
                'detail_id' => '66',
                'name' => 'Отсутствие уплотняющей шайбы',
                'type' => 'boolean'
            ],
            [
                'id' => '706',
                'detail_id' => '66',
                'name' => 'Несколько уплотняющих шайб',
                'type' => 'boolean'
            ],
            [
                'id' => '707',
                'detail_id' => '66',
                'name' => 'Не герметичен',
                'type' => 'boolean'
            ],
            // 67. Подшипники (ротора)
            [
                'id' => '708',
                'detail_id' => '67',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '709',
                'detail_id' => '67',
                'name' => 'Недокручен',
                'type' => 'boolean'
            ],
            [
                'id' => '710',
                'detail_id' => '67',
                'name' => 'Срыв стопора',
                'type' => 'boolean'
            ],
            [
                'id' => '711',
                'detail_id' => '67',
                'name' => 'Заклинивание',
                'type' => 'boolean'
            ],
            [
                'id' => '712',
                'detail_id' => '67',
                'name' => 'Засорение отверстий маслотока',
                'type' => 'boolean'
            ],
            [
                'id' => '713',
                'detail_id' => '67',
                'name' => 'Износ торцевых поверхностей',
                'type' => 'boolean'
            ],
            [
                'id' => '714',
                'detail_id' => '67',
                'name' => 'Наличие следов перегрева',
                'type' => 'boolean'
            ],
            [
                'id' => '715',
                'detail_id' => '67',
                'name' => 'Сдвиг/проворот запрессованной втулки (относительно корпуса)',
                'type' => 'boolean'
            ],
            // 68. Узел секционирования
            [
                'id' => '716',
                'detail_id' => '68',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '717',
                'detail_id' => '68',
                'name' => 'Повреждение наконечников',
                'type' => 'boolean'
            ],
            [
                'id' => '718',
                'detail_id' => '68',
                'name' => 'Повреждение гильз',
                'type' => 'boolean'
            ],
            [
                'id' => '719',
                'detail_id' => '68',
                'name' => 'Повреждение колодки/изолятора',
                'type' => 'boolean'
            ],
            [
                'id' => '720',
                'detail_id' => '68',
                'name' => 'Пробой колодки/изолятора',
                'type' => 'boolean'
            ],
            [
                'id' => '721',
                'detail_id' => '68',
                'name' => 'Оплавление колодки',
                'type' => 'boolean'
            ],
            [
                'id' => '722',
                'detail_id' => '68',
                'name' => 'Деформация посадочных канавок под РТИ',
                'type' => 'boolean'
            ],
            [
                'id' => '723',
                'detail_id' => '68',
                'name' => 'Засорение клапана',
                'type' => 'boolean'
            ],
            // 69. Стыковочный узел с ТМС/ТМС
            [
                'id' => '724',
                'detail_id' => '69',
                'name' => 'В норме',
                'description' => 'Соответсвует КД, отсутствие следов износа и деформации',
                'type' => 'boolean'
            ],
            [
                'id' => '725',
                'detail_id' => '69',
                'name' => 'Повреждение наконечников',
                'type' => 'boolean'
            ],
            [
                'id' => '726',
                'detail_id' => '69',
                'name' => 'Повреждение гильз',
                'type' => 'boolean'
            ],
            [
                'id' => '727',
                'detail_id' => '69',
                'name' => 'Повреждение колодки/изолятора',
                'type' => 'boolean'
            ],
            [
                'id' => '728',
                'detail_id' => '69',
                'name' => 'Пробой колодки/изолятора',
                'type' => 'boolean'
            ],
            [
                'id' => '729',
                'detail_id' => '69',
                'name' => 'Оплавление колодки',
                'type' => 'boolean'
            ],
            [
                'id' => '730',
                'detail_id' => '69',
                'name' => 'Деформация посадочных канавок под РТИ',
                'type' => 'boolean'
            ],


        ];








        foreach ($data as $item) {
            Defect::create($item);
        }
    }
}

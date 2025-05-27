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
            // --- Общая информация
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
            // --- Вал
            // Расположение
            [
                'defect_id' => '29',
                'name' => 'От головной части',
            ],
            [
                'defect_id' => '29',
                'name' => 'От основания',
            ],
            // Расстояние
            [
                'defect_id' => '30',
                'measure_unit' => 'мм',
            ],
            // --- Корпус
            // Область поражения
            [
                'defect_id' => '36',
                'name' => 'Обширная',
            ],
            [
                'defect_id' => '36',
                'name' => 'Точечная',
            ],
            // Глубина поражения
            [
                'defect_id' => '37',
                'name' => 'Менее 2мм',
            ],
            [
                'defect_id' => '37',
                'name' => 'Более 2мм',
            ],
            [
                'defect_id' => '37',
                'name' => 'Сквозная',
            ],
            // Область поражения
            [
                'defect_id' => '39',
                'name' => 'Обширная',
            ],
            [
                'defect_id' => '39',
                'name' => 'Точечная',
            ],
            // Глубина поражения
            [
                'defect_id' => '40',
                'name' => 'Менее 2мм',
            ],
            [
                'defect_id' => '40',
                'name' => 'Более 2мм',
            ],
            [
                'defect_id' => '40',
                'name' => 'Сквозная',
            ],
            // 41. Мех. повреждение корпуса.Расположение
            [
                'defect_id' => '42',
                'name' => 'От головной части',
            ],
            [
                'defect_id' => '42',
                'name' => 'От основания',
            ],
            // 41. Мех. повреждение корпуса.Расстояние
            [
                'defect_id' => '43',
                'measure_unit' => 'мм',
            ],
            // 44. Мех. повреждение резьбы.Расположение
            [
                'defect_id' => '45',
                'name' => 'Головная часть',
            ],
            [
                'defect_id' => '45',
                'name' => 'Основание',
            ],
            // 46. Промыв корпуса.Глубина поражения
            [
                'defect_id' => '47',
                'name' => 'Сквозная',
            ],
            [
                'defect_id' => '47',
                'name' => 'Несквозная',
            ],
            // 46. Промыв корпуса.Расположение
            [
                'defect_id' => '48',
                'name' => 'От головной части',
            ],
            [
                'defect_id' => '48',
                'name' => 'От основания',
            ],
            // 46. Промыв корпуса.Расстояние
            [
                'defect_id' => '49',
                'measure_unit' => 'мм',
            ],
            // 50. Промыв резьбы.Глубина поражения
            [
                'defect_id' => '51',
                'name' => 'Головная часть',
            ],
            [
                'defect_id' => '51',
                'name' => 'Основание',
            ],
            // 50. Промыв резьбы.Расположение
            [
                'defect_id' => '52',
                'name' => 'Сквозная',
            ],
            [
                'defect_id' => '52',
                'name' => 'Несквозная',
            ],
            // 57. Износ верхнего диска.Характер износа
            [
                'defect_id' => '58',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '58',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '58',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '58',
                'name' => 'Промыв',
            ],
            // 57. Износ верхнего диска.Степень износа
            [
                'defect_id' => '59',
                'name' => '0-10%',
                'visibility_defect_id' => '58',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '59',
                'name' => '10-30%',
                'visibility_defect_id' => '58',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '59',
                'name' => '30-50%',
                'visibility_defect_id' => '58',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '59',
                'name' => '50-70%',
                'visibility_defect_id' => '58',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '59',
                'name' => '70%-90%',
                'visibility_defect_id' => '58',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '59',
                'name' => '100%',
                'visibility_defect_id' => '58',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '59',
                'name' => 'Сквозной',
                'visibility_defect_id' => '58',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '59',
                'name' => 'Несквозной',
                'visibility_defect_id' => '58',
                'visibility_defect_value' => 'Промыв'
            ],
            // 60. Износ верхнего диска.Характер износа
            [
                'defect_id' => '61',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '61',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '61',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '61',
                'name' => 'Промыв',
            ],
            // 60. Износ верхнего диска.Степень износа
            [
                'defect_id' => '62',
                'name' => '0-10%',
                'visibility_defect_id' => '61',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '62',
                'name' => '10-30%',
                'visibility_defect_id' => '61',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '62',
                'name' => '30-50%',
                'visibility_defect_id' => '61',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '62',
                'name' => '50-70%',
                'visibility_defect_id' => '61',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '62',
                'name' => '70%-90%',
                'visibility_defect_id' => '61',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '62',
                'name' => '100%',
                'visibility_defect_id' => '61',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '62',
                'name' => 'Сквозной',
                'visibility_defect_id' => '61',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '62',
                'name' => 'Несквозной',
                'visibility_defect_id' => '61',
                'visibility_defect_value' => 'Промыв'
            ],
            // 63. Износ внутреннего диаметра ступицы.Характер износа
            [
                'defect_id' => '64',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '64',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '64',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '64',
                'name' => 'Промыв',
            ],
            // 63. Износ внутреннего диаметра ступицы.Степень износа
            [
                'defect_id' => '65',
                'name' => '0-10%',
                'visibility_defect_id' => '64',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '65',
                'name' => '10-30%',
                'visibility_defect_id' => '64',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '65',
                'name' => '30-50%',
                'visibility_defect_id' => '64',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '65',
                'name' => '50-70%',
                'visibility_defect_id' => '64',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '65',
                'name' => '70%-90%',
                'visibility_defect_id' => '64',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '65',
                'name' => '100%',
                'visibility_defect_id' => '64',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '65',
                'name' => 'Сквозной',
                'visibility_defect_id' => '64',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '65',
                'name' => 'Несквозной',
                'visibility_defect_id' => '64',
                'visibility_defect_value' => 'Промыв'
            ],

        ];

        foreach ($data as $item) {
            DefectValue::create($item);
        }

    }

}

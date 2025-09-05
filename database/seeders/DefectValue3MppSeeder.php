<?php

namespace Database\Seeders;

use App\Models\DefectValue;
use App\Models\Detail;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefectValue3MppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // --- 101. Общая информация
            // 1004. Тип секции
            [
                'defect_id' => '1004',
                'name' => 'Верхняя',
            ],
            [
                'defect_id' => '1004',
                'name' => 'Средняя',
            ],
            [
                'defect_id' => '1004',
                'name' => 'Нижняя',
            ],
            // 1005. Тип ремонта
            [
                'defect_id' => '1005',
                'name' => 'Новый',
            ],
            [
                'defect_id' => '1005',
                'name' => 'Ремонтный',
            ],
            // 1006. Длина секции
            [
                'defect_id' => '1006',
                'name' => '0.7',
            ],
            [
                'defect_id' => '1006',
                'name' => '0.9',
            ],
            [
                'defect_id' => '1006',
                'name' => '1',
            ],
            [
                'defect_id' => '1006',
                'name' => '1.2',
            ],
            [
                'defect_id' => '1006',
                'name' => '1.4',
            ],
            [
                'defect_id' => '1006',
                'name' => '1.5',
            ],
            [
                'defect_id' => '1006',
                'name' => '1.6',
            ],
            [
                'defect_id' => '1006',
                'name' => '1.7',
            ],
            [
                'defect_id' => '1006',
                'name' => '2',
            ],
            [
                'defect_id' => '1006',
                'name' => '2.5',
            ],
            [
                'defect_id' => '1006',
                'name' => '3',
            ],
            [
                'defect_id' => '1006',
                'name' => '3.5',
            ],
            [
                'defect_id' => '1006',
                'name' => '4',
            ],
            [
                'defect_id' => '1006',
                'name' => '4.5',
            ],
            [
                'defect_id' => '1006',
                'name' => '5',
            ],
            [
                'defect_id' => '1006',
                'name' => '5.5',
            ],
            [
                'defect_id' => '1006',
                'name' => '6',
            ],
            // 1007. Группа прочности вала
            [
                'defect_id' => '1007',
                'name' => 'Т8',
            ],
            [
                'defect_id' => '1007',
                'name' => 'Т9',
            ],
            [
                'defect_id' => '1007',
                'name' => 'Т11',
            ],
            [
                'defect_id' => '1007',
                'name' => 'Т11У',
            ],
            [
                'defect_id' => '1007',
                'name' => 'Т12',
            ],
            [
                'defect_id' => '1007',
                'name' => 'Т13',
            ],
            [
                'defect_id' => '1007',
                'name' => 'Т14',
            ],
            [
                'defect_id' => '1007',
                'name' => 'Т16',
            ],
            // 1008. Диаметр вала
            [
                'defect_id' => '1008',
                'name' => '10',
            ],
            [
                'defect_id' => '1008',
                'name' => '12.8',
            ],
            [
                'defect_id' => '1008',
                'name' => '14',
            ],
            [
                'defect_id' => '1008',
                'name' => '17',
            ],
            [
                'defect_id' => '1008',
                'name' => '20',
            ],
            [
                'defect_id' => '1008',
                'name' => '22',
            ],
            [
                'defect_id' => '1008',
                'name' => '25',
            ],
            [
                'defect_id' => '1008',
                'name' => '30',
            ],
            [
                'defect_id' => '1008',
                'name' => '35',
            ],
            [
                'defect_id' => '1008',
                'name' => '38',
            ],
            [
                'defect_id' => '1008',
                'name' => '42',
            ],
            [
                'defect_id' => '1008',
                'name' => '52',
            ],
            // 1011. Вращение вала
            [
                'defect_id' => '1011',
                'name' => 'Свободное',
            ],
            [
                'defect_id' => '1011',
                'name' => 'Тугое',
            ],
            [
                'defect_id' => '1011',
                'name' => 'Отсутствует',
            ],
            // 1012. Момент вращения
            [
                'defect_id' => '1012',
                'measure_unit' => 'Н*м',
            ],
            // 1013. Ход вала
            [
                'defect_id' => '1013',
                'name' => 'Да',
            ],
            [
                'defect_id' => '1013',
                'name' => 'Нет',
            ],
            // 1014. Вылет вала (верхнее положение)
            [
                'defect_id' => '1014',
                'measure_unit' => 'мм',
            ],
            // 1015. Норматив
            [
                'defect_id' => '1015',
                'measure_unit' => 'мм',
            ],
            // 1016. Вылет вала (нижнее положение)
            [
                'defect_id' => '1016',
                'measure_unit' => 'мм',
            ],
            // 1017. Норматив
            [
                'defect_id' => '1017',
                'measure_unit' => 'мм',
            ],
            // 1018. Суммарная наработка вала
            [
                'defect_id' => '1018',
                'measure_unit' => 'сут',
            ],
            // --- 102.Вал
            // 1027. Расположение
            [
                'defect_id' => '1027',
                'name' => 'От головной части',
            ],
            [
                'defect_id' => '1027',
                'name' => 'От основания',
            ],
            // 1028. Расстояние
            [
                'defect_id' => '1028',
                'measure_unit' => 'мм',
            ],
            // --- 103. Корпус
            // 1034. Область поражения
            [
                'defect_id' => '1034',
                'name' => 'Обширная',
            ],
            [
                'defect_id' => '1034',
                'name' => 'Точечная',
            ],
            // 1035. Глубина поражения
            [
                'defect_id' => '1035',
                'name' => 'Менее 2мм',
            ],
            [
                'defect_id' => '1035',
                'name' => 'Более 2мм',
            ],
            [
                'defect_id' => '1035',
                'name' => 'Сквозная',
            ],
            // 1037. Область поражения
            [
                'defect_id' => '1037',
                'name' => 'Обширная',
            ],
            [
                'defect_id' => '1037',
                'name' => 'Точечная',
            ],
            // 1038. Глубина поражения
            [
                'defect_id' => '1038',
                'name' => 'Менее 2мм',
            ],
            [
                'defect_id' => '1038',
                'name' => 'Более 2мм',
            ],
            [
                'defect_id' => '1038',
                'name' => 'Сквозная',
            ],
            // 1040. Мех. повреждение корпуса.Расположение
            [
                'defect_id' => '1040',
                'name' => 'От головной части',
            ],
            [
                'defect_id' => '1040',
                'name' => 'От основания',
            ],
            // 1041. Мех. повреждение корпуса.Расстояние
            [
                'defect_id' => '1041',
                'measure_unit' => 'мм',
            ],
            // 1043. Мех. повреждение резьбы.Расположение
            [
                'defect_id' => '1043',
                'name' => 'Головная часть',
            ],
            [
                'defect_id' => '1043',
                'name' => 'Основание',
            ],
            // 1045. Промыв корпуса.Глубина поражения
            [
                'defect_id' => '1045',
                'name' => 'Сквозная',
            ],
            [
                'defect_id' => '1045',
                'name' => 'Несквозная',
            ],
            // 1046. Промыв корпуса.Расположение
            [
                'defect_id' => '1046',
                'name' => 'От головной части',
            ],
            [
                'defect_id' => '1046',
                'name' => 'От основания',
            ],
            // 1047. Промыв корпуса.Расстояние
            [
                'defect_id' => '1047',
                'measure_unit' => 'мм',
            ],
            // 1049. Промыв резьбы.Расположение
            [
                'defect_id' => '1049',
                'name' => 'Сквозная',
            ],
            [
                'defect_id' => '1049',
                'name' => 'Несквозная',
            ],
            // 1050. Промыв резьбы.Глубина поражения
            [
                'defect_id' => '1050',
                'name' => 'Головная часть',
            ],
            [
                'defect_id' => '1050',
                'name' => 'Основание',
            ],
            // 104.Рабочие колеса
            // 1056. Износ лопасти.Характер износа
            [
                'defect_id' => '1056',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1056',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1056',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1056',
                'name' => 'Промыв',
            ],
            // 1057. Износ лопасти.Степень износа
            [
                'defect_id' => '1057',
                'name' => '0-10%',
                'visibility_defect_id' => '1056',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1057',
                'name' => '10-30%',
                'visibility_defect_id' => '1056',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1057',
                'name' => '30-50%',
                'visibility_defect_id' => '1056',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1057',
                'name' => '50-70%',
                'visibility_defect_id' => '1056',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1057',
                'name' => '70%-90%',
                'visibility_defect_id' => '1056',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1057',
                'name' => '100%',
                'visibility_defect_id' => '1056',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1057',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1056',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1057',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1056',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1059. Износ отверстий на лопасти.Характер износа
            [
                'defect_id' => '1059',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1059',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1059',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1059',
                'name' => 'Промыв',
            ],
            // 1060. Износ отверстий на лопасти.Степень износа
            [
                'defect_id' => '1060',
                'name' => '0-10%',
                'visibility_defect_id' => '1059',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1060',
                'name' => '10-30%',
                'visibility_defect_id' => '1059',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1060',
                'name' => '30-50%',
                'visibility_defect_id' => '1059',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1060',
                'name' => '50-70%',
                'visibility_defect_id' => '1059',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1060',
                'name' => '70%-90%',
                'visibility_defect_id' => '1059',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1060',
                'name' => '100%',
                'visibility_defect_id' => '1059',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1060',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1059',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1060',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1059',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1062. Износ внутреннего диаметра ступицы.Характер износа
            [
                'defect_id' => '1062',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1062',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1062',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1062',
                'name' => 'Промыв',
            ],
            // 1063. Износ внутреннего диаметра ступицы.Степень износа
            [
                'defect_id' => '1063',
                'name' => '0-10%',
                'visibility_defect_id' => '1062',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1063',
                'name' => '10-30%',
                'visibility_defect_id' => '1062',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1063',
                'name' => '30-50%',
                'visibility_defect_id' => '1062',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1063',
                'name' => '50-70%',
                'visibility_defect_id' => '1062',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1063',
                'name' => '70%-90%',
                'visibility_defect_id' => '1062',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1063',
                'name' => '100%',
                'visibility_defect_id' => '1062',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1063',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1062',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1063',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1062',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1065. Износ наружного диаметра ступицы.Характер износа
            [
                'defect_id' => '1065',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1065',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1065',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1065',
                'name' => 'Промыв',
            ],
            // 1066. Износ наружного диаметра ступицы.Степень износа
            [
                'defect_id' => '1066',
                'name' => '0-10%',
                'visibility_defect_id' => '1065',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1066',
                'name' => '10-30%',
                'visibility_defect_id' => '1065',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1066',
                'name' => '30-50%',
                'visibility_defect_id' => '1065',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1066',
                'name' => '50-70%',
                'visibility_defect_id' => '1065',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1066',
                'name' => '70%-90%',
                'visibility_defect_id' => '1065',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1066',
                'name' => '100%',
                'visibility_defect_id' => '1065',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1066',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1065',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1066',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1065',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1069. Износ посадочного места под опорные шайбы (верхние).Степень износа
            [
                'defect_id' => '1069',
                'name' => '0-10%',
            ],
            [
                'defect_id' => '1069',
                'name' => '10-30%',
            ],
            [
                'defect_id' => '1069',
                'name' => '30-50%',
            ],
            [
                'defect_id' => '1069',
                'name' => '50-70%',
            ],
            [
                'defect_id' => '1069',
                'name' => '70%-90%',
            ],
            [
                'defect_id' => '1069',
                'name' => '100%',
            ],
            // 1071. Износ посадочного места под опорные шайбы (нижние).Степень износа
            [
                'defect_id' => '1071',
                'name' => '0-10%',
            ],
            [
                'defect_id' => '1071',
                'name' => '10-30%',
            ],
            [
                'defect_id' => '1071',
                'name' => '30-50%',
            ],
            [
                'defect_id' => '1071',
                'name' => '50-70%',
            ],
            [
                'defect_id' => '1071',
                'name' => '70%-90%',
            ],
            [
                'defect_id' => '1071',
                'name' => '100%',
            ],
            // 1074. Износ текстолитовых шайб (верхние).Степень износа
            [
                'defect_id' => '1074',
                'name' => '0-10%',
            ],
            [
                'defect_id' => '1074',
                'name' => '10-30%',
            ],
            [
                'defect_id' => '1074',
                'name' => '30-50%',
            ],
            [
                'defect_id' => '1074',
                'name' => '50-70%',
            ],
            [
                'defect_id' => '1074',
                'name' => '70%-90%',
            ],
            [
                'defect_id' => '1074',
                'name' => '100%',
            ],
            // 1076. Износ текстолитовых шайб (нижние).Степень износа
            [
                'defect_id' => '1076',
                'name' => '0-10%',
            ],
            [
                'defect_id' => '1076',
                'name' => '10-30%',
            ],
            [
                'defect_id' => '1076',
                'name' => '30-50%',
            ],
            [
                'defect_id' => '1076',
                'name' => '50-70%',
            ],
            [
                'defect_id' => '1076',
                'name' => '70%-90%',
            ],
            [
                'defect_id' => '1076',
                'name' => '100%',
            ],
            // 1081. Засорение.Степень перекрытия проточных каналов
            [
                'defect_id' => '1081',
                'name' => 'Частичное',
            ],
            [
                'defect_id' => '1081',
                'name' => 'Около 50%',
            ],
            [
                'defect_id' => '1081',
                'name' => 'Полное',
            ],
            // 1082. Засорение.Тип засорения
            [
                'defect_id' => '1082',
                'name' => 'Механические примеси',
            ],
            [
                'defect_id' => '1082',
                'name' => 'Твердые отложения',
            ],
            [
                'defect_id' => '1082',
                'name' => 'Посторонние включения',
            ],
            [
                'defect_id' => '1082',
                'name' => 'АСПО',
            ],
            [
                'defect_id' => '1082',
                'name' => 'Проппант',
            ],
            // 105.Направляющие аппараты
            // 1085. ИИзнос лопаток.Характер износа
            [
                'defect_id' => '1085',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1085',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1085',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1085',
                'name' => 'Промыв',
            ],
            // 1086. Износ лопаток.Степень износа
            [
                'defect_id' => '1086',
                'name' => '0-10%',
                'visibility_defect_id' => '1085',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1086',
                'name' => '10-30%',
                'visibility_defect_id' => '1085',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1086',
                'name' => '30-50%',
                'visibility_defect_id' => '1085',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1086',
                'name' => '50-70%',
                'visibility_defect_id' => '1085',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1086',
                'name' => '70%-90%',
                'visibility_defect_id' => '1085',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1086',
                'name' => '100%',
                'visibility_defect_id' => '1085',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1086',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1085',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1086',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1085',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1088. Износ ступиц.Характер износа
            [
                'defect_id' => '1088',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1088',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1088',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1088',
                'name' => 'Промыв',
            ],
            // 1089. Износ ступиц.Степень износа
            [
                'defect_id' => '1089',
                'name' => '0-10%',
                'visibility_defect_id' => '1088',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1089',
                'name' => '10-30%',
                'visibility_defect_id' => '1088',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1089',
                'name' => '30-50%',
                'visibility_defect_id' => '1088',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1089',
                'name' => '50-70%',
                'visibility_defect_id' => '1088',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1089',
                'name' => '70%-90%',
                'visibility_defect_id' => '1088',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1089',
                'name' => '100%',
                'visibility_defect_id' => '1088',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1089',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1088',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1089',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1088',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1091. Износ втулки внутреннего диаметра.Характер износа
            [
                'defect_id' => '1091',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1091',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1091',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1091',
                'name' => 'Промыв',
            ],
            // 111. Износ втулки внутреннего диаметра.Степень износа
            [
                'defect_id' => '1092',
                'name' => '0-10%',
                'visibility_defect_id' => '1091',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1092',
                'name' => '10-30%',
                'visibility_defect_id' => '1091',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1092',
                'name' => '30-50%',
                'visibility_defect_id' => '1091',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1092',
                'name' => '50-70%',
                'visibility_defect_id' => '1091',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1092',
                'name' => '70%-90%',
                'visibility_defect_id' => '1091',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1092',
                'name' => '100%',
                'visibility_defect_id' => '1091',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1092',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1091',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1092',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1091',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1094. Износ стакана.Характер износа
            [
                'defect_id' => '1094',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1094',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1094',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1094',
                'name' => 'Промыв',
            ],
            // 1095. Износ стакана.Степень износа
            [
                'defect_id' => '1095',
                'name' => '0-10%',
                'visibility_defect_id' => '1094',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1095',
                'name' => '10-30%',
                'visibility_defect_id' => '1094',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1095',
                'name' => '30-50%',
                'visibility_defect_id' => '1094',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1095',
                'name' => '50-70%',
                'visibility_defect_id' => '1094',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1095',
                'name' => '70%-90%',
                'visibility_defect_id' => '1094',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1095',
                'name' => '100%',
                'visibility_defect_id' => '1094',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1095',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1094',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1095',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1094',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1097. Засорение.Степень перекрытия проточных каналов
            [
                'defect_id' => '1097',
                'name' => 'Частичное',
            ],
            [
                'defect_id' => '1097',
                'name' => 'Около 50%',
            ],
            [
                'defect_id' => '1097',
                'name' => 'Полное',
            ],
            // 1098. Засорение.Тип засорения
            [
                'defect_id' => '1098',
                'name' => 'Механические примеси',
            ],
            [
                'defect_id' => '1098',
                'name' => 'Твердые отложения',
            ],
            [
                'defect_id' => '1098',
                'name' => 'Посторонние включения',
            ],
            [
                'defect_id' => '1098',
                'name' => 'АСПО',
            ],
            [
                'defect_id' => '1098',
                'name' => 'Проппант',
            ],
            // 106.Проставок
            // 1107. Износ.Характер износа
            [
                'defect_id' => '1107',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1107',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1107',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1107',
                'name' => 'Промыв',
            ],
            // 1108. Износ.Степень износа
            [
                'defect_id' => '1108',
                'name' => '0-10%',
                'visibility_defect_id' => '1107',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1108',
                'name' => '10-30%',
                'visibility_defect_id' => '1107',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1108',
                'name' => '30-50%',
                'visibility_defect_id' => '1107',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1108',
                'name' => '50-70%',
                'visibility_defect_id' => '1107',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1108',
                'name' => '70%-90%',
                'visibility_defect_id' => '1107',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1108',
                'name' => '100%',
                'visibility_defect_id' => '1107',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1108',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1107',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1108',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1107',
                'visibility_defect_value' => 'Промыв'
            ],

            // 1116. Износ.Характер износа
            [
                'defect_id' => '1116',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1116',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1116',
                'name' => 'Трещина',
            ],
            // 1117. Износ.Тип износа
            [
                'defect_id' => '1117',
                'name' => 'Односторонний',
                'visibility_defect_id' => '1116',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1117',
                'name' => 'Радиальный',
                'visibility_defect_id' => '1116',
                'visibility_defect_value' => 'Износ'
            ],
            // 1118. Износ.Степень износа
            [
                'defect_id' => '1118',
                'name' => '0-10%',
                'visibility_defect_id' => '1116',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1118',
                'name' => '10-30%',
                'visibility_defect_id' => '1116',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1118',
                'name' => '30-50%',
                'visibility_defect_id' => '1116',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1118',
                'name' => '50-70%',
                'visibility_defect_id' => '1116',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1118',
                'name' => '70%-90%',
                'visibility_defect_id' => '1116',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1118',
                'name' => '100%',
                'visibility_defect_id' => '1116',
                'visibility_defect_value' => 'Износ'
            ],
            // 1124. Износ.Место износа
            [
                'defect_id' => '1124',
                'name' => 'По наружной поверхности',
            ],
            [
                'defect_id' => '1124',
                'name' => 'По внутренней поверхности',
            ],
        ];

        foreach ($data as $item) {
            DefectValue::create($item);
        }

    }

}

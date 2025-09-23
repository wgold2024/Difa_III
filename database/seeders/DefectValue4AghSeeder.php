<?php

namespace Database\Seeders;

use App\Models\DefectValue;
use App\Models\Detail;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefectValue4AghSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // --- 151. Общая информация
            // 1504. Тип ремонта
            [
                'defect_id' => '1504',
                'name' => 'Новый',
            ],
            [
                'defect_id' => '1504',
                'name' => 'Ремонтный',
            ],
            // 1505. Группа прочности вала
            [
                'defect_id' => '1505',
                'name' => 'Т8',
            ],
            [
                'defect_id' => '1505',
                'name' => 'Т9',
            ],
            [
                'defect_id' => '1505',
                'name' => 'Т11',
            ],
            [
                'defect_id' => '1505',
                'name' => 'Т11У',
            ],
            [
                'defect_id' => '1505',
                'name' => 'Т12',
            ],
            [
                'defect_id' => '1505',
                'name' => 'Т13',
            ],
            [
                'defect_id' => '1505',
                'name' => 'Т14',
            ],
            [
                'defect_id' => '1505',
                'name' => 'Т16',
            ],
            // 1506. Диаметр вала
            [
                'defect_id' => '1506',
                'name' => '10',
            ],
            [
                'defect_id' => '1506',
                'name' => '12.8',
            ],
            [
                'defect_id' => '1506',
                'name' => '14',
            ],
            [
                'defect_id' => '1506',
                'name' => '17',
            ],
            [
                'defect_id' => '1506',
                'name' => '20',
            ],
            [
                'defect_id' => '1506',
                'name' => '22',
            ],
            [
                'defect_id' => '1506',
                'name' => '25',
            ],
            [
                'defect_id' => '1506',
                'name' => '30',
            ],
            [
                'defect_id' => '1506',
                'name' => '35',
            ],
            [
                'defect_id' => '1506',
                'name' => '38',
            ],
            [
                'defect_id' => '1506',
                'name' => '42',
            ],
            [
                'defect_id' => '1506',
                'name' => '52',
            ],
            // 1509. Вращение вала
            [
                'defect_id' => '1509',
                'name' => 'Свободное',
            ],
            [
                'defect_id' => '1509',
                'name' => 'Тугое',
            ],
            [
                'defect_id' => '1509',
                'name' => 'Отсутствует',
            ],
            // 1510. Момент вращения
            [
                'defect_id' => '1510',
                'measure_unit' => 'Н*м',
            ],
            // 1511. Ход вала
            [
                'defect_id' => '1511',
                'name' => 'Да',
            ],
            [
                'defect_id' => '1511',
                'name' => 'Нет',
            ],
            // 1512. Вылет вала (верхнее положение)
            [
                'defect_id' => '1512',
                'measure_unit' => 'мм',
            ],
            // 1513. Норматив
            [
                'defect_id' => '1513',
                'measure_unit' => 'мм',
            ],
            // 1514. Вылет вала (нижнее положение)
            [
                'defect_id' => '1514',
                'measure_unit' => 'мм',
            ],
            // 1515. Норматив
            [
                'defect_id' => '1515',
                'measure_unit' => 'мм',
            ],
            // 1516. Суммарная наработка вала
            [
                'defect_id' => '1516',
                'measure_unit' => 'сут',
            ],
            // --- 152.Вал
            // 1523. Расположение
            [
                'defect_id' => '1523',
                'name' => 'Сверху',
            ],
            [
                'defect_id' => '1523',
                'name' => 'Снизу',
            ],
            // 1525. Расположение
            [
                'defect_id' => '1525',
                'name' => 'От головной части',
            ],
            [
                'defect_id' => '1525',
                'name' => 'От основания',
            ],
            // 1526. Расстояние
            [
                'defect_id' => '1526',
                'measure_unit' => 'мм',
            ],
            // 1530. Вид дефекта
            [
                'defect_id' => '1530',
                'name' => 'Погнуло (излом)',
            ],
            [
                'defect_id' => '1530',
                'name' => 'Сломано',
            ],
            [
                'defect_id' => '1530',
                'name' => 'Отсутствует',
            ],
            // --- 153. Корпус
            // 1534. Область поражения
            [
                'defect_id' => '1534',
                'name' => 'Обширная',
            ],
            [
                'defect_id' => '1534',
                'name' => 'Точечная',
            ],
            // 1535. Глубина поражения
            [
                'defect_id' => '1535',
                'name' => 'Менее 2мм',
            ],
            [
                'defect_id' => '1535',
                'name' => 'Более 2мм',
            ],
            [
                'defect_id' => '1535',
                'name' => 'Сквозная',
            ],
            // 1537. Область поражения
            [
                'defect_id' => '1537',
                'name' => 'Обширная',
            ],
            [
                'defect_id' => '1537',
                'name' => 'Точечная',
            ],
            // 1538. Глубина поражения
            [
                'defect_id' => '1538',
                'name' => 'Менее 2мм',
            ],
            [
                'defect_id' => '1538',
                'name' => 'Более 2мм',
            ],
            [
                'defect_id' => '1538',
                'name' => 'Сквозная',
            ],
            // 1540. Мех. повреждение корпуса.Расположение
            [
                'defect_id' => '1540',
                'name' => 'От головной части',
            ],
            [
                'defect_id' => '1540',
                'name' => 'От основания',
            ],
            // 1541. Мех. повреждение корпуса.Расстояние
            [
                'defect_id' => '1541',
                'measure_unit' => 'мм',
            ],
            // 1543. Мех. повреждение резьбы.Расположение
            [
                'defect_id' => '1543',
                'name' => 'Головная часть',
            ],
            [
                'defect_id' => '1543',
                'name' => 'Основание',
            ],
            // 1545. Промыв корпуса.Глубина поражения
            [
                'defect_id' => '1545',
                'name' => 'Сквозная',
            ],
            [
                'defect_id' => '1545',
                'name' => 'Несквозная',
            ],
            // 1546. Промыв корпуса.Расположение
            [
                'defect_id' => '1546',
                'name' => 'От головной части',
            ],
            [
                'defect_id' => '1546',
                'name' => 'От основания',
            ],
            // 1547. Промыв корпуса.Расстояние
            [
                'defect_id' => '1547',
                'measure_unit' => 'мм',
            ],
            // 1549. Промыв резьбы.Расположение
            [
                'defect_id' => '1549',
                'name' => 'Головная часть',
            ],
            [
                'defect_id' => '1549',
                'name' => 'Основание',
            ],
            // 1550. Промыв резьбы.Глубина поражения
            [
                'defect_id' => '1550',
                'name' => 'Сквозная',
            ],
            [
                'defect_id' => '1550',
                'name' => 'Несквозная',
            ],
            // 154.Рабочие колеса
            // 1556. Износ лопасти.Характер износа
            [
                'defect_id' => '1556',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1556',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1556',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1556',
                'name' => 'Промыв',
            ],
            // 1557. Износ лопасти.Степень износа
            [
                'defect_id' => '1557',
                'name' => '0-10%',
                'visibility_defect_id' => '1556',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1557',
                'name' => '10-30%',
                'visibility_defect_id' => '1556',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1557',
                'name' => '30-50%',
                'visibility_defect_id' => '1556',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1557',
                'name' => '50-70%',
                'visibility_defect_id' => '1556',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1557',
                'name' => '70%-90%',
                'visibility_defect_id' => '1556',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1557',
                'name' => '100%',
                'visibility_defect_id' => '1556',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1557',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1556',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1557',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1556',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1559. Износ отверстий на лопасти.Характер износа
            [
                'defect_id' => '1559',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1559',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1559',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1559',
                'name' => 'Промыв',
            ],
            // 1560. Износ отверстий на лопасти.Степень износа
            [
                'defect_id' => '1560',
                'name' => '0-10%',
                'visibility_defect_id' => '1559',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1560',
                'name' => '15-30%',
                'visibility_defect_id' => '1559',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1560',
                'name' => '30-50%',
                'visibility_defect_id' => '1559',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1560',
                'name' => '50-70%',
                'visibility_defect_id' => '1559',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1560',
                'name' => '70%-90%',
                'visibility_defect_id' => '1559',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1560',
                'name' => '100%',
                'visibility_defect_id' => '1559',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1560',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1559',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1560',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1559',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1562. Износ внутреннего диаметра ступицы.Характер износа
            [
                'defect_id' => '1562',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1562',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1562',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1562',
                'name' => 'Промыв',
            ],
            // 1563. Износ внутреннего диаметра ступицы.Степень износа
            [
                'defect_id' => '1563',
                'name' => '0-10%',
                'visibility_defect_id' => '1562',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1563',
                'name' => '15-30%',
                'visibility_defect_id' => '1562',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1563',
                'name' => '30-50%',
                'visibility_defect_id' => '1562',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1563',
                'name' => '50-70%',
                'visibility_defect_id' => '1562',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1563',
                'name' => '70%-90%',
                'visibility_defect_id' => '1562',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1563',
                'name' => '100%',
                'visibility_defect_id' => '1562',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1563',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1562',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1563',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1562',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1565. Износ наружного диаметра ступицы.Характер износа
            [
                'defect_id' => '1565',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1565',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1565',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1565',
                'name' => 'Промыв',
            ],
            // 1566. Износ наружного диаметра ступицы.Степень износа
            [
                'defect_id' => '1566',
                'name' => '0-10%',
                'visibility_defect_id' => '1565',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1566',
                'name' => '15-30%',
                'visibility_defect_id' => '1565',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1566',
                'name' => '30-50%',
                'visibility_defect_id' => '1565',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1566',
                'name' => '50-70%',
                'visibility_defect_id' => '1565',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1566',
                'name' => '70%-90%',
                'visibility_defect_id' => '1565',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1566',
                'name' => '100%',
                'visibility_defect_id' => '1565',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1566',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1565',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1566',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1565',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1569. Износ посадочного места под опорные шайбы (верхние).Степень износа
            [
                'defect_id' => '1569',
                'name' => '0-10%',
            ],
            [
                'defect_id' => '1569',
                'name' => '15-30%',
            ],
            [
                'defect_id' => '1569',
                'name' => '30-50%',
            ],
            [
                'defect_id' => '1569',
                'name' => '50-70%',
            ],
            [
                'defect_id' => '1569',
                'name' => '70%-90%',
            ],
            [
                'defect_id' => '1569',
                'name' => '100%',
            ],
            // 1571. Износ посадочного места под опорные шайбы (нижние).Степень износа
            [
                'defect_id' => '1571',
                'name' => '0-10%',
            ],
            [
                'defect_id' => '1571',
                'name' => '15-30%',
            ],
            [
                'defect_id' => '1571',
                'name' => '30-50%',
            ],
            [
                'defect_id' => '1571',
                'name' => '50-70%',
            ],
            [
                'defect_id' => '1571',
                'name' => '70%-90%',
            ],
            [
                'defect_id' => '1571',
                'name' => '100%',
            ],
            // 1574. Износ текстолитовых шайб (верхние).Степень износа
            [
                'defect_id' => '1574',
                'name' => '0-10%',
            ],
            [
                'defect_id' => '1574',
                'name' => '15-30%',
            ],
            [
                'defect_id' => '1574',
                'name' => '30-50%',
            ],
            [
                'defect_id' => '1574',
                'name' => '50-70%',
            ],
            [
                'defect_id' => '1574',
                'name' => '70%-90%',
            ],
            [
                'defect_id' => '1574',
                'name' => '100%',
            ],
            // 1576. Износ текстолитовых шайб (нижние).Степень износа
            [
                'defect_id' => '1576',
                'name' => '0-10%',
            ],
            [
                'defect_id' => '1576',
                'name' => '15-30%',
            ],
            [
                'defect_id' => '1576',
                'name' => '30-50%',
            ],
            [
                'defect_id' => '1576',
                'name' => '50-70%',
            ],
            [
                'defect_id' => '1576',
                'name' => '70%-90%',
            ],
            [
                'defect_id' => '1576',
                'name' => '100%',
            ],
            // 1582. Засорение.Степень перекрытия проточных каналов
            [
                'defect_id' => '1582',
                'name' => 'Частичное',
            ],
            [
                'defect_id' => '1582',
                'name' => 'Около 50%',
            ],
            [
                'defect_id' => '1582',
                'name' => 'Полное',
            ],
            // 1583. Засорение.Тип засорения
            [
                'defect_id' => '1583',
                'name' => 'Механические примеси',
            ],
            [
                'defect_id' => '1583',
                'name' => 'Твердые отложения',
            ],
            [
                'defect_id' => '1583',
                'name' => 'Посторонние включения',
            ],
            [
                'defect_id' => '1583',
                'name' => 'АСПО',
            ],
            [
                'defect_id' => '1583',
                'name' => 'Проппант',
            ],
            // 155.Направляющие аппараты
            // 1586. ИИзнос лопаток.Характер износа
            [
                'defect_id' => '1586',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1586',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1586',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1586',
                'name' => 'Промыв',
            ],
            // 1086. Износ лопаток.Степень износа
            [
                'defect_id' => '1587',
                'name' => '0-10%',
                'visibility_defect_id' => '1586',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1587',
                'name' => '10-30%',
                'visibility_defect_id' => '1586',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1587',
                'name' => '30-50%',
                'visibility_defect_id' => '1586',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1587',
                'name' => '50-70%',
                'visibility_defect_id' => '1586',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1587',
                'name' => '70%-90%',
                'visibility_defect_id' => '1586',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1587',
                'name' => '100%',
                'visibility_defect_id' => '1586',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1587',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1586',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1587',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1586',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1589. Износ ступиц.Характер износа
            [
                'defect_id' => '1589',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1589',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1589',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1589',
                'name' => 'Промыв',
            ],
            // 1590. Износ ступиц.Степень износа
            [
                'defect_id' => '1590',
                'name' => '0-10%',
                'visibility_defect_id' => '1589',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1590',
                'name' => '10-30%',
                'visibility_defect_id' => '1589',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1590',
                'name' => '30-50%',
                'visibility_defect_id' => '1589',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1590',
                'name' => '50-70%',
                'visibility_defect_id' => '1589',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1590',
                'name' => '70%-90%',
                'visibility_defect_id' => '1589',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1590',
                'name' => '100%',
                'visibility_defect_id' => '1589',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1590',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1589',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1590',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1589',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1592. Износ втулки внутреннего диаметра.Характер износа
            [
                'defect_id' => '1592',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1592',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1592',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1592',
                'name' => 'Промыв',
            ],
            // 1593. Износ втулки внутреннего диаметра.Степень износа
            [
                'defect_id' => '1593',
                'name' => '0-10%',
                'visibility_defect_id' => '1592',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1593',
                'name' => '10-30%',
                'visibility_defect_id' => '1592',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1593',
                'name' => '30-50%',
                'visibility_defect_id' => '1592',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1593',
                'name' => '50-70%',
                'visibility_defect_id' => '1592',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1593',
                'name' => '70%-90%',
                'visibility_defect_id' => '1592',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1593',
                'name' => '100%',
                'visibility_defect_id' => '1592',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1593',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1592',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1593',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1592',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1595. Износ стакана.Характер износа
            [
                'defect_id' => '1595',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1595',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1595',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1595',
                'name' => 'Промыв',
            ],
            // 1596. Износ стакана.Степень износа
            [
                'defect_id' => '1596',
                'name' => '0-10%',
                'visibility_defect_id' => '1595',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1596',
                'name' => '10-30%',
                'visibility_defect_id' => '1595',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1596',
                'name' => '30-50%',
                'visibility_defect_id' => '1595',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1596',
                'name' => '50-70%',
                'visibility_defect_id' => '1595',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1596',
                'name' => '70%-90%',
                'visibility_defect_id' => '1595',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1596',
                'name' => '100%',
                'visibility_defect_id' => '1595',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1596',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1595',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1596',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1595',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1598. Засорение.Степень перекрытия проточных каналов
            [
                'defect_id' => '1598',
                'name' => 'Частичное',
            ],
            [
                'defect_id' => '1598',
                'name' => 'Около 50%',
            ],
            [
                'defect_id' => '1598',
                'name' => 'Полное',
            ],
            // 1599. Засорение.Тип засорения
            [
                'defect_id' => '1599',
                'name' => 'Механические примеси',
            ],
            [
                'defect_id' => '1599',
                'name' => 'Твердые отложения',
            ],
            [
                'defect_id' => '1599',
                'name' => 'Посторонние включения',
            ],
            [
                'defect_id' => '1599',
                'name' => 'АСПО',
            ],
            [
                'defect_id' => '1599',
                'name' => 'Проппант',
            ],
            // 1607. Дефект уплотнительного кольца. Вид дефекта
            [
                'defect_id' => '1607',
                'name' => 'Затвердели',
            ],
            [
                'defect_id' => '1607',
                'name' => 'Деформированы',
            ],
            [
                'defect_id' => '1607',
                'name' => 'Срезаны',
            ],
            [
                'defect_id' => '1607',
                'name' => 'Прикипели',
            ],
            // 156.Проставок
            // 1610. Износ.Характер износа
            [
                'defect_id' => '1610',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1610',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1610',
                'name' => 'Смятие',
            ],
            [
                'defect_id' => '1610',
                'name' => 'Промыв',
            ],
            // 1611. Износ.Степень износа
            [
                'defect_id' => '1611',
                'name' => '0-10%',
                'visibility_defect_id' => '1610',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1611',
                'name' => '10-30%',
                'visibility_defect_id' => '1610',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1611',
                'name' => '30-50%',
                'visibility_defect_id' => '1610',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1611',
                'name' => '50-70%',
                'visibility_defect_id' => '1610',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1611',
                'name' => '70%-90%',
                'visibility_defect_id' => '1610',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1611',
                'name' => '100%',
                'visibility_defect_id' => '1610',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1611',
                'name' => 'Сквозной',
                'visibility_defect_id' => '1610',
                'visibility_defect_value' => 'Промыв'
            ],
            [
                'defect_id' => '1611',
                'name' => 'Несквозной',
                'visibility_defect_id' => '1610',
                'visibility_defect_value' => 'Промыв'
            ],
            // 1624. Засорение.Степень перекрытия проточных каналов
            [
                'defect_id' => '1624',
                'name' => 'Частичное',
            ],
            [
                'defect_id' => '1624',
                'name' => 'Около 50%',
            ],
            [
                'defect_id' => '1624',
                'name' => 'Полное',
            ],
            // 1625. Засорение.Тип засорения
            [
                'defect_id' => '1625',
                'name' => 'Механические примеси',
            ],
            [
                'defect_id' => '1625',
                'name' => 'Твердые отложения',
            ],
            [
                'defect_id' => '1625',
                'name' => 'Посторонние включения',
            ],
            [
                'defect_id' => '1625',
                'name' => 'АСПО',
            ],
            [
                'defect_id' => '1625',
                'name' => 'Проппант',
            ],
            // 1628. Засорение.Степень перекрытия проточных каналов
            [
                'defect_id' => '1628',
                'name' => 'Частичное',
            ],
            [
                'defect_id' => '1628',
                'name' => 'Около 50%',
            ],
            [
                'defect_id' => '1628',
                'name' => 'Полное',
            ],
            // 1629. Засорение.Тип засорения
            [
                'defect_id' => '1629',
                'name' => 'Механические примеси',
            ],
            [
                'defect_id' => '1629',
                'name' => 'Твердые отложения',
            ],
            [
                'defect_id' => '1629',
                'name' => 'Посторонние включения',
            ],
            [
                'defect_id' => '1629',
                'name' => 'АСПО',
            ],
            [
                'defect_id' => '1629',
                'name' => 'Проппант',
            ],
            // 1636. Дефект уплотнительного кольца. Вид дефекта
            [
                'defect_id' => '1636',
                'name' => 'Затвердели',
            ],
            [
                'defect_id' => '1636',
                'name' => 'Деформированы',
            ],
            [
                'defect_id' => '1636',
                'name' => 'Срезаны',
            ],
            [
                'defect_id' => '1636',
                'name' => 'Прикипели',
            ],
            // 1639. Износ.Характер износа
            [
                'defect_id' => '1639',
                'name' => 'Износ',
            ],
            [
                'defect_id' => '1639',
                'name' => 'Слом',
            ],
            [
                'defect_id' => '1639',
                'name' => 'Трещина',
            ],
            // 1640. Износ.Тип износа
            [
                'defect_id' => '1640',
                'name' => 'Односторонний',
                'visibility_defect_id' => '1639',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1640',
                'name' => 'Радиальный',
                'visibility_defect_id' => '1639',
                'visibility_defect_value' => 'Износ'
            ],
            // 1641. Износ.Степень износа
            [
                'defect_id' => '1641',
                'name' => '0-10%',
                'visibility_defect_id' => '1639',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1641',
                'name' => '10-30%',
                'visibility_defect_id' => '1639',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1641',
                'name' => '30-50%',
                'visibility_defect_id' => '1639',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1641',
                'name' => '50-70%',
                'visibility_defect_id' => '1639',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1641',
                'name' => '70%-90%',
                'visibility_defect_id' => '1639',
                'visibility_defect_value' => 'Износ'
            ],
            [
                'defect_id' => '1641',
                'name' => '100%',
                'visibility_defect_id' => '1639',
                'visibility_defect_value' => 'Износ'
            ],
            // 1647. Износ.Место износа
            [
                'defect_id' => '1647',
                'name' => 'По наружной поверхности',
            ],
            [
                'defect_id' => '1647',
                'name' => 'По внутренней поверхности',
            ],
            // 1694. Отсчет от
            [
                'defect_id' => '1694',
                'name' => 'Верха',
            ],
            [
                'defect_id' => '1694',
                'name' => 'Низа',
            ],
            // 1699. Отсчет от
            [
                'defect_id' => '1699',
                'name' => 'Верха',
            ],
            [
                'defect_id' => '1699',
                'name' => 'Низа',
            ],
        ];

        foreach ($data as $item) {
            DefectValue::create($item);
        }

    }

}

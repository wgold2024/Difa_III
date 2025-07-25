<?php

namespace Database\Seeders;

use App\Models\Detail;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // --- Насос
            [
                'id' => '1',
                'name' => 'Common',
            ],
            [
                'id' => '2',
                'name' => 'Вращение',
            ],
            [
                'id' => '3',
                'name' => 'Верхнее положение',
            ],
            [
                'id' => '4',
                'name' => 'Нижнее положение',
            ],
            [
                'id' => '5',
                'name' => 'Слом вала',
            ],
            [
                'id' => '6',
                'name' => 'Коррозия корпуса',
            ],
            [
                'id' => '7',
                'name' => 'Коррозия резьбы',
            ],
            [
                'id' => '8',
                'name' => 'Мех. повреждение корпуса',
            ],
            [
                'id' => '9',
                'name' => 'Мех. повреждение резьбы',
            ],
            [
                'id' => '10',
                'name' => 'Промыв корпуса',
            ],
            [
                'id' => '11',
                'name' => 'Промыв резьбы',
            ],
            [
                'id' => '12',
                'name' => 'Износ верхнего диска',
            ],
            [
                'id' => '13',
                'name' => 'Износ нижнего диска',
            ],
            [
                'id' => '14',
                'name' => 'Износ внутреннего диаметра ступицы',
            ],
            [
                'id' => '15',
                'name' => 'Износ наружного диаметра ступицы',
            ],
            [
                'id' => '16',
                'name' => 'Износ диспергирующих лопаток',
            ],
            [
                'id' => '17',
                'name' => 'Износ юбки',
            ],
            [
                'id' => '18',
                'name' => 'Износ посадочного места под опорные шайбы (верхние)',
            ],
            [
                'id' => '19',
                'name' => 'Износ посадочного места под опорные шайбы (средние)',
            ],
            [
                'id' => '20',
                'name' => 'Износ посадочного места под опорные шайбы (нижние)',
            ],
            [
                'id' => '21',
                'name' => 'Износ текстолитовых шайб (верхние)',
            ],
            [
                'id' => '22',
                'name' => 'Износ текстолитовых шайб (средние)',
            ],
            [
                'id' => '23',
                'name' => 'Износ текстолитовых шайб (нижние)',
            ],
            [
                'id' => '24',
                'name' => 'Засорение',
            ],
            [
                'id' => '25',
                'name' => 'Износ нижнего диска',
            ],
            [
                'id' => '26',
                'name' => 'Износ верхнего диска',
            ],
            [
                'id' => '27',
                'name' => 'Износ лопаток',
            ],
            [
                'id' => '28',
                'name' => 'Износ ступиц',
            ],
            [
                'id' => '29',
                'name' => 'Износ опорного бурта',
            ],
            [
                'id' => '30',
                'name' => 'Износ втулки внутреннего диаметра',
            ],
            [
                'id' => '31',
                'name' => 'Износ стакана',
            ],
            [
                'id' => '32',
                'name' => 'Засорение',
            ],
            [
                'id' => '33',
                'name' => 'Износ',
            ],
            [
                'id' => '34',
                'name' => 'Износ',
            ],

            // --- Двигатель
            [
                'id' => '51',
                'name' => 'Наружный термоиндикатор',
            ],
            [
                'id' => '52',
                'name' => 'Внутренний термоиндикатор',
            ],
            [
                'id' => '53',
                'name' => 'Заклинивание пакета на валу при демонтаже',
            ],
            [
                'id' => '54',
                'name' => 'Заклинивание подшипника',
            ],
            [
                'id' => '55',
                'name' => 'Износ шлицев',
            ],
            [
                'id' => '56',
                'name' => 'Слом вала',
            ],
            [
                'id' => '57',
                'name' => 'Коррозия корпуса',
            ],
            [
                'id' => '58',
                'name' => 'Коррозия резьбы',
            ],
            [
                'id' => '59',
                'name' => 'Мех. повреждение корпуса',
            ],
            [
                'id' => '60',
                'name' => 'Мех. повреждение резьбы ',
            ],
            [
                'id' => '61',
                'name' => 'Промыв корпуса',
            ],
            [
                'id' => '62',
                'name' => 'Промыв резьбы',
            ],
            [
                'id' => '63',
                'name' => 'Электропробой с наружной стороны',
            ],
            [
                'id' => '64',
                'name' => 'Электропробой с внутренней стороны',
            ],
            [
                'id' => '65',
                'name' => 'Выводные провода жесткие вследствие перегрева',
            ],
            [
                'id' => '66',
                'name' => 'Заклинивание пакетов на валу',
            ],
            [
                'id' => '67',
                'name' => 'Заклинивание подшипника',
            ],
            [
                'id' => '68',
                'name' => 'Износ',
            ],
            [
                'id' => '69',
                'name' => 'Износ',
            ],
            [
                'id' => '70',
                'name' => 'Засорен',
            ],
            [
                'id' => '71',
                'name' => 'Недокручен',
            ],
        ];

        foreach ($data as $item) {
            Group::create($item);
        }
    }
}

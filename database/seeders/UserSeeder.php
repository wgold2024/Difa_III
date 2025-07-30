<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Иван Золотарев',
            'email' => 'ivan.zolotarev@novometgroup.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'id' => 2,
            'name' => 'Test for testing',
            'email' => 'test@test.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'id' => 3,
            'name' => 'Иван Подлесных',
            'email' => 'Ivan.Podlesnyh@novometgroup.com',
            'password' => Hash::make('Wqkjdfk*&hn'),
        ]);

        User::create([
            'id' => 4,
            'name' => 'Олег Борисович Юров',
            'email' => 'Oleg.Iurov@novometgroup.com',
            'password' => Hash::make('I8J688dYH_)p'),
        ]);

        //-----------------------------------------------------

        User::create([
            'id' => 5,
            'name' => 'Данила Мартюшев',
            'email' => 'Danila.Martiushev@novometgroup.com',
            'password' => Hash::make('W^TgFr5$132'),
        ]);

        User::create([
            'id' => 6,
            'name' => 'Сергей Слепченко',
            'email' => 'Sergei.Slepchenko@novometgroup.com',
            'password' => Hash::make('TtGF%45%F23'),
        ]);

        User::create([
            'id' => 7,
            'name' => 'Николай Утев',
            'email' => 'Nikolai.Utev@novometgroup.com',
            'password' => Hash::make('Ijcdu223*DH'),
        ]);

        User::create([
            'id' => 8,
            'name' => 'Павел Харламов',
            'email' => 'Pavel.harlamov@novometgroup.com',
            'password' => Hash::make('Qkdji*&^GN3'),
        ]);

        User::create([
            'id' => 9,
            'name' => 'Константин Савельев',
            'email' => 'Konstantin.Savelev@novometgroup.com',
            'password' => Hash::make('Vvdk()*t5UH'),
        ]);

        User::create([
            'id' => 10,
            'name' => 'Данил Павлов',
            'email' => 'Danil.Pavlov@novometgroup.com',
            'password' => Hash::make('Re!Fvdf(&11'),
        ]);

        User::create([
            'id' => 11,
            'name' => 'Александр Сорокин',
            'email' => 'Aleksandr.Sorokin@novometgroup.com',
            'password' => Hash::make('Ajdi(*(UH*1'),
        ]);

        User::create([
            'id' => 12,
            'name' => 'Администратор системы',
            'email' => 'Admin.Difa@novomet.ru',
            'password' => Hash::make('YHG%$DCBGd1'),
        ]);

        User::create([
            'id' => 13,
            'name' => 'Переведенцев Данил Александрович',
            'email' => 'Danil.Perevedentsev@novometgroup.com',
            'password' => Hash::make('oi(*kj,kdmv'),
        ]);

        User::create([
            'id' => 14,
            'name' => 'Сеидов Авел Панах Оглы',
            'email' => 'Avel.Seidov@novometgroup.com',
            'password' => Hash::make('k8Jkhdfd32^'),
        ]);

        User::create([
            'id' => 15,
            'name' => 'Переведенцев Данил Александрович',
            'email' => 'Perevedentsev.DA@gazprom-neft.ru',
            'password' => Hash::make('kljdUJ&67f!'),
        ]);

        User::create([
            'id' => 16,
            'name' => 'Павлюк Анастасия Владимировна',
            'email' => 'Anastasia.Pavliuk@novometgroup.com',
            'password' => Hash::make('UjHY65Tg%T1'),
        ]);

        User::create([
            'id' => 17,
            'name' => 'Полагушина Юлия Андреевна',
            'email' => 'Iulia.Polagushina@novometgroup.com',
            'password' => Hash::make('OI9dmjdu&^h'),
        ]);

        User::create([
            'id' => 18,
            'name' => 'Рыжов Владимир Вячеславович',
            'email' => 'Vladimir.Ryzhov@novometgroup.com',
            'password' => Hash::make('oiKj87YH6tg'),
        ]);

        User::create([
            'id' => 19,
            'name' => 'Тюленев Ростислав Эдуардович',
            'email' => 'Rostislav.Tiulenev@novometgroup.com',
            'password' => Hash::make('HYTbg7^YHhv'),
        ]);

        User::create([
            'id' => 20,
            'name' => 'Kotlin',
            'email' => 'kotlin@kotlin.com',
            'password' => Hash::make('kotlin'),
        ]);

        // ОП Новомет-Стрежевой 26.03.25
        User::create([
            'id' => 21,
            'name' => 'Родионов Егор Алексеевич',
            'email' => 'Egor.Rodionov@novometgroup.com',
            'password' => Hash::make('o(8Kj87YHtg'),
        ]);
        User::create([
            'id' => 22,
            'name' => 'Юсупова Луиза Исаевна',
            'email' => 'Luiza.Iusupova@novometgroup.com',
            'password' => Hash::make('T5d8Kj87YHt'),
        ]);
        User::create([
            'id' => 23,
            'name' => 'Янчук Юрий Павлович',
            'email' => 'Iurii.Ianchuk@novometgroup.com',
            'password' => Hash::make('kk&&dj87YHd'),
        ]);
        User::create([
            'id' => 24,
            'name' => 'Попова Татьяна Васильевна',
            'email' => 'Tatiana.Popova@novometgroup.com',
            'password' => Hash::make('o(898IjYHtg'),
        ]);
        // ---

        // ОП Новомет-Нижневартовск 28.03.25
        User::create([
            'id' => 25,
            'name' => 'Перебинос Сергей Михайлович',
            'email' => 'Sergei.Perebinos@novometgroup.com',
            'password' => Hash::make('e3&&dj87Yff'),
        ]);
        User::create([
            'id' => 26,
            'name' => 'Перебинос Александр Сергеевич',
            'email' => 'Aleksandr.Perebinos@novomet.ru',
            'password' => Hash::make('o(89555sHtg'),
        ]);
        // ---

        // ОП Новомет-Юг 28.03.25
        User::create([
            'id' => 27,
            'name' => 'Суюндуков Рустам Рамильевич',
            'email' => 'Rustam.Suiundukov@novometgroup.com',
            'password' => Hash::make('23d8Kj87Y45'),
        ]);
        User::create([
            'id' => 28,
            'name' => 'Щурин Сергей Сергеевич',
            'email' => 'Sergei.Shurin@novometgroup.com',
            'password' => Hash::make('ggg&dj87sss'),
        ]);
        User::create([
            'id' => 29,
            'name' => 'Александров Станислав Владимирович',
            'email' => 'Stanislav.Aleksandrov@novometgroup.com',
            'password' => Hash::make('ew98IjYHtg@'),
        ]);
        // ---

        // Новые пользователи
        User::create([
            'id' => 30,
            'name' => 'Зеляева Елена Сергеевна',
            'email' => 'Elena.Zeliaeva@novometgroup.com',
            'password' => Hash::make('ddw98F*YHii2'),
        ]);
    }
}

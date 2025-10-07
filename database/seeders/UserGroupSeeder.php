<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Первый уровень иерархии
        $groupNovomet = UserGroup::create([
            'name' => 'АО "Новомет-Пермь"',
            'description' => 'Головное предприятие',
            'position' => 1,
        ]);

        $groupNls = UserGroup::create([
            'name' => 'NLS',
            'description' => 'Предприятие для работы с зарубежными контрагентами',
            'position' => 2,
        ]);

        // Второй уровень иерархии
        $groupOp = UserGroup::create([
            'parent_id' => $groupNovomet->id,
            'name' => 'ОП',
            'description' => 'Обособленное подразделение',
            'position' => 1,
        ]);

        $groupIraq = UserGroup::create([
            'parent_id' => $groupNls->id,
            'name' => 'Ирак',
            'description' => 'Локация в Ираке',
            'position' => 1,
        ]);

        // Третий уровень иерархии для ОП
        $groupNoyabrsk = UserGroup::create([
            'parent_id' => $groupOp->id,
            'name' => 'Ноябрьск',
            'description' => 'Обособленное подразделение: Ноябрьск',
            'position' => 1,
        ]);

        $groupNefteyugansk = UserGroup::create([
            'parent_id' => $groupOp->id,
            'name' => 'Нефтеюганск',
            'description' => 'Обособленное подразделение: Нефтеюганск',
            'position' => 2,
        ]);

        $groupNizhnevartovsk = UserGroup::create([
            'parent_id' => $groupOp->id,
            'name' => 'Нижневартовск',
            'description' => 'Обособленное подразделение: Нижневартовск',
            'position' => 3,
        ]);

        $groupStrezhevoy = UserGroup::create([
            'parent_id' => $groupOp->id,
            'name' => 'Стрежевой',
            'description' => 'Обособленное подразделение: Стрежевой',
            'position' => 4,
        ]);

        $groupSouth = UserGroup::create([
            'parent_id' => $groupOp->id,
            'name' => 'Юг',
            'description' => 'Обособленное подразделение: Юг',
            'position' => 5,
        ]);

        $groupKazakhstan = UserGroup::create([
            'parent_id' => $groupOp->id,
            'name' => 'Казахстан',
            'description' => 'Обособленное подразделение: Казахстан',
            'position' => 6,
        ]);

        $groupAzerbaijan = UserGroup::create([
            'parent_id' => $groupOp->id,
            'name' => 'Азербайджан',
            'description' => 'Обособленное подразделение: Азербайджан',
            'position' => 7,
        ]);

        // Третий уровень иерархии для Ирака
        $groupDno = UserGroup::create([
            'parent_id' => $groupIraq->id,
            'name' => 'DNO',
            'description' => 'Компания DNO',
            'position' => 1,
        ]);

    }
}

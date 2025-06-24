<?php

namespace App\Services;

use App\Http\Resources\DefectData\GroupedDefectDataResource;
use App\Models\DefectData;
use App\Models\Group;

class DefectDataService
{
    public function getGroupedData($inputId, $unit = null)
    {
        $query = DefectData::where('input_id', $inputId);

        if ($unit) {
            $query->where('unit', $unit);
        }

        // Получаем данные и группируем
        $groupedData = $query->get()
            ->groupBy(['unit', 'section_number'])
            ->map(function ($units) {
                return $units->map(function ($items, $sectionNumber) {
                    return new GroupedDefectDataResource((object) [
                        'section_number' => $sectionNumber,
                        'items' => $items
                    ]);
                })->values();
            });

        // Форматируем ответ в зависимости от наличия unit
        return  $unit
            ? [$unit => $groupedData->first() ?? []]
            : $groupedData->toArray();
    }


    public function deleteOptionElements($unit, $sectionNumber): void {
        $groups = Group::all();
        foreach ($groups as $group) {
            $groupId = $group->id;

            $defectsJoin = DefectData::join('defects', 'defect_data.defect_id', '=', 'defects.id')
                ->where('defect_data.unit', $unit)
                ->where('defect_data.section_number', $sectionNumber)
                ->where('defects.group_id', $groupId)
                ->select('defect_data.id', 'defect_data.value', 'defects.group_id', 'defects.name', 'defects.type', 'defects.is_option')
                ->get();

//            $needDelete = true;
//            foreach ($defectsJoin as $defectItem) {
//                if (isset($defectItem->group_id) && $defectItem->group_id === 10) {
//                    if (!$defectItem->is_option) {
//                        $needDelete = false;
//                    }
//                    dump('needDelete', $needDelete);
//                }
//            }



//            if (isset($defectsJoin->id) && $defectsJoin->id === 47) {
//                dump($defectsJoin->value);
//            }

            $needDelete = true;
            foreach ($defectsJoin as $defectItem) {
                if (!$defectItem->is_option) {
                    $needDelete = false;
                }
            }

            if ($needDelete) {
                foreach ($defectsJoin as $defectItem) {
                    $defectItem->delete();
                }
            }
        }
    }

    public function deleteValueFalseElement(DefectData $defectDataEl): void {
//        if ($defectDataEl->defect_id === 46) {
//            dump($defectDataEl->value);
//        }
        if (
            ($defectDataEl->value === '' || $defectDataEl->value === false || $defectDataEl->value === 'false' || $defectDataEl->value === 0 || $defectDataEl->value === '0') &&
            empty($defectDataEl->comment) &&
            $defectDataEl->images->isEmpty()
        ) {
            $defectDataEl->delete();
        }
    }
}

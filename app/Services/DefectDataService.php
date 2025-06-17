<?php

namespace App\Services;

use App\Http\Resources\DefectData\GroupedDefectDataResource;
use App\Models\DefectData;

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
}

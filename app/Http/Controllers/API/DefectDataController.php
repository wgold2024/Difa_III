<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DefectData\StoreRequest;
use App\Http\Resources\DefectData\DefectDataResource;
use App\Http\Resources\DefectData\GroupedDefectDataResource;
use App\Http\Resources\Input\InputResource;
use App\Models\Defect;
use App\Models\DefectData;
use App\Models\ImageData;
use App\Models\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class DefectDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $defectData = DefectData::all()
            ->groupBy(['input_id', 'unit', 'section_number']);

        $inputs = Input::all();

        $data = $inputs->map(function ($input) use ($defectData) {
            $result = [
                'Input' => InputResource::make($input)->resolve()
            ];

            if (isset($defectData[$input->id])) {
                foreach ($defectData[$input->id] as $unitType => $sections) {
                    $result[$unitType] = $sections->map(function ($items, $sectionNumber) {
                        return new GroupedDefectDataResource((object) [
                            'section_number' => $sectionNumber,
                            'items' => $items
                        ]);
                    })->values();
                }
            }

            return $result;
        });

        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $inputId = $data['input_id'];
        $unit = $data['unit'];
        $sections = $data['sections'];

        try {
            DB::beginTransaction();

            foreach ($sections as $section) {
                $sectionId = $section['section_number'];
                $defects = $section['defects'];
                foreach ($defects as $defect) {
                    $detailId = Defect::find($defect['defect_id'])->detail->id;
                    $defectDataEl = DefectData::updateOrCreate(
                        [
                            'input_id' => $inputId,
                            'unit' => $unit,
                            'section_number' => $sectionId,
                            'detail_id' => $detailId,
                            'defect_id' => $defect['defect_id'],
                        ],
                        [
                            'value' => $defect['value'],
                            'comment' => $defect['comment'] ?? '',
                        ]
                    );
                    $defectData[] = $defectDataEl;


//                    if (is_array($defect['images'])) {
//                        dump('Обновление изобраожений, defect_data_id:', $defectDataEl->id);
//
//                        // Удаление изображений
//                        $images = ImageData::where('defect_data_id', $defectDataEl->id)->get();
//                        foreach ($images as $image) {
//                            Storage::disk('public')->delete($image->path);
//                            $image->delete();
//                        }
//                    }

                    if (isset($defect['images'])) {
                        dump('Обновление изобраожений, defect_data_id:', $defectDataEl->id);

                        // Удаление изображений
                        $images = ImageData::where('defect_data_id', $defectDataEl->id)->get();
                        foreach ($images as $image) {
                            Storage::disk('public')->delete($image->path);
                            $image->delete();
                        }
//                        $images->delete;
//                        dd($images);
                    }

                    if (isset($defect['images'])) {
                        // Сохренение изображений
                        foreach ($defect['images'] as $image) {
                            ImageData::create([
                                'defect_data_id' => $defectDataEl->id,
                                'path' => Storage::disk('public')->put('img/defect-data', $image),
                            ]);
                        }
                    }







//                    if($defect['images'] !== null && isArray($defect['images'])) {
//                        dump($defect['images']);
//                        foreach ($defect['images'] as $key => $image) {
//                            dump($image);
//                        }
//                    }

                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Данные успешно сохранены',
                'data' => DefectDataResource::collection($defectData)->resolve(),
            ], Response::HTTP_CREATED); // 201 статус для созданных ресурсов
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $unit = $request->unit;

        // Базовый запрос
        $query = DefectData::where('input_id', $id);

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
        $responseData = $unit
            ? [$unit => $groupedData->first() ?? []]
            : $groupedData->toArray();

        return response()->json($responseData);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

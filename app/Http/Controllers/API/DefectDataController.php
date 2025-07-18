<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DefectData\StoreRequest;
use App\Http\Resources\DefectData\DefectDataResource;
use App\Http\Resources\DefectData\GroupedDefectDataResource;
use App\Http\Resources\Input\InputResource;
use App\Models\Defect;
use App\Models\DefectData;
use App\Models\DefectValue;
use App\Models\Group;
use App\Models\ImageData;
use App\Models\Input;
use App\Services\DefectDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class DefectDataController extends Controller
{
    protected $defectDataService;

    public function __construct(DefectDataService $defectDataService) {
        $this->defectDataService = $defectDataService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $defectData = DefectData::all()
//            ->groupBy(['input_id', 'unit', 'section_number']);
//
//        $inputs = Input::all();
//
//        $data = $inputs->map(function ($input) use ($defectData) {
//            $result = [
//                'Input' => InputResource::make($input)->resolve()
//            ];
//
//            if (isset($defectData[$input->id])) {
//                foreach ($defectData[$input->id] as $unitType => $sections) {
//                    $result[$unitType] = $sections->map(function ($items, $sectionNumber) {
//                        return new GroupedDefectDataResource((object) [
//                            'section_number' => $sectionNumber,
//                            'items' => $items
//                        ]);
//                    })->values();
//                }
//            }
//
//            return $result;
//        });
//
//        return response()->json(['data' => $data]);

        $inputs = Input::all();

        $responseData = $inputs->map(function ($input) {
            $groupedData = $this->defectDataService->getGroupedData($input->id);
            return array_merge(
                ['Input' => InputResource::make($input)->resolve()],
                $groupedData
            );
        });

        return response()->json(['data' => $responseData]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $inputId = $data['input_id'];
        $unit = $data['unit'];
        $sections = $data['sections'] ?? null;

        if ($sections === null) {
            return response()->json(['error' => 'Сохранение отлонено: нет новых данных'], Response::HTTP_BAD_REQUEST);
        }

        try {
            DB::beginTransaction();

            foreach ($sections as $section) {
                $sectionNumber = $section['section_number'];
                $defects = $section['defects'] ?? null;
                if ($defects === null) {
                    continue;
                }

                foreach ($defects as $defect) {
                    $detailId = Defect::find($defect['defect_id'])->detail->id;
                    $defectDataEl = DefectData::updateOrCreate(
                        [
                            'input_id' => $inputId,
                            'unit' => $unit,
                            'section_number' => $sectionNumber,
                            'detail_id' => $detailId,
                            'defect_id' => $defect['defect_id'],
                        ],
                        [
                            'value' => $defect['value'] ?? '',
                            'comment' => $defect['comment'] ?? '',
                        ]
                    );

//                    $defectData[] = $defectDataEl;

                    // Удаление изображений
                    if (isset($defect['deletedImages'])) {
//                        dump($defect['deletedImages']);
                        foreach ($defect['deletedImages'] as $path) {
                            $image = ImageData::where('path', $path)->first();
                            if ($image) {
                                if (Storage::disk('public')->delete($image->path)) {
                                    $image->delete();
                                } else {
                                    dump('deletedImages', $defect['deletedImages']);
                                    return response()->json(['error' => "Ошибка удаления фото: $path"],Response::HTTP_BAD_REQUEST);
                                }
                            }
                        }
                    }

                    // Сохренение изображений
                    if (isset($defect['images'])) {
                        foreach ($defect['images'] as $image) {
                            $path = Storage::disk('public')->put('img/defect-data', $image);
                            if ($path) {
                                ImageData::create([
                                    'defect_data_id' => $defectDataEl->id,
                                    'path' => $path,
                                ]);
                            } else {
                                return response()->json(['error' => "Ошибка сохранения фото"],Response::HTTP_BAD_REQUEST);
                            }
                        }
                    }


//                    if ($defectDataEl->id === 63) {
//                        dump($defectDataEl->value);
//                        dump($defectDataEl->comment);
//                        dump(count($defectDataEl->images));
//                    }

//                    if ($defectDataEl->value === false && $defectDataEl->comment === '' && count($defectDataEl->images) === 0) {
//                        dump('Deleting');
//                        $defectDataEl->delete();
//                    }

                    // Удаление записи для которой нет фактических значений (value, comment. images)
                    $this->defectDataService->deleteValueFalseElement($defectDataEl);
                }
                // Удаление записи в группе, если основной дефект отсуствует
                $this->defectDataService->deleteOptionElements($unit, $sectionNumber);
            }

            DB::commit();










//            return response()->json([
//                'success' => true,
//                'message' => 'Данные успешно сохранены',
//                'data' => DefectDataResource::collection($defectData)->resolve(),
//            ], Response::HTTP_CREATED); // 201 статус для созданных ресурсов

//            $query = DefectData::where('input_id', $inputId);
//
//            if ($unit) {
//                $query->where('unit', $unit);
//            }
//
//            // Получаем данные и группируем
//            $groupedData = $query->get()
//                ->groupBy(['unit', 'section_number'])
//                ->map(function ($units) {
//                    return $units->map(function ($items, $sectionNumber) {
//                        return new GroupedDefectDataResource((object) [
//                            'section_number' => $sectionNumber,
//                            'items' => $items
//                        ]);
//                    })->values();
//                });
//
//            // Форматируем ответ в зависимости от наличия unit
//            $responseData = $unit
//                ? [$unit => $groupedData->first() ?? []]
//                : $groupedData->toArray();

            $responseData = $this->defectDataService->getGroupedData($inputId,  $unit);

            return response()->json($responseData);










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
//        $unit = $request->unit;
//
//        // Базовый запрос
//        $query = DefectData::where('input_id', $id);
//
//        if ($unit) {
//            $query->where('unit', $unit);
//        }
//
//        // Получаем данные и группируем
//        $groupedData = $query->get()
//            ->groupBy(['unit', 'section_number'])
//            ->map(function ($units) {
//                return $units->map(function ($items, $sectionNumber) {
//                    return new GroupedDefectDataResource((object) [
//                        'section_number' => $sectionNumber,
//                        'items' => $items
//                    ]);
//                })->values();
//            });
//
//        // Форматируем ответ в зависимости от наличия unit
//        $responseData = $unit
//            ? [$unit => $groupedData->first() ?? []]
//            : $groupedData->toArray();

        $responseData = $this->defectDataService->getGroupedData($id,  $request->unit);

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

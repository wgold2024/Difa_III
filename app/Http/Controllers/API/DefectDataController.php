<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DefectData\StoreRequest;
use App\Http\Resources\DefectData\DefectDataResource;
use App\Http\Resources\DefectData\UnitDataResource;
use App\Http\Resources\Input\InputResource;
use App\Models\Defect;
use App\Models\DefectData;
use App\Models\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DefectDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inputs = Input::with(['pumps', 'motors'])->get();

        $data = $inputs->map(function ($input) {
            return [
                'Input' => ['id' => $input->id],
                'Pump' => $input->pumps
                    ->groupBy('section_number')
                    ->map(function ($items, $sectionNumber) {
                        return [
                            'section_id' => $sectionNumber,
                            'defects' => $items->map(function ($item) {
                                return [
                                    'detail_id' => $item->detail_id,
                                    'defect_id' => $item->defect_id,
                                    'value' => $item->value,
                                ];
                            })->values()
                        ];
                    })->values(),
                'Motor' => $input->motors
                    ->groupBy('section_number')
                    ->map(function ($items, $sectionNumber) {
                        return [
                            'section_id' => $sectionNumber,
                            'defects' => $items->map(function ($item) {
                                return [
                                    'detail_id' => $item->detail_id,
                                    'defect_id' => $item->defect_id,
                                    'value' => $item->value,
                                ];
                            })->values()
                        ];
                    })->values(),
            ];
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

//        dd($inputId, $unit, $sections);

        try {
            DB::beginTransaction();

            foreach ($sections as $section) {
                $sectionId = $section['section_id'];
                $defects = $section['defects'];
                foreach ($defects as $defect) {
                    $detailId = Defect::find($defect['defect_id'])->detail->id;
                    $defectData[] = DefectData::updateOrCreate(
                        [
                            'input_id' => $inputId,
                            'unit' => $unit,
                            'section_number' => $sectionId,
                            'detail_id' => $detailId,
                            'defect_id' => $defect['defect_id'],
                        ],
                        [
                            'value' => $defect['value'],
                        ]
                    );
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Данные успешно сохранены',
                'data' => DefectDataResource::collection($defectData),
            ], Response::HTTP_CREATED); // 201 статус для созданных ресурсов
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

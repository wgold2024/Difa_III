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

        try {
            DB::beginTransaction();

            $defectData = DefectData::create($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return DefectDataResource::make($defectData)->resolve();
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

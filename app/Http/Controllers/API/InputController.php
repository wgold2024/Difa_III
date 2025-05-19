<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Input\StoreRequest;
use App\Http\Resources\Input\InputResource;
use App\Models\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = Input::all();

        return InputResource::collection($input)->resolve();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
//        dd($data);

        unset($data['installationDate']);
        unset($data['startDate']);
        unset($data['stopDate']);
        unset($data['dismantlingDate']);
        unset($data['operatingTime']);
        unset($data['analysisDate']);
        unset($data['stopReason']);
        unset($data['slKey']);

        $data['user_id'] = auth()->user()->id;

        try {
            DB::beginTransaction();

//            $input = Input::create($data);

            $input = Input::updateOrCreate(
                ['id' => $request->input('id')],
                $data
            );

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return InputResource::make($input)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(Input $input)
    {
        return InputResource::make($input)->resolve();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Input $input)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Input $input)
    {
        return $input->delete();
    }
}

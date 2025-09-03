<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Esp\EspResource;
use App\Http\Resources\Group\GroupResource;
use App\Models\Detail;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $unit = $request->unit;
        if ($unit) {
            $groups = Group::whereHas('defects.detail', function($query) use ($unit) {
                $query->where('unit', $unit);
            })
//                ->withCount('defects') // если нужно знать количество дефектов в группе
                ->get(['id', 'name']);
        } else {
            $groups = Group::all();
        }

        return GroupResource::collection($groups)->resolve();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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

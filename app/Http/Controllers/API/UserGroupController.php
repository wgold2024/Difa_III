<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserGroup\StoreRequest;
use App\Http\Requests\UserGroup\UpdateRequest;
use App\Http\Resources\UserGroup\UserGroupResource;
use App\Models\UserGroup;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function index() {
        $userGroups = UserGroup::all();

        return response()->json([
            'columns' => [
                ['field' => 'id', 'header' => 'id', 'sortable' => true, 'sorted' => true, 'tableVisibility' => true, 'formVisibility' => false],
                ['field' => 'name', 'header' => 'Название', 'sortable' => true, 'tableVisibility' => true, 'formVisibility' => true, 'data' => 'Test'],
                ['field' => 'description', 'header' => 'Описание', 'sortable' => true, 'tableVisibility' => true, 'formVisibility' => true, 'data' => 'Test description'],
                ['field' => 'parent_id', 'header' => 'Id родителя', 'sortable' => true, 'tableVisibility' => true, 'formVisibility' => true, 'data' => '1'],
                ['field' => 'position', 'header' => 'Позиция в списке', 'sortable' => true, 'tableVisibility' => true, 'formVisibility' => true, 'data' => '1'],
            ],
            'data' => UserGroupResource::collection($userGroups)
        ],Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $userGroup = UserGroup::create($data);

        return response()->json($userGroup);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserGroup $userGroup)
    {
        return response()->json(UserGroupResource::make($userGroup), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, UserGroup $userGroup)
    {
        $data = $request->validated();
        $updatedUserGroup = $userGroup->update($data);

        return response()->json([
            'message' => 'Группа успешно обновлёна',
            'user'    => $updatedUserGroup
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserGroup $userGroup = null)
    {
//        if (!$userGroup) {
//            return response()->json([
//                'message' => 'Группа не найдена'
//            ], Response::HTTP_NOT_FOUND);
//        }
//
//        if ($user->id === auth()->id()) {
//            return response()->json([
//                'message' => 'Нельзя удалить свою группу'
//            ], Response::HTTP_FORBIDDEN);
//        }
//
//        $user->delete();
//
//        return response()->json([
//            'message' => 'Запись удалёна'
//        ], Response::HTTP_OK);
    }

}

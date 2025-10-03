<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNot('id', '10000')->get();

        return response()->json([
            'columns' => [
                ['field' => 'id', 'header' => 'id', 'sortable' => true, 'required' => false, 'tableVisibility' => true, 'formVisibility' => false, 'data' => '2000'],
                ['field' => 'name', 'header' => 'Имя', 'sortable' => true, 'required' => true, 'tableVisibility' => true, 'formVisibility' => true, 'data' => 'Test'],
                ['field' => 'email', 'header' => 'E-mail', 'sortable' => true, 'required' => true, 'tableVisibility' => true, 'formVisibility' => true, 'data' => 'test@test.test'],
                ['field' => 'password_changed', 'header' => 'Пароль изменен', 'sortable' => true, 'required' => false, 'tableVisibility' => true, 'formVisibility' => false],
                ['field' => 'password', 'header' => 'Пароль', 'sortable' => false, 'required' => true, 'tableVisibility' => false, 'formVisibility' => true, 'data' => '12345678'],
                ['field' => 'password_confirmation', 'header' => 'Подтверждение пароля', 'sortable' => false, 'required' => true, 'tableVisibility' => false, 'formVisibility' => true, 'data' => '12345678'],
            ],
            'data' => UserResource::collection($users)
        ],Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if ($user != 10000 ) {
            return response()->json(UserResource::make($user), Response::HTTP_OK);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $updatedUser = $user->update($data);

        return response()->json([
            'message' => 'Пользователь успешно обновлён',
            'user'    => $updatedUser
        ], Response::HTTP_OK);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user = null)
    {
        if (!$user) {
            return response()->json([
                'message' => 'Пользователь не найден'
            ], Response::HTTP_NOT_FOUND);
        }

        if ($user->id === auth()->id()) {
            return response()->json([
                'message' => 'Нельзя удалить себя'
            ], Response::HTTP_FORBIDDEN);
        }

        $user->delete();

        return response()->json([
            'message' => 'Запись удалёна'
        ], Response::HTTP_OK);
    }
}

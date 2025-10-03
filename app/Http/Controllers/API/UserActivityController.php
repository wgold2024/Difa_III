<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserActivity\UserActivityResource;
use App\Models\UserActivity;
use Symfony\Component\HttpFoundation\Response;

class UserActivityController extends Controller
{
    public function index() {
        $userActivities = UserActivity::all();

        return response()->json([
            'columns' => [
                ['field' => 'id', 'header' => 'id', 'sortable' => true, 'tableVisibility' => true],
                ['field' => 'session_id', 'header' => 'Id сессии', 'sortable' => true, 'tableVisibility' => true],
                ['field' => 'user_id', 'header' => 'Id пользователя', 'sortable' => true, 'tableVisibility' => true],
                ['field' => 'userName', 'header' => 'Пользователь', 'sortable' => true, 'tableVisibility' => true,],
                ['field' => 'ip_address', 'header' => 'Ip адрес', 'sortable' => true, 'tableVisibility' => true],
                ['field' => 'user_agent', 'header' => 'Агент', 'sortable' => true, 'tableVisibility' => true],
                ['field' => 'logged_in_at', 'header' => 'Время входа', 'sortable' => true, 'tableVisibility' => true],
                ['field' => 'logged_out_at', 'header' => 'Время выхода', 'sortable' => true, 'tableVisibility' => true],
                ['field' => 'session_expired_at', 'header' => 'Время последнего действия', 'sortable' => true, 'sortDirection' => 'desc', 'sorted' => true, 'tableVisibility' => true],
            ],
            'data' => UserActivityResource::collection($userActivities)
        ],Response::HTTP_OK);
    }
}

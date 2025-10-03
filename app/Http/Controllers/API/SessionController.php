<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Session\SessionResource;
use App\Models\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionController extends Controller
{
    public function index(Request $request)
    {
        $sessions = Session::all();

        return response()->json([
            'columns' => [
                ['field' => 'id', 'header' => 'Id', 'sortable' => true, 'required' => true, 'tableVisibility' => true],
                ['field' => 'user_id', 'header' => 'Id пользователя', 'sortable' => true, 'required' => true, 'tableVisibility' => true],
                ['field' => 'userName', 'header' => 'Пользователь', 'sortable' => true, 'required' => true, 'tableVisibility' => true],
                ['field' => 'ip_address', 'header' => 'Ip адрес', 'sortable' => true, 'required' => true, 'tableVisibility' => true],
                ['field' => 'user_agent', 'header' => 'Агент', 'sortable' => true, 'required' => false, 'tableVisibility' => true ],
                ['field' => 'last_activity', 'header' => 'Последняя активность', 'sortable' => true, 'sorted' => true, 'sortDirection' => 'desc', 'required' => true, 'tableVisibility' => true],
                ['field' => 'is_active', 'header' => 'Активен', 'sortable' => true, 'required' => true, 'tableVisibility' => true],
            ],
            'data' => SessionResource::collection($sessions)
        ],Response::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class AndroidController extends Controller
{
    public function getApk() {
        $filename = 'app-release.7z';
        $path = storage_path('app/public/apk/' . $filename);

        if (!file_exists($path)) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return response()->download($path);
    }
}

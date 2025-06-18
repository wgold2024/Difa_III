<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Defect;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AiController extends Controller
{
    public function checkImage(Request $request) {
        $image = $request['image'][0];
        $defectId = $request['defectId'];
//        dd($image);

        $path = storage_path('app/public/ai/check-image');

        if (File::exists($path)) {
            File::cleanDirectory($path);
        }

        $path = Storage::disk('public')->put('ai/check-image', $image);
        $path = "D:\Ivan\Prjs\Difa\Difa III\difa_web\storage\app\public\\" . $path;
//        dd($path);

//        $castimpeller1 = 'D:\\Ivan\\Prjs\\difa_web\\storage\\app\\public\\image_recognition\\castimpeller.jpg';
//        $castimpeller2 = 'D:\\Ivan\\Prjs\\difa_web\\storage\\app\\public\\image_recognition\\РК.png';
//        $shaft = 'D:\\Ivan\\Prjs\\difa_web\\storage\\app\\public\\image_recognition\\Вал.png';
//        $diffuser = 'D:\\Ivan\\Prjs\\difa_web\\storage\\app\\public\\image_recognition\\НА.jpg';
//        $bushing = 'D:\\Ivan\\Prjs\\difa_web\\storage\\app\\public\\image_recognition\\Втулка.jpg';
//        $coupling = 'D:\\Ivan\\Prjs\\difa_web\\storage\\app\\public\\image_recognition\\Муфта.jpg';
//        $name = $diffuser;
//
//        $output = shell_exec('C:\Users\Zolotarev.iv\AppData\Local\anaconda3\envs\photo_processing\python D:\Ivan\Prjs\Difa\Python\upload_app\main.py image_recognition "' . $name . '"');
//
//        //$output = shell_exec('C:\Users\Zolotarev.iv\AppData\Local\anaconda3\envs\photo_processing\python D:\Ivan\Prjs\Difa\Python\upload_app\main.py test_one 1 2 3');

        $output = shell_exec('C:\Users\Zolotarev.iv\AppData\Local\anaconda3\envs\photo_processing\python D:\Ivan\Prjs\Difa\Python\upload_app\main.py image_recognition "' . $path . '"');

        $response = json_decode($output);
        if ($response->status === "success") {
            $arr = [
                'castimpeller' => 4,
                'shaft' => 2,
                'diffuser' => 5,
                'bushing' => 6,
                'coupling' => 7
            ];

            return response()->json([
                'result' => $arr[$response->class_id] === Defect::find($defectId)->detail->id,
                'class' => $response->class_id,
                'detail' => Defect::find($defectId)->detail->name,
            ], Response::HTTP_ACCEPTED);
        } else if ($response->status === "error") {
            return response()->json([
                'status' => "error",
                'message' => $response->message
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        } else {
            return response()->json([
                'status' => "error",
                'message' => "Непредвиденная ошибка от Python"
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

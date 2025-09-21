<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class Controller
{
    protected function res(mixed $data = [], string $message = 'success', int $code = 200, $success = true, $errors = [], $errorCode = null)
    {
        $arr = ['success' => $success, 'message' => $message, 'data' => $data];
        // if (!is_array($data) || sizeof($data) != 0) {
        //     if (
        //         $data instanceof AnonymousResourceCollection || $data instanceof JsonResource
        //     ) {
        //         $data = $data->toArray(request());
        //     }

        //     $arr = array_merge($arr, ['data' => $data]);
        // }
        if (sizeof($errors) != 0) {
            $arr = array_merge($arr, $errors);
        }
        if ($errorCode) {
            $arr = array_merge($arr, ['code' => $errorCode]);
        }


        return response()->json($arr, $code);
    }
}

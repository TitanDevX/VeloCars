<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class Controller
{
    protected function singleResourceResponse($res)
    {
        $class = 'App\Http\Resources\\' . class_basename($res) . 'Resource';

        return $this->success($class::make($res));
    }
    protected function collectionResourceResponse(Collection $res, $type = null)
    {
        $first = $res->first();
        if (!$first && !$type)
            return $this->success();
        if ($first) {
            $type = class_basename($first);
        }

        $class = 'App\Http\Resources\\' . class_basename($type) . 'Resource';

        return $this->success($class::collection($res));
    }
    protected function error(int $code, $errors = [], $errorCode = null)
    {
        return $this->res([], 'error', $code, false, $errors, $errorCode);
    }
    protected function success(mixed $data = [])
    {
        return $this->res($data);
    }
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

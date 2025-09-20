<?php

namespace App\Http\Controllers;

abstract class Controller
{
     protected function res(mixed $data = [], string $message = 'success', int $code = 200, $success = true, $errors = [], $errorCode = null)
    {
        $arr = ['success' => $success, 'message' => $message];
        if(sizeof($data) != 0){
            $arr = array_merge($arr,$data);
        }
        if(sizeof($errors) != 0){
            $arr = array_merge($arr,$errors);
        }
        if($errorCode){
            $arr = array_merge($arr,['code' => $errorCode]);
        }


        return response()->json($arr, $code);  
    }
}

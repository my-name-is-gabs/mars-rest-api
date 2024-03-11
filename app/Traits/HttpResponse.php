<?php

namespace App\Traits;

trait HttpResponse 
{
    public function success($data, $message=null, $status_code=200)
    {
        return response()->json(["data" => $data, "message" => $message, "status" => $status_code]);
    }

    public function error($message=null, $status_code=401) 
    {
        return response()->json(['message' => $message, "status" => $status_code]);
    }
}
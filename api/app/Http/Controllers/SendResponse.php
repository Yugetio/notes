<?php

namespace App\Http\Controllers;


class SendResponse
{
    function SendResponse($code, $exception) {
        return response()->json([
            'code' => $code,
            'message' => $exception,
        ]);
    }
}
<?php

namespace App\Http\Controllers;


class ResponseForFront
{
    function SendResponse($code, $message) {
        return response()->json([
            'code' => $code,
            'message' => $message,
        ]);
    }
}
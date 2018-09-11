<?php

namespace App\Http\Controllers;


class ResponsesForFront
{
    function SendResponse($code, $message) {
        return response()->json([
            'code' => $code,
            'message' => $message,
        ]);
    }
}
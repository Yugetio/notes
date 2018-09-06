<?php

namespace App\Http\Controllers;


class SendResponse
{
    function SendResponse($code, $exception) {
        return response()->json([
            'error' => $code,
            'message' => $exception,
        ]);
    }
}
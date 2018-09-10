<?php

namespace App\Http\Controllers;


class SendResponse
{
    function SendResponse($code, $message) {
        return response()->json([
            'code' => $code,
            'message' => $message,
        ]);
    }
}
<?php

namespace App\Classes;

use Illuminate\Http\JsonResponse;

class ResponseClass
{
    public static function response($result, $message, $code = 200): JsonResponse
    {
        $response = [
            'code' => $code,
            'message' => $message
        ];

        $digit = substr((string)$code, 0, 1);

        if ($digit == '2' && $result != null) {
            $response['data'] = $result;
        } else if ($result != null) {
            $response['errors'] = $result;
        }

        return response()->json($response, $code);
    }
}

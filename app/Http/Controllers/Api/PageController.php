<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function test()
    {
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'Ok',
            'data' => [
                1,
                2,
                3
            ]
        ];

        return response()->json($response);
    }
}

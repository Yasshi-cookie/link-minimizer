<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlMinimizeRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UrlMinimizeController extends Controller
{
    /**
     * @param UrlMinimizeRequest $request
     * @return JsonResponse
     */
    public function minimize(UrlMinimizeRequest $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => '短縮URLの生成に成功しました。',
            'data' => [
                'short_url' => $request->getLongUrl()->getValue(),
            ],
        ]);
    }
}

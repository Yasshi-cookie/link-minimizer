<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlMinimizeRequest;
use App\Services\StoreUrlPair\StoreUrlPairService;
use Illuminate\Http\JsonResponse;

class UrlMinimizeController extends Controller
{
    public function __construct(
        private readonly StoreUrlPairService $storeUrlPairService
    ) {
    }

    /**
     * @param UrlMinimizeRequest $request
     * @return JsonResponse
     */
    public function minimize(UrlMinimizeRequest $request): JsonResponse
    {
        $urlPair = $this->storeUrlPairService->storeIfNotExist($request->getLongUrl());

        return response()->json([
            'success' => true,
            'message' => '短縮URLの生成に成功しました。',
            'data' => [
                'short_url' => $urlPair->getMinimizedUrl()->getFullUrl(),
            ],
        ]);
    }
}

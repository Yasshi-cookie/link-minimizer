<?php

namespace App\Http\Controllers;

use App\Http\Requests\RedirectToOriginalUrlRequest;
use App\Services\GetUrlPair\Exceptions\NotFoundUrlPairException;
use App\Services\GetUrlPair\GetUrlPairService;
use Illuminate\Support\Facades\Log;

class RedirectToOriginalUrlController extends Controller
{
    public function __construct(
        private readonly GetUrlPairService $getUrlPairService
    ) {
    }

    /**
     * @param RedirectToOriginalUrlRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function redirect(
        RedirectToOriginalUrlRequest $request
    ): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse {
        try {
            $urlPair = $this->getUrlPairService->findByMinimizedUrl(
                $request->getMinimizedUrl()
            );
        } catch (NotFoundUrlPairException $e) {
            Log::error('URL not found: ' . $request->getMinimizedUrl()->getFullUrl());
            return response()->json(
                [
                    'success' => false,
                    'message' => '指定されたURLは登録されていません: ' . $request->getMinimizedUrl()->getFullUrl(),
                    'data' => [],
                ],
                404
            );
        } catch (\Throwable $th) {
            Log::error('Unexpected error occurred: ' . $th->getMessage());
            return response()->json(
                [
                    'success' => false,
                    'message' => '予期せぬエラーが発生しました。',
                    'data' => [],
                ],
                500
            );
        }

        return redirect($urlPair->getOriginalUrl()->getValue(), 301);
    }
}

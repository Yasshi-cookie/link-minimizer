<?php

namespace App\Services\StoreUrlPair\Repositories;

use App\Models\UrlPair;
use App\Services\GenerateMinimizedUrl\GenerateMinimizedUrlService;
use App\ValueObjects\RedirectableUrl;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UrlPairRepository
{
    /**
     * @param  RedirectableUrl $originalUrl
     * @return UrlPair
     */
    public function store(RedirectableUrl $originalUrl): UrlPair
    {
        DB::beginTransaction();

        try {
            /** @var UrlPair */
            $urlPair = UrlPair::create([
                'user_id' => auth()->id(),
                'minimized_url' => '',
                'original_url' => $originalUrl->getValue(),
            ]);

            /** @var GenerateMinimizedUrlService */
            $generateMinimizedUrlService = app()->make(GenerateMinimizedUrlService::class);
            $minimizedUrl = $generateMinimizedUrlService->generateFromUrlPairId($urlPair->getId());

            $urlPair->update(['minimized_url' => $minimizedUrl->getValue()]);

        } catch (\Throwable $th) {
            Log::error($th);
            DB::rollBack();

            throw $th;
        }

        DB::commit();

        return $urlPair;
    }

    /**
     * @param RedirectableUrl $originalUrl
     * @return Collection<int, UrlPair>
     */
    public function getByOriginalUrl(RedirectableUrl $originalUrl): Collection
    {
        return UrlPair::whereUserId(auth()->id())
            ->whereOriginalUrl($originalUrl->getValue())
            ->get();
    }
}

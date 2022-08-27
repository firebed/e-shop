<?php

namespace Eshop\Controllers\Dashboard\Skroutz;

use Eshop\Actions\ReportError;
use Eshop\Services\Skroutz\Skroutz;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class SkroutzWebhookController
{
    public function __invoke(Request $request): JsonResponse
    {
        $event = $request->input();

        DB::beginTransaction();
        try {
            Skroutz::handleWebhookRequest($event);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();

            (new ReportError())->handle($e->getMessage(), $e->getTraceAsString());
        }

        return response()->json();
    }
}
<?php

namespace Eshop\Services\CourierCenter\Commands;

use Eshop\Services\CourierCenter\CourierCenterService;
use Eshop\Services\CourierCenter\Events\CourierCenterPayoutReceived;
use Eshop\Services\Payout\PayoutsCommand;
use Illuminate\Support\Carbon;
use Throwable;

class CourierCenterPayoutsCommand extends PayoutsCommand
{
    protected $signature = 'payouts:courier-center {--on=}';

    protected $description = 'Reads the mail inbox for a given date and address';

    public function handle(CourierCenterService $service): int
    {
        $on = filled($this->option('on')) ? Carbon::parse($this->option('on')) : null;

        try {
            $messages = $service->payouts()->previewMessages($on);

            $this->info($messages->count() . ' messages');

            foreach ($messages as $messageId => $message) {
                if (!$this->isNew($messageId)) {
                    continue;
                }

                $payouts = $service->payouts()->find($messageId);

                if ($payouts->filter()->isNotEmpty()) {
                    foreach ($payouts as $payout) {
                        event(new CourierCenterPayoutReceived($payout, $message['date']));

                        $this->info($payout->count() . " vouchers of total: " . format_currency($payout->sum()));
                    }
                }
            }
        } catch (Throwable $e) {
            $this->error($e->getMessage());
        }

        return 0;
    }
}

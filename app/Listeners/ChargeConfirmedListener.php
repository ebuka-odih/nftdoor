<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;

class ChargeConfirmedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CoinbaseWebhookCall $webhookCall)
    {
        $code = $webhookCall->payload['event']['data']['code'];

        $user = User::wherePaymentCode($code)->first();
        $user->confirm_payment = 1;
        $user->save();
    }


}

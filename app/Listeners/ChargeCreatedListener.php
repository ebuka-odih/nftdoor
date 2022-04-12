<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;

class ChargeCreatedListener implements ShouldQueue
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


    public function handle(CoinbaseWebhookCall $webhookCall)
    {
        $code = $webhookCall->payload['event']['data']['code'];

        $user = User::wherePaymentCode($code)->first();
        if ($user){
            $user->confirm_payment = 2;
            $user->save();
        }

    }


}

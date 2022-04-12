<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;

class ChargeCreatedListener implements ShouldQueue
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function handle(CoinbaseWebhookCall $webhookCall)
    {
        $code = $webhookCall->payload['event']['data']['code'];

        $user = User::wherePaymentCode($code)->first();
        $user->confirm_payment = 2;
        $user->save();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shakurov\Coinbase\Facades\Coinbase;
use Shakurov\Coinbase\Models\CoinbaseWebhookCall;

//use Shakurov\Coinbase\Coinbase;

class PaymentController extends Controller
{
    //

    public function createCharge($id){
        $charge = Coinbase::createCharge([

            'name' => 'The NFTDoor Signup Fee',
            'description' => 'The NFTDoor one time Signup Fee',
            'local_price' => [
                'amount' => 0.5,
                'currency' => 'USD',
            ],
            'pricing_type' => 'fixed_price',
        ]);
        $user = User::findOrFail($id);
        $user['payment_code'] = $charge['data']['code'];
        $user->save();
        return response()->json($charge);
    }

    public function confirmCharge(CoinbaseWebhookCall $webhookCall)
    {
        return $webhookCall;
        $payload = $request->getContent();
        return $payload->event;
//        $code = $payload['event']['data']['code'];
        $code = $payload->event['data']['code'];
        $user = User::wherePaymentCode($code)->first();
        $user->confirm_payment = 1;
        $user->save();
        return $user;
    }


    public function inAppPayment()
    {
//        return "Hello";
        $user = auth()->user();
        $user->confirm_payment = 1;
        $user->inapp_paid = 1;
        $user->save();
       return response()->json($user);
    }

}

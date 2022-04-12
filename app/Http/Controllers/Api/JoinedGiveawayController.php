<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\JoinedGiveaway;
use App\Models\NFTGiveaway;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinedGiveawayController extends Controller
{
    //
//    public function store(Request $request, $id)
//    {
//        $giveaway = NFTGiveaway::findOrFail($id);
//
//        $joined_giveaway = new JoinedGiveaway();
//        $joined_giveaway->user_id = Auth::id();
//        $joined_giveaway->n_f_t_giveaway_id = $giveaway;
//        $joined_giveaway->save();
//
//    }

    public function store(Request $request)
    {
        $data = [];
        $joined_giveaway = new JoinedGiveaway();
        $joined = JoinedGiveaway::whereUserId($request['user_id'])->where('n_f_t_giveaway_id',$request['giveaway_id'])->first();
        if($joined){
            $data['message'] = 'Already Joined';
            return response()->json($data,404);
        }
        $data['message'] = 'Successfully joined';
        $joined_giveaway->user_id = $request['user_id'];
        $joined_giveaway->n_f_t_giveaway_id = $request['giveaway_id'];
        $joined_giveaway->save();
        return  response()->json($data);
    }


}

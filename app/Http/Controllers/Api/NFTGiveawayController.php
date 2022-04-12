<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NFTGiveawayResource;
use App\Http\Resources\NFTListingResource;
use App\Models\NFTGiveaway;
use Illuminate\Http\Request;

class NFTGiveawayController extends Controller
{

    public function index(){
        return NFTGiveawayResource::collection(NFTGiveaway::orderBy('id','DESC')->paginate(10));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id){
        if(NFTGiveaway::where('id',$id)->first()){
            return new NFTGiveawayResource(NFTGiveaway::findOrFail($id));
        }else{
            return Response::json(['error'=>'NFT giveaway not found!']);
        }
    }


    public function edit(NFTGiveaway $nFTGiveaway)
    {
        //
    }


    public function update(Request $request, NFTGiveaway $nFTGiveaway)
    {
        //
    }


    public function destroy(NFTGiveaway $nFTGiveaway)
    {
        //
    }

}

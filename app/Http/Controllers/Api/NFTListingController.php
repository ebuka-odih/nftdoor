<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NFTListingResource;
use App\Models\NFTListing;
use Illuminate\Http\Request;

class NFTListingController extends Controller
{
    // List all the NFTs
    public function index(){
        return NFTListingResource::collection(NFTListing::orderBy('id','DESC')->paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required',
                'price' => 'required',
                'description' => 'nullable',
                'profit' => 'nullable',
                'supply' => 'nullable',
                'network' => 'nullable',
                'pre_sale' => 'nullable',
            ]
        );
        $nft = new NFTListing();
        if ($request->hasFile('featured_image') and $request->hasFile('images')){
             foreach($request->file('images') as $file)
             {
                 $image = time().'.'.$file->extension();
                 $file->move(public_path().'/nft-images/', $image);
                 $data[] = $image;
             }

            $featured_image = $request->file('featured_image');
            $input['featured_image'] = time().'.'.$featured_image->getClientOriginalExtension();
            $destinationPath = public_path('/nft-images');
            $featured_image->move($destinationPath, $input['featured_image']);

            $nft->name = $request->name;
            $nft->price = $request->price;
            $nft->description = $request->description;
            $nft->profit = $request->profit;
            $nft->supply = $request->supply;
            $nft->network = $request->network;
            $nft->pre_sale = $request->pre_sale;
            $nft->featured_image = $input['featured_image'];
            $nft->images=json_encode($data);
            $nft->save();
            return Response::json(['success'=>'Article created successfully !']);

        }else {

            $nft->name = $request->name;
            $nft->price = $request->price;
            $nft->description = $request->description;
            $nft->profit = $request->profit;
            $nft->supply = $request->supply;
            $nft->network = $request->network;
            $nft->pre_sale = $request->pre_sale;
            $nft->save();
            return Response::json(['success'=>'Article created successfully !']);

        }

    }

    public function show($id){
        if(NFTListing::where('id',$id)->first()){
            return new NFTListingResource(NFTListing::findOrFail($id));
        }else{
            return Response::json(['error'=>'NFT listing not found!']);
        }
    }


}

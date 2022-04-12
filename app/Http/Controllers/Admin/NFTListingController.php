<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NFTListing;
use Illuminate\Http\Request;

class NFTListingController extends Controller
{

    public function index()
    {
        $nfts = NFTListing::paginate(10);
        return view('admin.nfts', compact('nfts'));
    }


    public function create()
    {
        return view('admin.add-nft');
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

                'floor_price' => 'nullable',
                'owners' => 'nullable',
                'asset' => 'nullable',
                'change24' => 'nullable',
            ]
        );
        $nft = new NFTListing();
        if ($request->hasFile('featured_image')){

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

            $nft->floor_price = $request->floor_price;
            $nft->owners = $request->owners;
            $nft->change24 = $request->change24;
            $nft->asset = $request->asset;
            $nft->featured_image = $input['featured_image'];
            $nft->save();
            return redirect()->route('admin.nft.index')->with('success', "NFT Created Successfully");
        }else {
            $nft->name = $request->name;
            $nft->price = $request->price;
            $nft->description = $request->description;
            $nft->profit = $request->profit;
            $nft->supply = $request->supply;
            $nft->network = $request->network;
            $nft->pre_sale = $request->pre_sale;
            $nft->floor_price = $request->floor_price;
            $nft->owners = $request->owners;
            $nft->change24 = $request->change24;
            $nft->asset = $request->asset;
            $nft->save();
            return redirect()->route('admin.nft.index')->with('success', "NFT Created Successfully");

        }

    }

    public function nft_images($id)
    {
        $nft = NFTListing::findOrFail($id);
        return view('admin.add-nft-images', compact('nft'));
    }

    public function nft_gallery(Request $request)
    {
        $id = $request->nft_id;
        $nft = NFTListing::findOrFail($id);

        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($request->hasFile('images')) {
            $imageNameArr = [];
            foreach ($request->images as $file) {
                // you can also use the original name
                $imageName = time().'-'.$file->getClientOriginalName();
                $imageNameArr[] = $imageName;
                // Upload file to public path in images directory
                $file->move(public_path('nft-images'), $imageName);
                // Database operation
            }
            $nft->images = $imageName;
            $nft->save();
            return redirect()->route('admin.nft.index');
        }

    }



    public function show($id)
    {
        $nft = NFTListing::findOrFail($id);
        return view('admin.nft-details', compact('nft'));
    }


    public function edit($id)
    {
       $nft = NFTListing::findOrFail($id);
       return view('admin.nft-edit', compact('nft'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->getData($request);
        $nft = NFTListing::findOrFail($id);
        if ($request->hasFile('featured_image')){
            $featured_image = $request->file('featured_image');
            $input['featured_image'] = time().'.'.$featured_image->getClientOriginalExtension();
            $destinationPath = public_path('/nft-images');
            $featured_image->move($destinationPath, $input['featured_image']);

            $nft->update($data);
            $nft->update(['featured_image' => $input['featured_image']]);
            return redirect()->route('admin.nft.index')->with('updated', "NFT Listing Updated Successfully");
        }else{
            $nft->update($data);
            return redirect()->route('admin.nft.index')->with('updated', "NFT Listing Updated Successfully");
        }

    }


    public function destroy($id)
    {
        $nft = NFTListing::findOrFail($id);
        $nft->delete();
        return redirect()->route('admin.nft.index')->with('deleted', "NFT Listing Deleted Successfully");
    }

    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'description' => 'nullable',
            'profit' => 'nullable',
            'supply' => 'nullable',
            'network' => 'nullable',
            'pre_sale' => 'nullable',

            'floor_price' => 'nullable',
            'owners' => 'nullable',
            'asset' => 'nullable',
            'change24' => 'nullable',
        ];
        return $request->validate($rules);
    }

}

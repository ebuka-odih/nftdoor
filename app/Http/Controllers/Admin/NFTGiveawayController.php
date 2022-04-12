<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NFTGiveaway;
use Illuminate\Http\Request;
use voku\helper\ASCII;

class NFTGiveawayController extends Controller
{

    public function index()
    {
        $nft_giveaway = NFTGiveaway::paginate(10);
        return view('admin.nft-giveaway', compact('nft_giveaway'));
    }

    public function create()
    {
        return view('admin.add-nft-giveaway');
    }


    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required',
                'body' => 'required',
                'start_date' => 'nullable',
                'end_date' => 'nullable',
            ]
        );

        $nft_giveaway = new NFTGiveaway();
        if ($request->hasFile('featured_image'))
        {
            $featured_image = $request->file('featured_image');
            $input['featured_image'] = time().'.'.$featured_image->getClientOriginalExtension();
            $destinationPath = public_path('/nft-giveaway');
            $featured_image->move($destinationPath, $input['featured_image']);

            $nft_giveaway->name = $request->input('name');
            $nft_giveaway->start_date = $request->start_date;
            $nft_giveaway->end_date = $request->end_date;
            $nft_giveaway->body = $request->body;
            $nft_giveaway->featured_image = $input['featured_image'];
            $nft_giveaway->save();
            return redirect()->route('admin.nft-giveaway.index');
        }
        $nft_giveaway->name = $request->input('name');
        $nft_giveaway->body = $request->input('body');
        $nft_giveaway->start_date = $request->start_date;
        $nft_giveaway->end_date = $request->end_date;
        $nft_giveaway->save();
        return redirect()->route('admin.nft-giveaway.index');

    }

    public function show($id)
    {
        $nft_giveaway = NFTGiveaway::findOrFail($id);
        return view('admin.nft-giveaway-details', compact('nft_giveaway'));
    }


    public function edit($id)
    {
        $nft_giveaway = NFTGiveaway::findOrFail($id);
        return view('admin.edit-nft-giveaway', compact('nft_giveaway'));
    }


    public function update(Request $request, $id)
    {
        $nft_giveaway = NFTGiveaway::findOrFail($id);
        $data = $this->getData($request);

        if ($request->hasFile('featured_image'))
        {
            $featured_image = $request->file('featured_image');
            $input['featured_image'] = time().'.'.$featured_image->getClientOriginalExtension();
            $destinationPath = public_path('/nft-giveaway');
            $featured_image->move($destinationPath, $input['featured_image']);

            $nft_giveaway->update($data);
            $nft_giveaway->update(['featured_image' => $input['featured_image']]);
            return redirect()->route('admin.nft-giveaway.index')->with('updated', "NFT Giveaway Updated Successfully");

        }
        $nft_giveaway->update($data);
        return redirect()->route('admin.nft-giveaway.index')->with('updated', "NFT Giveaway Updated Successfully");

    }


    public function destroy($id)
    {
        $nft_giveaway = NFTGiveaway::findOrFail($id);
        $nft_giveaway->delete();
        return redirect()->back();
    }

    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'required',
            'body' => 'required',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
        ];
        return $request->validate($rules);
    }
}

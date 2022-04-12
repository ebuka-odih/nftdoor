<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ToolBoxResource;
use App\Models\ToolBox;
use Illuminate\Http\Request;

class ToolBoxController extends Controller
{
    //
    public function index()
    {
        return ToolBoxResource::collection(ToolBox::orderBy('id','DESC')->paginate(10));

    }

    public function show($id)
    {
        if(ToolBox::where('id',$id)->first()){
            return new ToolBoxResource(ToolBox::findOrFail($id));
        }else{
            return Response::json(['error'=>'NFT Toolbox not found!']);
        }
    }

}

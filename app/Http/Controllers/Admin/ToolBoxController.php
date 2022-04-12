<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ToolBox;
use Illuminate\Http\Request;
use function public_path;
use function redirect;
use function view;

class ToolBoxController extends Controller
{

    public function index()
    {
        $toolbox = ToolBox::paginate(10);
        return view('admin.toolbox', compact('toolbox'));
    }


    public function create()
    {
        return view('admin.add-toolbox');
    }


    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required',
            'body' => 'required',
        ]);
        $toolbox = new ToolBox();
        if ($request->hasFile('featured_image'))
        {
            $featured_image = $request->file('featured_image');
            $input['featured_image'] = time().'.'.$featured_image->getClientOriginalExtension();
            $destinationPath = public_path('/toolbox');
            $featured_image->move($destinationPath, $input['featured_image']);

            $toolbox->title = $request->input('title');
            $toolbox->body = $request->body;
            $toolbox->featured_image = $input['featured_image'];
            $toolbox->save();
            return redirect()->route('admin.toolbox.index');
        }

        $toolbox->title = $request->input('title');
        $toolbox->body = $request->input('body');
        $toolbox->save();
        return redirect()->route('admin.toolbox.index');

    }


    public function show($id)
    {
        $toolbox = ToolBox::findOrFail($id);
        return view('admin.toolbox-details', compact('toolbox'));
    }


    public function edit($id)
    {
        $toolbox = ToolBox::findOrFail($id);
        return view('admin.edit-toolbox', compact('toolbox'));
    }


    public function update(Request $request, $id)
    {
        $toolbox = ToolBox::findOrFail($id);
        $data = $this->getData($request);
        if ($request->hasFile('featured_image'))
        {
            $featured_image = $request->file('featured_image');
            $input['featured_image'] = time().'.'.$featured_image->getClientOriginalExtension();
            $destinationPath = public_path('/toolbox');
            $featured_image->move($destinationPath, $input['featured_image']);

            $toolbox->update($data);
            $toolbox->update(['featured_image' => $input['featured_image']]);
            return redirect()->route('admin.toolbox.index')->with('updated', "Toolbox updated successfully");

        }
        $toolbox->update($data);
        return redirect()->route('admin.toolbox.index')->with('updated', "Toolbox updated successfully");

    }



    public function destroy($id)
    {
        $toolbox = Toolbox::findOrFail($id);
        $toolbox->delete();
        return redirect()->back()->with('deleted', "NFT Toolbox Deleted Successfully");
    }

    protected function getData(Request $request)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required',
        ];
        return $request->validate($rules);
    }
}

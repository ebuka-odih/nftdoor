<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles', compact('articles'));
    }


    public function create()
    {
        $category = Category::all();
        return view('admin.add-article', compact('category'));
    }

    public function store(Request $request)
    {

        $request->validate([
                'title' => 'required',
                'category' => 'required',
                'body' => 'required',
                'featured' => 'required',
//                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
        $article = new Article();
        if ($request->hasFile('image')){

            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);

//            $article = new Article();
            $article->title = $request->title;
//            $article->author_id = Auth::id();
            $article->category_id = $request->category;
            $article->body = $request->body;
            $article->featured = $request->featured;
            $article->image = $input['imagename'];
            $article->save();
            return redirect()->route('admin.article.index');

        }elseif($request->file('image')==NULL){
            $article->image = 'images/placeholder.png';
            $article->save();
            return redirect()->route('admin.article.index');
        } else {
//            $article = new Article();
            $article->title = $request->title;
//            $article->author_id = Auth::id();
            $article->category_id = $request->category;
            $article->body = $request->body;
            $article->featured = $request->featured;
            $article->save();
            return redirect()->route('admin.article.index');

        }

    }


    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article-detail', compact('article'));
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $category = Category::all();
        return view('admin.edit-article', compact('article', 'category'));
    }


    public function update(Request $request, $id)
    {

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);

            $article = Article::findOrfail($id);
            $data = $this->getData($request);
            $article->update($data);
            $article->update(['category_id' => $request->category, 'image'=>$input['imagename']]);
        }
        $article = Article::findOrfail($id);
        $data = $this->getData($request);
        $article->update($data);
        $article->update(['category_id' => $request->category]);
        return redirect()->route('admin.article.index');

    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('admin.article.index')->with('deleted', "Article Deleted Successfully");
    }

    protected function getData(Request  $request)
    {
        $rules = [
            'title' => 'required',
//            'category' => 'nullable',
            'body' => 'required',

        ];
        return $request->validate($rules);
    }



}

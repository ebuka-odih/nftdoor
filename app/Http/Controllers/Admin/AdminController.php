<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\NFTGiveaway;
use App\Models\NFTListing;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $authors = User::where('admin', 1)->count();
        $users = User::where('admin', 0)->count();
        $articles = Article::all()->count();
        $category = Category::all()->count();
        $nft_listing = NFTListing::all()->count();
        $nft_giveaway = NFTGiveaway::all()->count();
        return view('admin.index', compact('users', 'articles', 'category', 'authors', 'nft_listing', 'nft_giveaway'));
    }

    public function users()
    {
        $users = User::where('admin', 0)->get();
        return view('admin.users', compact('users'));
    }

    public function delete_users($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('deleted', "User Deleted Successfully");
    }

    public function paid($id)
    {
        $user = User::findOrFail($id);
        $user->confirm_payment = 1;
        $user->save();
        return redirect()->back()->with('paid', "Payment Made Successfully");
    }

    public function password()
    {
        return view('admin.setting');
    }

    public function store_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],

        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect()->back()->with('success', "Password Changed Successfully");

    }

}

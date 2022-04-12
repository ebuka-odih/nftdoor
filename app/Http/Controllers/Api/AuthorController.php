<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Response;
use Validator;
use Illuminate\Support\Str;
//use Auth;
//use Illuminate\Support\Facades\Auth;


class AuthorController extends Controller {
    // show all the users
    public function index(){
        return AuthorResource::collection(User::orderBy('id','DESC')->paginate(10));
    }

    // check name validation
    public function checkName(Request $request){
        $validators=Validator::make($request->all(),[
            'name'=>'required'
        ]);
        return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
    }

    // check email validation
    public function checkEmail(Request $request){
        $validators=Validator::make($request->all(),[
            'email'=>'required|email|unique:users'
        ]);
        return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
    }

    // check password validation
    public function checkPassword(Request $request){
        $validators=Validator::make($request->all(),[
            'password'=>'required'
        ]);
        return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
    }

// register user
    public function register(Request $request){
        $data = $this->getData($request);
        $author=new User();
        $author->first_name = $data['first_name'];
        $author->last_name = $data['last_name'];
        $author->country = $data['country'];
        $author->email = $data['email'];
        $author->password=bcrypt($request->password);
        $author->api_token=Str::random(80);
        $author->save();
        return Response::json(['success'=>'Registration done successfully !','author'=>$author]);
    }

    // login user
    public function login(Request $request){
        $validators=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                $author=$request->user();
                $author->api_token=Str::random(80);
                $author->save();
                return Response::json(['loggedin'=>true,'success'=>'Login was successfully !','author'=>Auth::user()]);
            }else{
                return Response::json(['loggedin'=>false,'errors'=>'Login failed ! Wrong credentials.'], 401);
            }
        }
    }

    // get authenticated author
    public function getAuthor(){
//        $author = [];
//        $author['first_name'] = Auth::user()->first_name;
//        $author['last_name'] = Auth::user()->last_name;
//        $author['country'] = Auth::user()->country;
//        $author['email'] = Auth::user()->email;
        return Response::json(Auth::user());
    }

    // log the author out
    public function logout(Request $request){
        $author=$request->user();
        $author->api_token=NULL;
        $author->save();
        return Response::json(['message'=>'Logged out!']);
    }

    protected function getData(Request $request)
    {
        $rules = [
            'first_name'=>'required',
            'last_name'=>'required',
            'country'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ];
        $data = $request->validate($rules);
        return $data;
    }



}

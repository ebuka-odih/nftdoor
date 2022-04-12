<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
//use Auth;

//use Auth;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    use HasApiTokens;

    public function register(Request $request)
    {
        Validator::make($request->all(),[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

//        if($validator->fails()){
//            return response()->json($validator->errors());
//        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'country' => $request->country,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        $user->api_token = $token;
        $user->save();
        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', 'author' => $user]);
//        ->json(['data' => $user,'api_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        $user->api_token = $token;
        $user->save();
        return response()
            ->json(['message' => 'Hi '.$user->first_name.' '.$user->last_name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', 'author' => $user]);
//        ->json(['message' => 'Hi '.$user->first_name.' '.$user->last_name.', welcome home','api_token' => $token, 'token_type' => 'Bearer', ]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }



    public function change_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
        ]);

        if (!(Hash::check($request->get('current_password'), auth()->user()->password))) {
            // The passwords matches
            return response()->json('Your current password does not matches with the password you provided. Please try again.', 500);
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            //Current password and new password are same
            return response()->json('New Password cannot be same as your current password. Please choose a different password', 500);
        }

        //Change Password
        $user = auth()->user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return response()->json('success');
    }



    public function currentUser(){
//        return "hello";
        $user = auth()->user();
        return response()->json($user);
    }




}

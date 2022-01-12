<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return user::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		 $check = user::where("email",$request->email)->first();
        if($check == null){
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password != null ? bcrypt($request->password) : bcrypt("tatshop@#unknown");
        $user->level = 0;
        $user->image = $request->image != null ? $request->image : "https://tatshop.tech/image/user.jpg";            
        $user->save();
        }else{
            return abort(403,'Unauthorized action');
        }
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
		 return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
		$user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->update();
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
		$user->delete();
    }
	
	 public function login(Request $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password]))
            return Auth::user();
        else
            return response()->json(["message" => "Not found this account on server"]);
    }

    public function matchesEmail($email)
    {
        return user::where("email", $email)->firstOrFail();
    }
}

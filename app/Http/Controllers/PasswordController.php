<?php

namespace App\Http\Controllers;

use App\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
      //if($tdx=="TDX") {
            $randPass = $this->randomPassword();
            $newpass = new Password();
            $newpass->password = md5($randPass);
            $newpass->save();

          //  dd($request);
            return view('password')->with('randPass',$randPass);
      //  }


    }
//    function shortUrl()
//    {
//        return URL::temporarySignedRoute(
//       'unsubscribe', now()->addSecond(30), ['user' => 1]
//     );
//    }

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function checkpassword(Request $request)
    {
        $data= $request->validate([
           // 'id' => ['required'],

            'password' => ['required'],


        ]);

        // $passwords=Password::all();

        // foreach ($passwords as $pass) {
        //         if (\Hash::check($request->password,$pass->password)) {

        //             $delPass=Password::find($pass->id);
        //             $delPass->delete();
        //             return response()->json(['message' => 'true']);
        //         }

        // }
          if(Password::where("password","=",md5($request->password))->count()>0)
        {
            Password::where("password","=",md5($request->password))->delete();
                   return response()->json(['message' => 'true']);
        }
        return response()->json(['message' => 'false']);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function show(Password $password)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function edit(Password $password)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Password $password)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Password  $password
     * @return \Illuminate\Http\Response
     */
    public function destroy(Password $password)
    {
        //
    }
}
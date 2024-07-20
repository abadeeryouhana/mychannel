<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::get();
        return view('admin.users')->with('users',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user= new User();

            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
         $user->save();


        $msg=" User Added Successfully";

        return redirect(route('user.index'))->withSuccess($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);

        return view('admin.editUser')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],

        ]);
            $user=User::find($id);
        $hashedPassword =$user->password;
   if(!empty($request->oldpassword) || !empty($request->newpassword)) {
       $request->validate([
           'oldpassword' => ['required', 'string', 'min:8'],
           'newpassword' => ['required', 'string', 'min:8'],
       ]);


    if (\Hash::check($request->oldpassword, $hashedPassword)) {
        if (!\Hash::check($request->newpassword, $hashedPassword)) {
            $users = User::find($id);
            $users->password = bcrypt($request->newpassword);
            $users->name=$request->name;
            $users->email=$request->email;
            $users->save();
            //User::where('id', $users->id)->update(array('password' => $users->password));



            $msg="User (".$users->name.") Data Updated Successfully";
            $allusers=User::get();
            return redirect(route('user.index'))->with('users',$allusers)->withSuccess($msg);
        } else {
            session()->flash('message', 'new password can not be the old password!');

        }
    }
    else {
        session()->flash('message', 'old password doesnt matched ');
        return redirect()->back();
    }
}
else
{
    $user->name=$request->name;
    $user->email=$request->email;
    $user->save();

    $msg="User (".$user->name.") Data Updated Successfully";
    $allusers=User::get();
    return redirect(route('user.index'))->with('users',$allusers)->withSuccess($msg);

}




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();

        $msg=" Data Deleted Successfully";
        $allusers=User::get();
        return redirect(route('user.index'))->withSuccess($msg);

    }
}

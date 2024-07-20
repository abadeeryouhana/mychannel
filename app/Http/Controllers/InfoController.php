<?php

namespace App\Http\Controllers;

use App\Info;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos=Info::get();
        return view('admin.info')->with('infos',$infos);
    }
    
     public function infoApi()
    {
        $infos=Info::get();
        if(count($infos))
        {
            return response()->json( $infos);
        }
        else
        {
            return response()->json(['Error'=>'No records found ']);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addInfo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([

            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $info= new Info();

        $info->username = $request['username'];
        $info->password = $request['password'];
        $info->save();


        $msg=" Info Added Successfully";

        return redirect(route('info.index'))->withSuccess($msg);
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
        $info=Info::find($id);


        return view('admin.editInfo')->with('info',$info);
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
            'username' => ['required', 'string', 'max:255'],
            'oldpassword' => ['required', 'string'],

        ]);
        $info = Info::find($id);
   
            $info->username = $request->username;
             $info->password = $request->oldpassword;
            $info->save();
            $msg = "Info (" . $info->username . ") Data Updated Successfully";
           
            return redirect(route('info.index'))->withSuccess($msg);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info=Info::find($id);
        $info->delete();

        $msg=" Data Deleted Successfully";

        return redirect(route('user.index'))->withSuccess($msg);
    }
}

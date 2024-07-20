<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msg=Message::get();

        return view('admin.msg')->with('msg',$msg);
    }
    public function msgApi()
    {
        $msg=Message::get();
        if(count($msg)>0)
        {
            return response()->json( $msg);
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
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $msg=Message::find($id);


        return view('admin.editMsg')->with('msg',$msg);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'message' => ['required', 'string'],
            'version' => ['required']


        ]);

                    $msg = Message::find($id);


        $msg->message = $request->message;
        $msg->version = $request->version;
        $msg->save();
       // dd($msg);
            $msgshow = "Data Updated Successfully";
            //$allusers=Info::get();
            return redirect(route('message.index'))->withSuccess($msgshow);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}

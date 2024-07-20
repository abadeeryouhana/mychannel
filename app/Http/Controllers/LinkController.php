<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $link=Link::get();
        return view('admin.link')->with('links',$link);
    }
    
       public function linkApi()
    {
        $link=Link::get();
        if(count($link))
        {
            return response()->json( $link);
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
        return view('admin.addLink');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data= $request->validate([
            'name' => ['required','string'],
            'link' => ['required'],
            'image' => ['required']

        ]);



        $link =new Link();
        $link->name=$request->name;
        $link->link=$request->link;

        $name ='linkImages/'. rand() . '.' . $request->image->extension();
        $request->image->move( 'linkImages/', $name);
        $link->image=$name;


        $link->save();


        return redirect(route('link.index'))->with('success', 'The Link Added Successfully !');
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
        $link=Link::find($id);

        return view('admin.editLink')->with('link',$link);
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
        $data= $request->validate([
            'name' => ['required','string'],
            'link' => ['required','string'],




        ]);



        $link = Link::find($request->linkid);
        // dd($cat);
        $link->name=$request->name;
        $link->link=$request->link;





        if ($image = $request->image) {


            $name = 'linkImages/'.rand() . '.' . $image->extension();
            $image->move( 'linkImages/', $name);
            //$images[] = $name;


            $link->image = $name;
            $link->save();

        }
        else
        {
            $link->save();
        }


        return  redirect(route('link.index'))->with('success', 'Link ('.$link->name.') Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link=Link::find($id);
        $link->delete();
        $msg="Link (".$link->name.") Deleted Successfully !";
        return redirect()->back()->withSuccess($msg);
    }
}

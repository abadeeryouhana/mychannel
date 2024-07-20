<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads=Ad::get();
        return view('admin.ad')->with('ads',$ads);
    }
    public function adApi()
    {
        $ad=Ad::get();
        //echo empty($channel);
        if(count($ad)>0)
        {
            //var_dump($channel);
            return response()->json( $ad);
            // return response()->json(['Error'=>'No records found with this categoryID']);
        }
        else

        {
            return response()->json(['Error'=>'No records found']);

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
        $ad=Ad::find($id);

        return view('admin.editAd')->with('ad',$ad);
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
            'admob_id' => ['required'],
            'start_app_id' => ['required'],
            'Admob_Ad_Banner' => ['required'],
            'start_Banner' => ['required'],
            'Admob_INTERSTITIAL' => ['required'],
            'start_Admob_INTERSTITIAL' => ['required'],
            'Admob_gift' => ['required'],
            'start_gift' => ['required'],

        ]);
        $ad=Ad::find($id);
        $ad->admob_id=$request->admob_id;
        $ad->start_app_id=$request->start_app_id;
        $ad->Admob_Ad_Banner=$request->Admob_Ad_Banner;
        $ad->start_Banner=$request->start_Banner;
        $ad->Admob_INTERSTITIAL=$request->Admob_INTERSTITIAL;
        $ad->start_Admob_INTERSTITIAL=$request->start_Admob_INTERSTITIAL;
        $ad->Admob_gift=$request->Admob_gift;
        $ad->start_gift=$request->start_gift;
            $ad->save();
        return  redirect(route('ad.index'))->with('success', 'Ad  Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

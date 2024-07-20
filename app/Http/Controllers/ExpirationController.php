<?php

namespace App\Http\Controllers;

use App\Expirationdate;
use Illuminate\Http\Request;

class ExpirationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hours=Expirationdate::get();

        return view('admin.expireddate')->with('hours',$hours);
    }

    public function gethours()
    {
        $hour=Expirationdate::get();
        if(count($hour)>0)
        {
            return response()->json($hour);
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
        return view('admin.addExpireddate');
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
            'hours' => ['required','integer'],


        ]);



        $hours =new Expirationdate();
        $hours->hours=$request->hours;



        $hours->save();


        return redirect(route('expirationhours.index'))->with('success', 'The Expiration hours Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hours=Expirationdate::find($id);

        return view('admin.editExpireddate')->with('hours',$hours);
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
            'hours' => ['required','integer'],


        ]);

        $hours = Expirationdate::find($request->hourid);
        $hours->hours=$request->hours;
          $hours->save();


        return  redirect(route('expirationhours.index'))->with('success', 'The Expiration hours Updated Successfully !');
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

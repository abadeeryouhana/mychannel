<?php

namespace App\Http\Controllers;

use App\SubCategory1;
use App\Category;
use Illuminate\Http\Request;

class SubCategory1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcat=SubCategory1::with('category')->get();
        // dd($subcat);
        return view('admin.subcategory1')->with('subcategory1s',$subcat);
    }
    
      public function get_sub1_api($id)
    {
        $cats=SubCategory1::where('main_cat','=',$id)->orderBy('created_at', 'DESC')->get();
    
            return response()->json($cats);
      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Category::get();
        return view('admin.addSubCategory1')->with('cats',$cats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);



        $data= $request->validate([
            'name' => ['required','string'],
            'category' => ['required'],
            'image' => ['required']

        ]);



        $subcat =new SubCategory1();
        $subcat->name=$request->name;

        $subcat->main_cat=$request->category;

        $name ='sub_cat1_images/'. rand() . '.' . $request->image->extension();
        $request->image->move( 'sub_cat1_images/', $name);
        $subcat->image=$name;


        $subcat->save();


        return redirect(route('subcategory1.index'))->with('success', 'The Sub Category1 Added Successfully !');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory1  $subCategory1
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory1 $subCategory1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory1  $subCategory1
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcat=SubCategory1::with('category')->find($id);
        $cats=Category::get();
        return view('admin.editSubcategory1')->with('cats',$cats)->with('subcat',$subcat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory1  $subCategory1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data= $request->validate([
            'name' => ['required','string'],
        ]);
        ;


        $subcat = SubCategory1::find($request->subcatid);
        // dd($cat);
        $subcat->name=$request->name;

        $name=$subcat->image;
        if($request->category)
        {
            $subcat->main_cat=$request->category;
        }


        if ($image = $request->image) {


            $name = 'sub_cat1_images/'.rand() . '.' . $image->extension();
            $image->move( 'sub_cat1_images/', $name);
            //$images[] = $name;


            $subcat->image = $name;


        }


   
        $subcat->save();

        return  redirect(route('subcategory1.index'))->with('success', 'Sub Category ('.$subcat->name.') Updated Successfully !');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory1  $subCategory1
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcat=SubCategory1::find($id);
        $subcat->delete();
        $msg="Sub Category (".$subcat->name.") Deleted Successfully !";
        return redirect()->back()->withSuccess($msg);
    }
}

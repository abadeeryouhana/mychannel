<?php

namespace App\Http\Controllers;

use App\SubCategory2;
use App\SubCategory1;
use App\Category;
use Illuminate\Http\Request;

class SubCategory2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcat=SubCategory2::with('sub_category')->get();
        // dd($subcat);
        return view('admin.subcategory2')->with('subcategory2s',$subcat);
    }

      public function get_sub2_api($id)
    {
        $cats=SubCategory2::where('sub_cat','=',$id)->orderBy('created_at', 'DESC')->get();
    
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
        return view('admin.addSubCategory2')->with('cats',$cats);
    }

    public function get_sub_cats(Request $request)
    {
        
        $main_cat = $request->input('main_cat');
        $subcat=SubCategory1::where('main_cat','=',$main_cat)->with('category')->get();
       
        return response()->json(['subcat' => $subcat]);
    }

    public function get_sub_cats2(Request $request)
    {
        
        $sub_cat1 = $request->input('sub_cat1');
        $subcat=SubCategory2::where('sub_cat','=',$sub_cat1)->get();
       
        return response()->json(['subcat' => $subcat]);
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
            'sub_category' => ['required'],
            'image' => ['required']

        ]);



        $subcat =new SubCategory2();
        $subcat->name=$request->name;

        $subcat->sub_cat=$request->sub_category;

        $name ='sub_cat2_images/'. rand() . '.' . $request->image->extension();
        $request->image->move( 'sub_cat2_images/', $name);
        $subcat->image=$name;


        $subcat->save();


        return redirect(route('subcategory2.index'))->with('success', 'The Sub Category2 Added Successfully !');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory2  $subCategory2
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory2 $subCategory2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory2  $subCategory2
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcat=SubCategory2::with('sub_category')->find($id);
        $cats=Category::get();
        return view('admin.editSubcategory2')->with('cats',$cats)->with('subcat',$subcat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory2  $subCategory2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data= $request->validate([
            'name' => ['required','string'],
            'sub_category' => ['required'],
        ]);
        ;


        $subcat = SubCategory2::find($request->subcatid);
        // dd($cat);
        $subcat->name=$request->name;

        $name=$subcat->image;
        if($request->sub_category)
        {
            $subcat->sub_cat=$request->sub_category;
        }


        if ($image = $request->image) {


            $name = 'sub_cat2_images/'.rand() . '.' . $image->extension();
            $image->move( 'sub_cat2_images/', $name);
            //$images[] = $name;


            $subcat->image = $name;


        }


   
        $subcat->save();

        return  redirect(route('subcategory2.index'))->with('success', 'Sub Category ('.$subcat->name.') Updated Successfully !');
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory2  $subCategory2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcat=SubCategory2::find($id);
        $subcat->delete();
        $msg="Sub Category (".$subcat->name.") Deleted Successfully !";
        return redirect()->back()->withSuccess($msg);
    }
}

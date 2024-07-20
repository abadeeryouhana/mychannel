<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat=Category::get();
        return view('admin.category')->with('categories',$cat);
    }
   
    public function indexApi()
    {
        $cat=Category::get();
        if(count($cat))
        {
            return response()->json( $cat);
        }
        else
        {
            return response()->json(['Error'=>'No records found ']);

        }



    }
    
      public function checkpassApi(Request $request)
    {
        $data= $request->validate([
            'id' => ['required'],

            'password' => ['required'],


        ]);

        $cat=Category::find($request->id);
        if($cat) {

            if ($cat->ispassword == '1') {

                if (\Hash::check($request->password, $cat->password)) {
                    
                    return response()->json(['message'=>'true']);
                } else {
                    return response()->json(['message'=>'false ']);

                }
            } else {
                return response()->json(['Error'=>'this category not have a password ']);
            }
        }
        else
        {
            return response()->json($cat);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addCategory');
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

            'image' => ['required'],


        ]);
            $checkbox=$request->checkpass;
        $password="null";
        $ispass="0";
        if($checkbox=='on')
        {
            $data= $request->validate([

                  'pass' => ['required']
            ]);
            $password=Hash::make($request['pass']);
            $ispass="1";
        }








        $cat =new Category();
        $cat->name=$request->name;
        $cat->password= $password;
        $cat->ispassword=$ispass;

        $name ='categoryImages/'. rand() . '.' . $request->image->extension();
        $request->image->move( 'categoryImages/', $name);
        $cat->image=$name;


        $cat->save();


        return redirect(route('category.index'))->with('success', 'The Category Added Successfully !');
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
        $cat=Category::find($id);

        return view('admin.editCategory')->with('cat',$cat);
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
       // dd($request);

        $data= $request->validate([
            'name' => ['required','string'],

        ]);



        $cat = Category::find($request->categoryid);
        //dd($request);
        $cat->name=$request->name;



        $checkbox=$request->checkpass;
        $newpassword="null ";


        if ($checkbox == 'on') {

                $data = $request->validate([

                    'newpass' => ['required']
                ]);
                $newpassword = Hash::make($request['newpass']);
                $cat->password = $newpassword;

                $cat->ispassword = '1';


            }
         else
        {
            if (!$checkbox) {
                $cat->password = $newpassword;

                $cat->ispassword = '0';
            }
        }




        if ($image = $request->image) {


            $name = 'categoryImages/'.rand() . '.' . $image->extension();
            $image->move( 'categoryImages/', $name);
            //$images[] = $name;


            $cat->image = $name;
            $cat->save();

        }
        else
        {
            $cat->save();
        }


        return  redirect(route('category.index'))->with('success', 'Category ('.$cat->name.') Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat=Category::find($id);
        $cat->delete();
        $msg="Category (".$cat->name.") Deleted Successfully !";
        return redirect()->back()->withSuccess($msg);
    }
}

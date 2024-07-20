<?php

namespace App\Http\Controllers;

use App\Category;
use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $channel=Channel::orderBy('arr', 'ASC')->with('category','subcategory1','subcategory2')->get();

        return view('admin.channel')->with('channels',$channel);
    }
    public function channelApi($id)
    {
        $channel=Channel::where('cat_id','=',$id)->orderBy('arr', 'ASC')->get();
       //echo empty($channel);
        // if(count($channel)>0)
        // {
            //var_dump($channel);
            
            
            return response()->json( $channel);
           // return response()->json(['Error'=>'No records found with this categoryID']);
        // }
        // else

        //     {
        //         return response()->json(['Error'=>'No records found with this categoryID']);

        //     }

    }
    public function channelApi_test($id)
    {
        $channel=Channel::where('cat_id','=',$id)->orderBy('arr', 'ASC')->get();

            for($i=0;$i<sizeof($channel);$i++)
            {
                $channel[$i]['image']="https://tech4app.xyz/mychannel/public/".$channel[$i]['image'];
            }
            return response()->json( $channel);
         

    }
    
      public function channelApi2($id)
        {
            // $channel=Channel::where('sub_cat_2','=',$id)->orderBy('arr', 'ASC')->get();
            $channel=Channel::where('sub_cat_2','=',$id)->orderBy('created_at', 'DESC')->get();
             for($i=0;$i<sizeof($channel);$i++)
                {
                    if($channel[$i]['check']==0)
                    {
                         $channel[$i]['image']="https://tech4app.xyz/mychannel/public/".$channel[$i]['image'];
                    }
                    else
                    {
                        $channel[$i]['image']=$channel[$i]['image_url'];
                    }
                   
                }
        
                return response()->json( $channel);
    
    
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cats=Category::get();
        return view('admin.addChannel')->with('cats',$cats);
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
            'subcategory1' => ['required'],
            'subcategor2' => ['required'],
            'link' => ['required'],
            //'image' => ['required']

        ]);



        $ch =new Channel();
        $ch->name=$request->name;
        $ch->link=$request->link;
        if($request->arr){
            $ch->arr=$request->arr;
        }
        //$ch->arr="0";
        $ch->cat_id=$request->category;
        $ch->sub_cat_1=$request->subcategory1;
        $ch->sub_cat_2=$request->subcategor2;

        if(!isset($request->check))
        {
            $name ='channelImages/'. rand() . '.' . $request->image->extension();
            $request->image->move( 'channelImages/', $name);
            $ch->image=$name;
            $ch->image_url='404';
            $ch->check=0;
        }
        else
        {
            $ch->image='404';
            $ch->image_url=$request->image_url;
            $ch->check=1;
        }

       $lastarr=Channel::select('arr')->orderBy('arr','desc')->limit(1)->get();
     //  dd($lastarr);
        foreach ($lastarr as $ob){
            $ch->arr=$ob->arr+1;
        }


        $ch->save();


        return redirect(route('channel.index'))->with('success', 'The Channel Added Successfully !');
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
        $ch=Channel::with('category')->find($id);
        $cats=Category::get();
        $channels=Channel::get();
        return view('admin.editChannel')->with('ch',$ch)->with('cats',$cats)->with('channels',$channels);
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
            'subcategory1' => ['required'],
            'subcategor2' => ['required'],
            'link' => ['required'],




        ]);
        


        $ch = Channel::find($request->channelid);
        // dd($cat);
        $ch->name=$request->name;
        $ch->link=$request->link;
        $name=$ch->image;
        if($request->category)
        {
            $ch->cat_id=$request->category;
        }

        $ch->sub_cat_1=$request->subcategory1;
        $ch->sub_cat_2=$request->subcategor2;
        
        if (isset($request->image) && !isset($request->check)) {

            // dd("here");
            $image = $request->image;
            $name = 'channelImages/'.rand() . '.' . $image->extension();
            $image->move( 'channelImages/', $name);
            //$images[] = $name;


            $ch->image = $name;

            $ch->image_url='404';
            $ch->check=0;
        }
        else if( !isset($request->image) && !isset($request->check)){
            // dd("here1");
             $ch->image_url='404';
            $ch->check=0;
        }
        else
        {
            // dd("here2");
            $ch->image='404';
            $ch->image_url=$request->image_url;
            $ch->check=1;
        }

        // dd($request);
       // dd($allarr);
        if( $ch->arr!=$request->arr)
        {

 if( $request->arr > $ch->arr )
            $allarr=Channel::whereBetween('arr',[$ch->arr,$request->arr])->get();
 if($request->arr < $ch->arr)
     $allarr=Channel::whereBetween('arr',[$request->arr,$ch->arr])->get();

            if(count($allarr)) {

                foreach ($allarr as $chArr)
                {
                    if( $chArr->arr > $request->arr)
                    {
                        //dd($chArr->arr);
                        DB::update('update channells set arr =arr+ 1 where id= ?',[$chArr->id]);


                    }
                   if( $chArr->arr < $request->arr)
                        {


                                DB::update('update channells set arr =arr- 1 where id= ?',[$chArr->id]);


                        }

                   if($chArr->arr == $request->arr) {
                     //  echo $request->arr ."  ". $ch->arr;
                       if ($request->arr > $ch->arr) {
                           DB::update('update channells set arr =arr- 1 where id= ?', [$chArr->id]);
                       }
                       if ($request->arr < $ch->arr) {
                           DB::update('update channells set arr =arr+ 1 where id= ?', [$chArr->id]);
                       }
                   }



                }


                DB::update('update  channells set arr=? where id= ?', [$request->arr,$request->channelid]);
            }
            else
            {
                $ch->arr=$request->arr;
            }

        }
   
        $ch->save();

        return  redirect(route('channel.index'))->with('success', 'Channel ('.$ch->name.') Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ch=Channel::find($id);
        $ch->delete();
        $msg="Channel (".$ch->name.") Deleted Successfully !";
        return redirect()->back()->withSuccess($msg);
    }
}

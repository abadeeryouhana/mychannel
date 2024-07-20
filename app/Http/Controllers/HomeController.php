<?php

namespace App\Http\Controllers;
use App\Channel;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=User::get();

        return view('admin.users')->with('users',$user);
    }

   
    public function fcmIndex()
    {
        $channels=Channel::get();

        return view('admin.fcm')->with('channels',$channels);
    }

      public function fcm(Request $request)
    {

       // dd($request);
//        $data= $request->validate([
//            'title' => ['required'],
//            'message' => ['required'],
//            'image' => ['required'],
//            'link' => ['required']
//
//        ]);

        if($request->check=="on")
        {
            $is_channel=true;

        }
        else
        {
            $is_channel=false;

        }
    // dd( $is_channel);
        $channel_link="";
        if($request->channellink)
        {
            $channel_link=$request->channellink;
        }
        if($request->customlink)
        {
            $channel_link=$request->customlink;
        }

        // required headers
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// get posted data
        //$data = json_decode(file_get_contents("php://input"));
        $data=$request;
// make sure data is not empty
//echo $data->title."  ". $data->message."  " .$request->_token." " .$channel_link."  ".$data->image."  ".$is_channel ;
        if(!empty($data->title))
        {

            $url = "https://fcm.googleapis.com/fcm/send";
            $token = "matches"; //"your device token";
            $topic = "/topics/$token";
           // $serverKey ='AAAAZlLdAkU:APA91bH6kJ1oKq3JiwrRpZ2wTiUas2N0eQJBGRg0FfHi6zostJAasJD2-DVEIKXi1rZisoukjo8URsye8c_E222iiSF2W_x7cwBswo6_RgaWns7nEd4hKwNa0K9ppSvUAMaPZe3MjOUj';
            // $serverKey ='AAAANpnyo74:APA91bEXKOAM9JZACk1j4rcSROMesvR144eeiCr0FRRP8tpUkCBuUy9_cg6VS1qjt5OeJ_W0i3iUzpwsRSFrlMGR7Wp5OtLRnc1l-ggig2RkXPyzNQcQKeq_R7tootR7zvUk8kV0_ScK';
              $serverKey ='AAAAZlLdAkU:APA91bH6kJ1oKq3JiwrRpZ2wTiUas2N0eQJBGRg0FfHi6zostJAasJD2-DVEIKXi1rZisoukjo8URsye8c_E222iiSF2W_x7cwBswo6_RgaWns7nEd4hKwNa0K9ppSvUAMaPZe3MjOUj';
		$title =$data->title;
            $body = $data->message;
            $image=$data->image;
            //data


            $notification = array('title' =>$title  , 'body' => $body, 'imageUrl' => $image,'icon' => $image, 'sound' => 'default', 'badge' => '1','channel_link' => $channel_link, 'ischannel'=>$is_channel);
            $data= array('channel_link' => $channel_link, 'ischannel'=>$is_channel);

            $arrayToSend = array('to' => $topic, 'data' => $notification,'priority'=>'high');
            $json = json_encode($arrayToSend);


            // print_r($json);
            // die;
            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: key='. $serverKey;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
            $response = curl_exec($ch);
            
            // print_r($response);
            if ($response === FALSE) {
                http_response_code(503);
                echo json_encode(array("status" => "error", "code" => 0,"message"=> "Failed to send notification","document"=> curl_error($ch)));

            }
            curl_close($ch);
            http_response_code(201);
            $noti= array('title' =>$title , 'body' => $body,'click_action'  => "OPEN_ACTIVITY_1" );
            $data= array('someData' =>"someData" , 'someData2' => "someData" );
            $myData  = array("to"=>$topic,
                "notification" =>$noti,
                "data"   => $data
            );
              return redirect(route('fcm.index'))->with('success', 'Notification Sent Successfully !');
            //echo  json_encode($myData);
        }
        else{

            http_response_code(400);
            echo json_encode(array("status" => "error", "code" => 0,"message"=> "Data is incomplete.","document"=> ""));
        }

    }
}

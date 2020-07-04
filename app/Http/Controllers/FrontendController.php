<?php

namespace App\Http\Controllers;

use App\Model\Post;
use App\Model\Video;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $data = [];
        $data['posts'] = Post::where('status',1)->orderBy('id','DESC')->get();
        $data['post_videos'] = Video::where('status',1)->orderBy('id','DESC')->get();
        return view('frontend.index',$data);
    }

    public function detailsVideo($id){
        $data = [];
        $data['details'] = Video::find( $id );
        return view('frontend.video_details',$data);
    }

     public function detailsPost($id){
        $data = [];
        $data['details'] = Post::find( $id );
        return view('frontend.post_details',$data);
    }
}

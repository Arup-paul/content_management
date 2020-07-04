<?php

namespace App\Http\Controllers;

use App\Model\Video;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller {
    public function index() {
        $data           = [];
        $data['videos'] = Video::all();
        return view( 'backend.videos.index', $data );
    }

    public function create() {
        return view( 'backend.videos.create' );
    }

    public function store( Request $request ) {
        $Validator = Validator::make( $request->all(), [
            'title' => 'required|unique:videos',
            'video_embed' => 'required|unique:videos',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'section' => 'required',
            'status' => 'required',
        ] );

        if ( $Validator->fails() ) {
            return redirect()->back()->withErrors( $Validator )->withInput();
        }

        $data              = new Video();
        $data->title       = $request->title;
        $data->slug       = str_replace(' ', '_',$request->title);
        $data->video_embed = $request->video_embed;
        $data->description = $request->description;
        $data->section     = $request->section;
        $data->status      = $request->status;
        if ( $request->file( 'image' ) ) {
            $file     = $request->file( 'image' );
            $filename = date( 'YmdHi' ) . $file->getClientOriginalName();
            $file->move( public_path( 'upload/videos' ), $filename );
            $data['image'] = $filename;
        }
        $data->save();
        session()->flash( 'type', 'success' );
        session()->flash( 'message', 'post Video Added' );
        return redirect()->route( 'view.video' );
    }

      public function publishPostVideo($id) {
        $data =  Video::find($id);
        $data->status = 1;
        $data->save();
        session()->flash( 'type', 'success' );
        session()->flash( 'message', ' Published video Post' );
        return redirect()->back();
    }
     public function unpublishPostVideo($id) {
        $data =  Video::find($id);
        $data->status = 0;
        $data->save();
        session()->flash( 'type', 'success' );
        session()->flash( 'message', ' UnPublished Post Video' );
        return redirect()->back();
    }
     public function deleteVideo($id){
      $data = Video::find($id);
      if(file_exists('public/upload/videos'.$data->image)){
          unlink('public/upload/videos'.$data->image);
      }
      $data->delete();
      session()->flash( 'type', 'success' );
      session()->flash( 'message', 'Video Post Deleted' );
      return redirect()->back();
   }
}

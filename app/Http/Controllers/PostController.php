<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller {
    public function index() {
        $data          = [];
        $data['posts'] = Post::all();
        return view( 'backend.posts.index', $data );
    }

    public function create() {
        return view( 'backend.posts.create' );
    }

    public function store( Request $request ) {
        $Validator = Validator::make( $request->all(), [
            'title' => 'required|unique:posts',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'section' => 'required',
            'status' => 'required',
        ] );

        if ( $Validator->fails() ) {
            return redirect()->back()->withErrors( $Validator )->withInput();
        }

        $data              = new Post();
        $data->title       = $request->title;
        $data->description = $request->description;
        $data->section     = $request->section;
        $data->status      = $request->status;
        if ( $request->file( 'image' ) ) {
            $file     = $request->file( 'image' );
            $filename = date( 'YmdHi' ) . $file->getClientOriginalName();
            $file->move( public_path( 'upload/posts' ), $filename );
            $data['image'] = $filename;
        }
        $data->save();
        session()->flash( 'type', 'success' );
        session()->flash( 'message', 'post Added' );
        return redirect()->route( 'view.post' );
    }

    public function publishPost($id) {
        $data =  Post::find($id);
        $data->status = 1;
        $data->save();
        session()->flash( 'type', 'success' );
        session()->flash( 'message', 'post Published' );
        return redirect()->back();
    }
     public function unpublishPost($id) {
        $data =  Post::find($id);
        $data->status = 0;
        $data->save();
        session()->flash( 'type', 'success' );
        session()->flash( 'message', 'post Un Published' );
        return redirect()->back();
    }
     public function deletePost($id){
      $data = Post::find($id);
      if(file_exists('public/upload/posts'.$data->image)){
          unlink('public/upload/posts'.$data->image);
      }
      $data->delete();
      session()->flash( 'type', 'success' );
      session()->flash( 'message', 'Post Deleted' );
      return redirect()->back();
   }
}

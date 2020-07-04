
@extends('backend.layouts.master')


@section('main_content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Posts
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Posts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @if (session()->has('message'))

   <div class="alert alert-success">
           {{session('message')}}
       </div>

       @endif
    <div class="box">
            <div class="box-header">
            <h3 class="box-title"><a class="btn btn-primary" href="{{route('create.post')}}">Add Post</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Section</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($posts as $key => $post)
                <tr>
                <td>{{$key+1}}</td>
                <td>{{$post->title}}</td>
                <td><img src="{{URL::to('upload/posts/'.$post->image)}}" alt="" width="100px" height="100px"></td>
                <td>
                    @if($post->section ==2)
                     Section 2
                     @endif
                </td>
                <td>
                    @if($post->status ==1)
                    <span class="btn btn-success">Publish</span>
                     @elseif($post->status ==0)
                     <span class="btn btn-danger">UnPublish</span>
                    @endif
                </td>
                <td>
                    @if($post->status ==1)
                <a href="{{route('unpublish.post',$post->id)}}" class="btn btn-success"><i class="fa fa-thumbs-down"></i></a>
                     @elseif($post->status ==0)
                     <a href="{{route('publish.post',$post->id)}}" class="btn btn-danger"><i class="fa fa-thumbs-up"></i></a>
                    @endif

                    <a onclick="alert('Are Your Sure Delete')" href="{{route('delete.post',$post->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
                </tr>
                @endforeach


              </table>
            </div>
            <!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
@endsection

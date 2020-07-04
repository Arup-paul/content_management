
@extends('backend.layouts.master')


@section('main_content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Posts(Video)
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Posts(Video)</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

         <div class="box box-primary">
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if ($errors->any())
                 <div class="alert alert-danger">
                    @if ($errors->count() == 1)
                    {{$errors->first()}}
                    @else
             <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
             @endforeach
            </ul>
          @endif
          </div>
          @endif

              @if (session()->has('message'))

   <div class="alert alert-success">
           {{session('message')}}
       </div>

       @endif
        <form role="form" action="{{route('create.video')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="title">Video Title</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Enter Video Title">
                </div>

                <div class="form-group">
                  <label for="title">Youtube Embeded Code</label>
                <input type="text" name="video_embed" value="{{old('video_embed')}}" class="form-control" id="title" placeholder="Enter Youtube embed code">
                </div>

                <div class="form-group">
                  <label for="image">Upload Image</label>
                  <input type="file" name="image" id="image">
                </div>
                <textarea id="editor1" name="description" value="{{old('description')}}" name="editor1" rows="10" cols="80" placeholder="Post Description">
                </textarea>
                <div class="form-group">
                    <label for="section">Section</label>
                    <select name="section" class="form-control" id="section">
                         <option value="">Select Section</option>
                         <option value="1">Section 1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="section">Status</label>
                    <select name="status" class="form-control" id="section">
                         <option value="">Select Status</option>
                         <option value="1">Publish</option>
                         <option value="0">UnPublish</option>
                    </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Post(video)</button>
              </div>
            </form>
          </div>

    </section>
    <!-- /.content -->
@endsection

@extends('frontend.layouts.master')



@section('content')

 <div class="container">
            <div class="col-md-6 offset-md-3">
                <div class="details-content">
                    <div class="details-title">
                    <h2>{{$details->title}}</h2>
                    </div>
                    <div class="details-img">
                    <img src="{{URL::to('upload/posts/'.$details->image)}}" alt="">
                    </div>

                    <div class="details-des">
                    <p>{!! html_entity_decode($details->description) !!}</p>
                    </div>

                    <div class="share text-center">                       
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>
                               
                    </div>

                </div>
            </div>
        </div>


@endsection

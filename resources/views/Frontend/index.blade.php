@extends('frontend.layouts.master')

@section('content')
	   <div class="container">
		   <div class="row">

			   <div class="col-md-8 col-12">
                  <div class="left-section">
					  <div class="title">
						  <h2>Section 1</h2>
					  </div>
					  <div class="row">
                              <div class="col-md-6 col-12">
                                  @foreach($post_videos as $post_video)
                                  @if($loop->first)
							  <div class="content">
								  <div class="single-content">
									  <div class="single-content-image-area">
										<div class="single-content-image">
											<a href="{{route('video.details',$post_video->id)}}"><img src="{{URL::to('upload/videos/'.$post_video->image)}}" alt="img"></a>
										</div>
										<div class="video-icon">



											 <a class="" href="#video1" id="{{$post_video->slug}}"><span
													 class="fa fa-caret-square-o-right"></span></a>

													 <div  id="video1" class="mfp-hide popup-video" style="max-width:60%;margin:0 auto;">
														 <iframe  src="{{$post_video->video_embed}}" frameborder="0"
														 	allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
														 	allowfullscreen></iframe>
													</div>
										</div>
									  </div>

									  <div class="single-content-details">
                                      <h2><a href="{{route('video.details',$post_video->id)}}">{{$post_video->title}}</a></h2>
										    <p>{!! html_entity_decode($post_video->description)!!}</p>
									  </div>
                                  </div>

                              </div>
                              @endif
                              @endforeach
                          </div>

						  <div class="col-md-6 col-12">
							  <div class="row">
                                  @foreach($post_videos as $postvideo)
                                  @if($loop->first)
                                  @else
								  <div class="col-md-6 col-6">
									<div class="content">
										<div class="single-content">
											<div class="single-content-image-area">
												<div class="single-content-image">
                                                <a href="{{route('video.details',$postvideo->id)}}"><img src="{{URL::to('upload/videos/'.$postvideo->image)}}" alt="img"></a>
												</div>
												<div class="video-icon-simple">
                                                <a  href="#video1" id="{{$postvideo->slug}}"><span class="fa fa-caret-square-o-right"></span></a>

													  <div id="video1" class="mfp-hide popup-video" style="max-width:60%;margin:0 auto;">
													  	<iframe src="{{$postvideo->video_embed}}" frameborder="0"
													  		allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
													  		allowfullscreen></iframe>
													  </div>
												</div>
											</div>

											<div class="single-content-details">
                                            <h2><a href="{{route('video.details',$postvideo->id)}}">{{$postvideo->title}}</a></h2>
											</div>
										</div>
									</div>
                                  </div>
                                  @endif
                                  @endforeach

							  </div>
						  </div>
					  </div>
				  </div>
			   </div>

			   <div class="col-md-4 col-12">
				   <div class="right-section">
						<div class="title">
							<h2>Section 2</h2>
						</div>
						<div class="content">

                          @foreach($posts as $post)
                           @if ($loop->first)
							<div class="single-content">
								<div class="single-content-image-area">
									<div class="single-content-image">
										<a href="{{route('post.details',$post->id)}}"><img src="{{URL::to('upload/posts/'.$post->image)}}" alt="img"></a>
									</div>
								</div>

								<div class="single-content-details">
                                <h2><a href="{{route('post.details',$post->id)}}">{{$post->title}}</a></h2>
									<p>{!! html_entity_decode($post->description) !!}</p>
								</div>
                            </div>
                          @endif
                         @endforeach
						</div>

						<div class="row">
                              @foreach($posts as $post)
                           @if ($loop->first)
                           @else
							<div class="col-md-6 col-6">
								<div class="content">
									<div class="single-content">
										<div class="single-content-image-area">
											<div class="single-content-image">
												<a href=""><img src="{{URL::to('upload/posts/'.$post->image)}}" alt="img"></a>
											</div>
										</div>

										<div class="single-content-details">
											<h2><a href="#">{{$post->title}}</a></h2>
										</div>
									</div>
								</div>
                            </div>
                            @endif
                            @endforeach

						</div>

				   </div>
			   </div>

		   </div>
	   </div>
 @endsection

 @section('script')
 <script>

       @foreach($post_videos as $postvideo)
		$('#{{$postvideo->slug}}').magnificPopup({

			type:'inline',
			midClick:true,
			mainClass: 'mfp-fade',
		});
        @endforeach




</script>
 @endsection

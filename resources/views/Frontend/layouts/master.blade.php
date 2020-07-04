<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tiny Content ManageMent  System</title>
	 <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
	 <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font-awesome.min.css')}}">
	 <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/magnefic-popup.css')}}">
	 <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
	 <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">
</head>
<body>

 <!-- Header Area Start -->
 <header class="header-area">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-6">
					<div class="logo">
						<h2><a href="{{route('frontend.index')}}">Ready Mart</a>  </h2>
					</div>
				</div>
				<div class="col-md-6 col-6">
					<div class="main-menu">
							<ul>
								<li><a href="{{route('frontend.index')}}">Home</a></li>
							</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
 </header>
 <!-- Header Area End -->



 <!-- Main section start -->
 <section class="main-section">
	  @yield('content')
 </section>
 <!-- Main section End -->


 <!-- footer area -->
 <footer class="footer-area">
	 <div class="container">
	 	<div class="footer">
	 		<p>All Right Reserved &copy; Arup Paul</p>
	 	</div>
	 </div>
 </footer>






<!-- Go to www.addthis.com/dashboard to customize your tools -->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f0010f3ac5080cb"></script>


<script src="{{asset('frontend/js/jquery.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/popper.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/magnefic-popup.min.js')}}"></script>

@yield('script')



</body>
</html>

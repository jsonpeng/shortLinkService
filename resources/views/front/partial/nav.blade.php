<header>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
			    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" href="#">
					<img src="{{asset('images/logo.png')}}" alt="">
			    </a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    	<ul class="nav navbar-nav navbar-right">

		    		@foreach($menus as $item)
		    		@if(!$item->children->count())
		    		<li class="{{ Request::fullUrl() == $item->link ? 'show' :''}}">
		    			<a href="{!! $item->link !!}" class="">
		    				<span>{!! $item->name !!}</span>
		    				<span class="hidden-xs">{!! get_en_name($item->name) !!}</span>
		    				<!-- <p class="line-top hidden-xs"></p> -->
		    			</a>
		    		</li>
		   			@else
	   			 		<li class="dropdown {{ Request::fullUrl() == $item->link ? 'show' :''}}">
				          	<a href="{!! $item->link !!}" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">
				          		<span>{!! $item->name !!}</span>
		    					<span class="hidden-xs">{!! get_en_name($item->name) !!}</span>
				          	</a>
					        <ul class="dropdown-menu hidden-xs">
					        	@foreach ($item->children as $child)
						            <li><a href="{!! $child->link !!}">{!! $child->name !!}</a></li>
					            @endforeach
					        </ul>
				        </li>
		   			@endif
		    		@endforeach
		    	</ul>
		    </div>
	    </div>
	</nav>
</header>

@if(count($banners))
	<!-- <div class="banner">
		<div class="swiper-container banner-slide">
			<div class="swiper-wrapper">
				@foreach ($banners as $item)
					<div class="swiper-slide" style="width:auto">
						<img src="{!! $item->image !!}" alt="" class="img-responsive">
					</div>
				@endforeach
			</div>
			<div class="swiper-pagination"></div>
		</div>
		<div class="swiper-pagination"></div>
	</div> -->
	<div id="carousel-example-generic0" class="carousel slide banner-slide" data-ride="carousel">
	  	<!-- Indicators -->
	  	<ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic0" data-slide-to="0" ></li>
		    <li data-target="#carousel-example-generic0" data-slide-to="1" class="active"></li>
		    <li data-target="#carousel-example-generic0" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<!-- <div class="item">
				<img src="{{asset('images/banner1.jpg')}}" alt="">
			</div>
			<div class="item active">
				<img src="{{asset('images/banner2.jpg')}}" alt="">
			</div>
			<div class="item">
				<img src="{{asset('images/banner3.jpg')}}" alt="">
			</div> -->
			<?php $num = 0;?>
			@foreach ($banners as $item)
			<?php $num++; ?>
				@if($num==1)
				<div class="item active">
					<img src="{!! $item->image !!}" alt="">
				</div>
				@else
				<div class="item">
					<img src="{!! $item->image !!}" alt="">
				</div>
				@endif
			@endforeach
	  	</div>
	</div>
	<div class="slide-handle  hidden-xs">
		<span></span>
	</div>
@endif
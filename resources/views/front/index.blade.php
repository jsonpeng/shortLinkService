@extends('front.partial.base')

@section('css')
	
@endsection

@section('seo')
	<title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
@endsection

@section('content')
	@if(!empty($about))
	<div class="intro">
		<div class="container-fluid">
			<div class="mask"></div>
			<div class="about-us">
				<h3>{!! $about->name !!}</h3>
				<h5>{!! get_en_name($about->name) !!}</h5>
				<div class="short-line">
					<span></span>
				</div>
				<p>{!! des($about->content,105) !!}</p>
				<div class="readmore">
					<a href="/page/about">READ MORE</a>
				</div>
			</div>
		</div>
	</div>
	@endif
	@if(!empty($service))
	<div class="service">
		<div class="service-title">
			<h3>{!! $service->name !!}</h3>
			<h5>{!! get_en_name($service->name) !!}</h5>
			<img src="{{asset('images/icon1.png')}}" alt="" class="img1">
			<img src="{{asset('images/icon1.png')}}" alt="" class="img2">
		</div>
		@if(count($service_items))
		<div class="service-content container-fluid">
			<?php $num = 0;?>
			@foreach ($service_items as $item)
			<?php $num++;?>
				<div class="col-sm-4 col-xs-12 item">
					<div class="img-box">
						<img src="{!! $item->image !!}" alt="">
					</div>
					<h3>{!! $item->brief !!}</h3>
					<h5>{!! get_en_name($item->name) !!}</h5>
					<div class="shu"></div>
					<p>{!! $item->content !!}</p>
					<div class="num hidden-xs">
						<p class="short-line"></p>
						<p>{!! $item->name !!}</p>
					</div>
				</div>
			@endforeach
		</div>
		@endif
	</div>
	@endif

	@if(!empty($case))
	<div class="case">
		
		<div id="carousel-example-generic" class="carousel slide my-slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		        <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
		        <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
		        <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		    </ol>
		    <!-- Wrapper for slides -->
		    <div class="carousel-inner case-slide" role="listbox">
		        <div class="item active">
		            <a target="_blank" href="">
		                <img src="{{asset('images/banner1.jpg')}}">
		            </a>
		            <div class="carousel-caption hidden-xs">
		            	<div class="case-title">
		            		<h3>{!! $case->name !!}</h3>
							<h5>{!! get_en_name($case->name) !!}</h5>
		            	</div>
		            	<div class="case-item">
							<h3>案例名称</h3>
							<div class="short-line"></div>
							<p>案例简介</p>
							<div class="more">
								<a href="">READ MORE</a>
							</div>
						</div>
			      	</div>
		        </div>
		        <div class="item">
		            <a target="_blank" href="">
		                <img src="{{asset('images/banner2.jpg')}}">
		            </a>
		            <div class="carousel-caption hidden-xs">
		            	<div class="case-title">
		            		<h3>{!! $case->name !!}</h3>
							<h5>{!! get_en_name($case->name) !!}</h5>
		            	</div>
		            	<div class="case-item">
							<h3>案例名称</h3>
							<div class="short-line"></div>
							<p>案例简介</p>
							<div class="more">
								<a href="">READ MORE</a>
							</div>
						</div>
			      	</div>
		        </div>
		        <div class="item">
		            <a target="_blank" href="">
		                <img src="{{asset('images/banner3.jpg')}}">
		            </a>
					<div class="carousel-caption hidden-xs">
		            	<div class="case-title">
		            		<h3>{!! $case->name !!}</h3>
							<h5>{!! get_en_name($case->name) !!}</h5>
		            	</div>
		            	<div class="case-item">
							<h3>案例名称</h3>
							<div class="short-line"></div>
							<p>案例简介</p>
							<div class="more">
								<a href="">READ MORE</a>
							</div>
						</div>
			      	</div>
		        </div>
		    </div>
		    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	@endif

	@if(!empty($news))
	<div class="news">
		<div class="news-content container-fluid">
			<div class="title">
				<h3>{!! $news->name !!}</h3>
				<h5>{!! get_en_name($news->name ) !!}</h5>
				<div class="more">
					<a href="/cat/3">MORE</a>
				</div>
			</div>
			@if(count($news_items))
				@foreach ($news_items as $item)
					<a  href="/post/{!! $item->id !!}" class="col-md-4 col-xs-12 news-item wow bounceIn" style="display: block">
						@if(empty($item->image))
						<div class="date-box">
							<div class="date">
								<h3>{!! $item->created_at->format('m/d') !!}</h3>
								<h5>{!! $item->created_at->format('Y') !!}</h5>
							</div>
						</div>
						@else
						<div class="item-box">
							<img src="{!! $item->image !!}" alt="" class="img-responsive">
							@endif
							<div class="news-info @if(empty($item->image)) spc @endif">
								<h3>{!! $item->name !!}</h3>
								<h5>{!! $item->created_at->format('Y-m-d') !!}</h5>
								<p>{!! $item->brief !!}</p>
							</div>
						</div>
					</a>
				@endforeach
			@endif
		</div>
	</div>
	@endif
@endsection


@section('js')
	<!-- <script type="text/javascript" src="/js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="/js/jquery.fullscreenScroll.js"></script>
	<script src="{{asset('js/common.js')}}"></script>
	<script type="text/javascript">
 		HomePage.initialize();
 	</script> -->
	<script>
		$(function(){
			var deHeight=$('.intro .about-us').height();
			var deWIdth=$('.intro .about-us').width();
			var realHeight=deHeight+54+74;
			var realWidth=deWIdth+20+20;
			if(window.innerWidth<768){
				$('.mask').css({
					'height':realWidth,
					'width':realWidth
				});
			}else{
				$('.mask').css('height', realHeight);
			}
			$('.mask').on('click', function(e) {
				var video='<div class="video">'+'<video  width="540" height="400" controls="controls" class="hidden-xs">'+'<source src="{!! get_page_custom_value_by_key($about,'video') !!}" type="video/mp4"/>'+'</video>'+'<video  width="300" height="280" controls="controls" class="visible-xs">'+'<source src="{!! get_page_custom_value_by_key($about,'video') !!}" type="video/mp4"/>'+'</video>'+'</div>'
				$(this).hide();
				$(this).before(video);
			});
			$('.case-item').each(function(index, el) {
				if(index==0){
					$(this).css('display', 'block');
				}else{
					$(this).css('display', 'none');
				}
			});
		})
	</script>

@endsection

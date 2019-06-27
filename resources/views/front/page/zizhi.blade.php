@extends('front.partial.base')

@section('css')
	<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection

@include('front.page.seo')

@section('content')
	<div class="main">
		<div class="about container-fluid">
			<div class="zizhi">
				<div class="nav-about">
					<a href="/page/about" class="">
						<h3>飞天简介</h3>
						<h5>INTRODUCTION</h5>
					</a>
					<a href="/page/zizhi" class="active">
						<h3>相关资质</h3>
						<h5>QUALIFICATIONS</h5>
					</a>
					<a href="/page/dashiji" class="">
						<h3>飞天大事记</h3>
						<h5>EVENTS</h5>
					</a>
				</div>
				<div class="title-box">
					<div class="title">
						<h3>公司资质</h3>
						<div class="short-line">
							<span></span>
						</div>
					</div>
					<div class="line"></div>
				</div>
				<div class="content">
					<div class="zhizhaos" style="box-shadow: 0 13px 21px rgba(0,0,0,.4);">
						<img src="{{asset('images/zhizhao.jpg')}}" alt="" class="zhizhao">
						<img src="{{asset('images/zhizhao.jpg')}}" alt="" class="zhizhao">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
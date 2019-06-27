@extends('front.partial.base')

@section('css')
	<link rel="stylesheet" href="{{asset('css/about.css')}}">
	<style>
		.paging{
			text-align: center;
		}
		.paging li{
			display: inline-block;
			padding:0 20px;
		}
		.paging li>a{
			color:#aaa;
		}
		.paging li>a.hover{
			color:#d1481b;
		}
		.paging li.last-second{
			margin-left: 30px;
		}
		@media (max-width: 767px){
			.paging li{
				padding:0 6px;
			}
			.paging li.last-second{
				margin-left: 10px;
			}
		}
	</style>
@endsection

@include('front.cat.seo')

@section('content')
	<div class="main">
		<div class="about container-fluid" style="padding-top: 60px;">
			<div class="title-box">
				<div class="title">
					<h3>{!! $category->name !!}</h3>
					<div class="short-line">
						<span></span>
					</div>
				</div>
				<div class="line"></div>
			</div>
			<div class="content"> 
				@foreach ($posts as $item)
					<a href="/post/{!! $item->id !!}" class="media ser-item" style="display: block;">
						<div class="media-left">
							<div class="img-box">
								<img src="{!! $item->image !!}" alt="" class="lazy">
							</div>
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<div><span>{!! $item->name !!}</span></div>
								<div class="correlate-info">
									<span>发布者：每日人物</span> 
									<span>{!! time_parse($item->created_at)->format('Y/m/d') !!}</span>
								</div>
							</h4>
							<p style="margin-bottom:20px; padding-bottom: 0;"> 
								{!! $item->brief !!}
							</p>
							<div class="look-detail">
								<span>查看详情></span>
							</div>
						</div>
					</a>
				@endforeach
				<div class="paging">
					<ul>
						<li><a href="" class="hover">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">4</a></li>
						<li><a href="">5</a></li>
						<li class="last-second"><a href="">下一页</a></li>
						<li><a href="">最后一页</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection
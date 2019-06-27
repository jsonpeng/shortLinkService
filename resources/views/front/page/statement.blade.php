@extends('front.partial.base')

@section('css')
	<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection

@include('front.page.seo')

@section('content')
	<div class="main">
		<div class="about container-fluid" style="padding-top: 60px;">
			<div class="title-box">
				<div class="title">
					<h3>法律声明</h3>
					<div class="short-line">
						<span></span>
					</div>
				</div>
				<div class="line"></div>
			</div>
			<div class="detail-content">
				<div>
					{!! $page->content !!}
				</div>
			</div>
		</div>
	</div>
@endsection
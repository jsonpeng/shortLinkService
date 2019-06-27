@extends('front.partial.base')

@section('css')
	<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection

@include('front.page.seo')

@section('content')
	<div class="main">
			<div class="about container-fluid">
				<div class="nav-about">
					<a href="/page/about" class="">
						<h3>飞天简介</h3>
						<h5>INTRODUCTION</h5>
					</a>
					<a href="/page/zizhi" class="">
						<h3>相关资质</h3>
						<h5>QUALIFICATIONS</h5>
					</a>
					<a href="/page/dashiji" class="active">
						<h3>飞天大事记</h3>
						<h5>EVENTS</h5>
					</a>
				</div>
				<div class="title-box">
					<div class="title">
						<h3>飞天大事记</h3>
						<div class="short-line">
							<span></span>
						</div>
					</div>
					<div class="line"></div>
				</div>
				<div class="content">
					<?php $posts=app('cat')->getCachePostOfCat('MEMORABILIA',100);?>
					@foreach ($posts as $item)
					<div class="col-md-4 col-xs-12 event-item">
						<div class="shadow">
							<div class="pic">
								<img src="{{ $item->image }}" alt="" class="img-responsive">
							</div>
							<div class="brief-info">
								<h3>{!! $item->name !!}</h3>
								<h5>{!! $item->brief !!}</h5>
							</div>
						</div>
					</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
@endsection
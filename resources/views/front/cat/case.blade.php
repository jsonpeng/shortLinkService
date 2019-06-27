@extends('front.partial.base')

@section('css')
	<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection

@include('front.page.seo')

@section('content')
	<div class="main">
			<div class="about container-fluid">
				<div class="nav-about">
					@foreach ($cats as $item)
						<a class="@if($item->id == $category->id) active @endif" href="/cat/{!! $item->id !!}">
							<h3>{!! $item->name !!}</h3>
							<h5>{!! $item->slug !!}</h5>
						</a>
					@endforeach
				</div>
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
						<a class="col-md-4 col-xs-12 event-item wow bounceIn" href="/post/{!! $item->id !!}">
							<div class="shadow">
								<div class="pic">
									<img src="{!! $item->image !!}" alt="" class="img-responsive lazy">
								</div>
								<div class="brief-info">
									<h3>{!! $item->name !!}</h3>
									<h5>{!! $item->brief !!}</h5>
								</div>
							</div>
						</a>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
@endsection
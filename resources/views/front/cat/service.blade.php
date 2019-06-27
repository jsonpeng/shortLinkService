@extends('front.partial.base')

@section('css')
	<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection

@include('front.cat.seo')

@section('content')
	<div class="main">
			<div class="about container-fluid">
				@if(count($cats))
				<div class="nav-about">
					@foreach ($cats as $item)
					<a class="@if($item->id == $category->id) active @endif" href="/cat/{!! $item->id !!}">
						<h3>{!! $item->name !!}</h3>
						<h5>{!! $item->slug !!}</h5>
					</a>
					@endforeach
				</div>
				@endif
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
					@if(count($posts))
						@foreach ($posts as $item)
							@if($item->slug != 'yi-shu-pei-xun-yu-yin-yue-zhi-zuo-xiang-guan' && $item->slug != 'wu-mei-gong-cheng-she-ji-yu-da-jian' && $item->slug != 'ACTIVITY PLANNING')
							<a href="/post/{!! $item->id !!}" style="display: block;">
								<div  class="media ser-item">
									<div class="media-left">
										<div class="img-box">
											<img src="{!! $item->image !!}" alt="" class="media-object lazy">
										</div>
									</div>
									<div class="media-body">
										<h4 class="media-heading">		
											<span>{!! $item->name !!}</span>
										</h4>
										<p>
											{!! $item->brief !!}
										</p>
										<div class="look-detail">
											<span>查看详情></span>
										</div>
									</div>
								</div>
							</a>
							@endif
						@endforeach
					@endif
				</div>
			</div>
		</div>
@endsection
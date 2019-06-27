@extends('front.partial.base')

@section('css')
	<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection

@include('front.post.seo')

@section('content')
		<div class="main">
			<div class="about container-fluid" style="padding-top: 60px;">
				<div class="detail-title">
					<h3>{!! $post->name !!}</h3>
					<!-- <h5>
						<span>{!! $post->created_at->format('Y/m/d') !!}</span>
					</h5> -->
				</div>
				<div class="detail-content"> 
					<!-- <div>
						<img src="{!! $post->image !!}" alt="" class="img-responsive">
					</div> -->
					<div>
						{!! $post->content !!}
					</div>
				</div>
			</div>
		</div>
@endsection
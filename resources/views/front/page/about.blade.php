@extends('front.partial.base')

@section('css')
	<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection

@include('front.page.seo')

@section('content')
	<div class="main">
			<div class="about container-fluid">
				<div class="nav-about">
					<a href="/page/about" class="active">
						<h3>飞天简介</h3>
						<h5>INTRODUCTION</h5>
					</a>
					<a href="/page/zizhi" class="">
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
						<h3>深圳飞天文化传媒有限公司</h3>
						<div class="short-line">
							<span></span>
						</div>
					</div>
					<div class="line"></div>
				</div>
				<div class="content">
					<div class="col-md-6">
						<p>飞天，佛家语，即乾闼婆（Gandhanra），又作犍闼婆、犍闼缚、紧那罗，是佛教中天帝司乐之神，又称香神、乐神、香音神飞天最早飞天，佛家语，即乾闼婆（Gandhanra），</p>
						<p>又作犍闼婆、犍闼缚、紧那罗，是佛教中天帝司乐之神，又称香神、乐神、香音神飞天最早飞天，佛家语，即乾闼婆（Gandhanra），又作犍闼婆、犍闼缚、紧那罗，是佛教中天帝司乐之神，又称香神、乐神、香音神飞天最早</p>
					</div>
					<div class="col-md-6" style="text-align: right;">
						<video  width="540" height="400" controls="controls" class="hidden-xs">
						  <!-- <source src="movie.ogg" type="video/ogg" /> -->
						  <source src="{!! get_page_custom_value_by_key($page,'video') !!}" type="video/mp4"  />
						</video>
						<video  width="300" height="280" controls="controls" class="visible-xs">
						  <!-- <source src="movie.ogg" type="video/ogg" /> -->
						  <source src="{!! get_page_custom_value_by_key($page,'video') !!}" type="video/mp4"  />
						</video>
					</div>
					<div class="clearfix"></div>
					<div class="total" style="margin-top: 40px; padding:0 15px;">
						<p>现旗下设有深圳飞天文化传媒有限公司、深圳飞天影音传媒有限公司、深圳飞天畅丰娱乐科技有限公司。目前飞天集团投资及运营三大板块：以</p>
					</div>
					<div class="feature" style="padding:0 15px;">
						<p>
							公司宗旨：为人民的娱乐服务<br>
							公司愿景：打造艺术与技术相结合的完美平台<br>
							经营理念：诚信、责任、专业、品质
						</p>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('js')

@endsection
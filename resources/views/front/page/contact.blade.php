@extends('front.partial.base')

@section('css')
	<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection

@include('front.page.seo')

@section('content')
	<div class="main">
			<div class="about container-fluid">
				<div class="title-box">
					<div class="title">
						<h3>联系我们</h3>
						<div class="short-line">
							<span></span>
						</div>
					</div>
					<div class="line"></div>
				</div>
				<div class="content">
					<div id="baiduMap" style="height:314px"></div>
					<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=TH8GrWEs5kQS76N2FeWOXIMs"></script>

					<script>
							// 百度地图API功能
							var map = new BMap.Map("baiduMap");
							map.setMapStyle({style:'normal'});
							//var point = new BMap.Point(114.329303,30.475501);
							//map.centerAndZoom(point,12);
							// 创建地址解析器实例
							var myGeo = new BMap.Geocoder();
							var markersArray = []; 
							var contents="深圳市福田区益田路南方国际广场D座";
							var infoWindow=new BMap.InfoWindow(contents);
							// 将地址解析结果显示在地图上,并调整地图视野
							myGeo.getPoint("{{ getSettingValueByKey('address') }}", function(point){
							    if (point) {
							    		var marker = new BMap.Marker(point);
							    		map.openInfoWindow(infoWindow,point);
							         	map.centerAndZoom(point, 15);
					                  	map.enableScrollWheelZoom(true);
					                  	map.addOverlay(marker);               // 将标注添加到地图中
	                  					marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
							        	map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
							        	map.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
							       		map.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
							        	map.enableScrollWheelZoom();                            //启用滚轮放大缩小
							    }else{
							        alert("您的地址没有解析到结果!");
							    }
							});
					</script>
					<div class="contact-add">
						<div class="short-line"></div>
						<h3>公司地址</h3>
						<h5>COMPANY ADDRESS</h5>
						<p>{{ getSettingValueByKey('address') }}</p>
					</div>
					<div class="contact-add" style="margin-top: 33px;">
						<div class="short-line"></div>
						<h3>联系方式</h3>
						<h5>CONTACT WAY</h5>
						<p class="hidden-xs">
							<span style="margin-right: 30px;">Email: {{ getSettingValueByKey('email') }}</span> <span>WeChat: {{ getSettingValueByKey('weixin_num') }}</span>
						</p>
						<div class="visible-xs" style="margin:20px 0">
							<div style="margin-bottom: 0">Email: {{ getSettingValueByKey('email') }}</div>
							<div style="margin-bottom: 0">WeChat: {{ getSettingValueByKey('weixin_num') }}</div>
						</div>
					</div>
					<ul class="contact-tel">
						<li class="hot-line">
							<h3>热线电话</h3>
							<h5>business</h5>
						</li>
						<li class="phone">{{ getSettingValueByKey('service_tel') }}</li>
						<li class="tel">{{ getSettingValueByKey('mobile') }}</li>
					</ul>
				</div>
			</div>
		</div>
@endsection
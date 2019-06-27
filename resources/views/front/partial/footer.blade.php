<footer>
	<div class="container-fluid">
		<div class="col-md-4">
			<p class="p1">tel: {!! getSettingValueByKey('service_tel') !!} {!! getSettingValueByKey('mobile')!!}</p>
			<p class="p2">email:{!! getSettingValueByKey('email') !!}</p>
			<div>{!! getSettingValueByKey('banquan') !!}</div>
		</div>
		<div class="col-md-4">
			<p class="p1">add: {!! getSettingValueByKey('address') !!}</p>
			<p class="p2">WeChat:{!! getSettingValueByKey('weixin_num') !!}</p>
			<div>
				版权支持：芸来软件
				<img src="{!! getSettingValueByKey('logo') !!}" alt="images/logo.png">
			</div>
		</div>
		<div class="col-md-4 hidden-xs" >
			<p class="contact-ch">联系我们</p>
			<p class="contact-en">CONTACT US</p>
		</div>
	</div>
</footer>

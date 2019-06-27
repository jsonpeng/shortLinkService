<!DOCTYPE html>
<html>
<head>
	<title>二维码生成服务</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"> 
	<script src="https://cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
</head>
<body>
	<div style="text-align: center;margin-top: 100px;">

		<form > 
			<div class="row">
				<div class="col-sm-2"> </div>
				<div class="col-sm-3">
					<label>参数:</label><input class="form-control"  name="param" value="{!! $param !!}" />
				</div>
				<div class="col-sm-3">
					<label>大小:</label><input class="form-control" name="size" value="{!! $size !!}" />
				</div>
		
				<div class="col-sm-2">
					<button class="btn btn-success">确定</button>
				</div>
			</div>
		</form>

		@if($param)
			{!! QrCode::size($size)->generate($param); !!}
		@endif

	</div>
</body>
</html>
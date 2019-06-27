@section('seo')
	@if(empty($category->seo_title))
		<title></title>
	@else
		<title>{{$category->seo_title}}</title>
	@endif

	@if(empty($category->seo_keyword))
		<meta name="keywords" content="">
	@else
		<meta name="keywords" content="{{$category->seo_keyword}}">
	@endif

	@if(empty($category->seo_des))
		<meta name="description" content="">
	@else
		<meta name="description" content="{{$category->seo_des}}">
	@endif
@endsection
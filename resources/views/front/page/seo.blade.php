@section('seo')
	@if(empty($page->seo_title))
		<title></title>
	@else
		<title>{{$page->seo_title}}</title>
	@endif

	@if(empty($page->seo_keyword))
		<meta name="keywords" content="">
	@else
		<meta name="keywords" content="{{$page->seo_keyword}}">
	@endif

	@if(empty($page->seo_des))
		<meta name="description" content="">
	@else
		<meta name="description" content="{{$page->seo_des}}">
	@endif
@endsection
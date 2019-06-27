@section('seo')
	@if($post->seo_title == '')
		<title></title>
	@else
		<title>{{$post->seo_title}}</title>
	@endif

	@if($post->seo_keyword == '')
		<meta name="keywords" content="team.blade.php">
	@else
		<meta name="keywords" content="{{$post->seo_keyword}}">
	@endif

	@if($post->seo_des == '')
		<meta name="description" content="">
	@else
		<meta name="description" content="{{$post->seo_des}}">
	@endif
@endsection
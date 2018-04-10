<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@section('title') {{$system_seotitle}} @show</title>
	<meta name="keywords" content="{{$system_keywords}}">
	<meta name="description" content="{{$system_description}}">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>

	<link rel="stylesheet" href="/css/common.css"/>
	<link rel="stylesheet" href="/css/css.css"/>
	@yield('css')
</head>
<body>
	{{-- Navigation bar section --}}
	@section('navigation')
		@include('partial.navigation')
	@show

	{{-- Breadcrumbs section --}}
	@section('breadcrumbs')
	@show

	{{-- Content page --}}
	@yield('wapper')

	@section('footer') {{-- 底部开始 --}}
	  @include('partial.footer')
	@show {{-- 底部结束 --}}
</body>
@section('scripts')
@show
</html>
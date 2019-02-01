@extends('layouts.error')
@section('title')
Error 404
@endsection
@section('content')
<div class="error-area ptb--100 text-center">
	<div class="container">
		<div class="error-content">
			<h2>404</h2>
			<p>Ooops! Something went wrong .</p>
			<a class="btn btn-danger btn-xs" href="{{url('/')}}">Go to homepage</a>
		</div>
	</div>
</div>
@endsection
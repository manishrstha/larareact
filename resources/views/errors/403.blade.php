@extends('layouts.error')
@section('title')
Error 403
@endsection
@section('content')
<div class="error-area ptb--100 text-center">
	<div class="container">
		<div class="error-content">
			<h2>403</h2>
			<p>Access to this resource on the server is denied</p>
			<a class="btn btn-danger btn-xs" href="{{url('/')}}">Go to homepage</a>
		</div>
	</div>
</div>
@endsection
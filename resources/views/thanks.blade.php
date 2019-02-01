@extends('layouts.error')
@section('title')
Thanks
@endsection
@section('content')
<div class="error-area ptb--100 text-center">
	<div class="container">
		<div class="error-content">
			<h2>Thanks</h2>
			<p>We will get back to you as soon as possible</p>
			<a class="btn btn-danger btn-xs" href="{{url('/')}}">Go to homepage</a>
		</div>
	</div>
</div>
@endsection
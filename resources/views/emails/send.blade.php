<!DOCTYPE html>
<html>
<body>
	@php
	$company_info = App\SiteInfo::all()->first();
	@endphp
	<div style="padding:16px;background:#F6821F">
		<div style="box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);">
			<div style=" background:white; padding:16px 0;border-bottom: 5px solid #F6821F;">
				<div style="width: 100%;padding-right: 1rem;padding-left: 1rem;margin-right: auto;margin-left: auto;">
					<img src="{{asset('uploads/logo/'.$company_info->logo)}}">
				</div>
			</div>
			<div  style="border-bottom: 5px solid #F6821F; color:white; background:#A6CC39; padding:16px;">
				<h3>{{$subject}} from {{$email}}</h3>
				<label>Name: <span>{{$name}}</span></label><hr />
				<label>Email: <span>{{$email}}</span></label><hr />
				<label>Phone Number: <span>{{$phone}}</span></label><hr />
				<label>Message: <span>{{$comments}}</span></label>
			</div>
			<div style="background:#12477B;padding-right: 1rem;padding-left: 1rem;margin-right: auto;margin-left: auto;">
				<div style="color:white;padding:5px 16px;">
					&copy; <?php echo date("Y"); ?> {{$company_info->company_name}},{{$company_info->address}}<br>{{url('/')}}
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@extends('backend.layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
<div class="main-content-inner">
	<div class="col-12 mt-3">
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
			<strong>{{ $message }}</strong>
		</div>
		@endif
		@if ($message = Session::get('error'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
			<strong>{{ $message }}</strong>
		</div>
		@endif
	</div>
	<!-- sales report area start -->
	<div class="sales-report-area mt-3 mb-3">
		<div class="row">
			<div class="col-md-12">
				<div class="single-report mb-xs-30">
					<div class="s-report-inner pr--20 pt--30 mb-3">
						<div class="icon"><i class="fa fa-info-circle"></i></div>
						<div class="s-report-title">
							<span class="d-block">
								<img src="{{asset('uploads/logo/'.$info->logo)}}" class="img-fluid" />
								<small class="ml-3"> <a class="text-danger h5 float-right" href="{{route('dashboard.edit',$info->id)}}/#logo"> <i class="fa fa-edit"></i> Edit</a></small>
							</span>
							<hr/>
							<h2 class="header-title mb-0"><strong>Company Name : </strong>
								<small class="ml-3">{{ ($info->company_name) ? $info->company_name : 'Company Name empty' }}</small>
								<small class="ml-3"> <a class="text-danger h5 float-right" href="{{route('dashboard.edit',$info->id)}}/#company_name"> <i class="fa fa-edit"></i> Edit</a></small>
							</h2>
							<hr/>
							<h2 class="header-title mb-0"><strong>Phone Number : </strong>
								<small class="ml-3">{{ ($info->phone_number) ? $info->phone_number : 'Phone Number empty' }}</small>
								<small class="ml-3"> <a class="text-danger h5 float-right" href="{{route('dashboard.edit',$info->id)}}/#phone_number"> <i class="fa fa-edit"></i> Edit</a></small>
							</h2>
							<hr/>
							<h2 class="header-title mb-0"><strong>Address : </strong>
								<small class="ml-3">{{ ($info->address) ? $info->address : 'Address empty' }}</small>
								<small class="ml-3"> <a class="text-danger h5 float-right" href="{{route('dashboard.edit',$info->id)}}/#address"> <i class="fa fa-edit"></i> Edit</a></small>
							</h2>
							<hr/>
							<h2 class="header-title mb-0"><strong>Mail Address : </strong>
								<small class="ml-3">{!! ($info->mail_address) ? '<a href="mailto:'.$info->mail_address.'">' . $info->mail_address . '</a>' : 'Mail Address empty' !!}</small>
								<small class="ml-3"> <a class="text-danger h5 float-right" href="{{route('dashboard.edit',$info->id)}}/#mail_address"> <i class="fa fa-edit"></i> Edit</a></small>
							</h2>
							<hr/>
							<h2 class="header-title mb-0"><strong>Facebook : </strong>
								<small class="ml-3">{!! ($info->facebook) ? '<a target="_blank" href="'. $info->facebook .'">' . $info->facebook . '</a>' : 'Facebook Address empty' !!}</small>
								<small class="ml-3"> <a class="text-danger h5 float-right" href="{{route('dashboard.edit',$info->id)}}/#facebook"> <i class="fa fa-edit"></i> Edit</a></small>
							</h2>
							<hr/>
							<h2 class="header-title mb-0"><strong>Google : </strong>
								<small class="ml-3">{!! ($info->google) ? '<a target="_blank" href="'. $info->google .'">' . $info->google . '</a>' : 'Google Address empty' !!}</small>
								<small class="ml-3"> <a class="text-danger h5 float-right" href="{{route('dashboard.edit',$info->id)}}/#google"> <i class="fa fa-edit"></i> Edit</a></small>
							</h2>
							<hr/>
							<h2 class="header-title mb-0"><strong>Twitter : </strong>
								<small class="ml-3">{!! ($info->twitter) ? '<a target="_blank" href="'. $info->twitter .'">' . $info->twitter . '</a>' : 'Twitter Address empty' !!}</small>
								<small class="ml-3"> <a class="text-danger h5 float-right" href="{{route('dashboard.edit',$info->id)}}/#twitter"> <i class="fa fa-edit"></i> Edit</a></small>
							</h2>
							<hr/>
							<h2 class="header-title mb-0"><strong>Instagram : </strong>
								<small class="ml-3">{!! ($info->instagram) ? '<a target="_blank" href="'. $info->instagram .'">' . $info->instagram . '</a>' : 'Instagram Address empty' !!}</small>
								<small class="ml-3"> <a class="text-danger h5 float-right" href="{{route('dashboard.edit',$info->id)}}/#instagram"> <i class="fa fa-edit"></i> Edit</a></small>
							</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
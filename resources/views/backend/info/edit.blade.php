@extends('backend.layouts.app')
@section('title')
Edit | Site Info
@endsection
@section('content')
<div class="main-content-inner">
	<!-- sales report area start -->
	<div class="sales-report-area mt-3 mb-3">
		<div class="row">
			<div class="col-12 text-right p-3">
				<a href="{{route('dashboard.index')}}" class="btn btn-info btn-sm">Go Back</a>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="header-title">Edit Site Info</h4>
						<form action="{{route('dashboard.update',$site_infos->id)}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							{{ method_field('PUT') }}
							<div class="form-group">
								<label for="company_name">Company Name</label>
								<input class="form-control mb-4 input-rounded" id="company_name" name="company_name" type="text" value="{{$site_infos->company_name}}" placeholder="Enter company name">
							</div>
							<div class="form-group">
								<label for="address">Company Address</label>
								<input class="form-control mb-4 input-rounded" id="address" name="address" type="text" value="{{$site_infos->address}}" placeholder="Enter company address">
							</div>
							<div class="form-group">
								<label for="phone_number">Phone Number</label>
								<input class="form-control mb-4 input-rounded" id="phone_number" name="phone_number" type="text" value="{{$site_infos->phone_number}}" placeholder="Enter phone number">
							</div>
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" name="logo1" class="custom-file-input" id="logo">
									<label class="custom-file-label" for="logo">Choose logo file</label>
								</div>
							</div>
							<div class="form-group">
								<label for="mail_address">Mail Address</label>
								<input class="form-control mb-4 input-rounded" id="mail_address" name="mail_address" type="email" value="{{$site_infos->mail_address}}" placeholder="Enter mail address">
							</div>
							<div class="form-group">
								<label for="facebook">Facebook Address</label>
								<input class="form-control mb-4 input-rounded" id="facebook" name="facebook" type="url" value="{{$site_infos->facebook}}" placeholder="Enter facebook address">
							</div>
							<div class="form-group">
								<label for="twitter">Twitter Address</label>
								<input class="form-control mb-4 input-rounded" id="twitter" name="twitter" type="url" value="{{$site_infos->twitter}}" placeholder="Enter twitter address">
							</div>
							<div class="form-group">
								<label for="google">Google Address</label>
								<input class="form-control mb-4 input-rounded" id="google" name="google" type="url" value="{{$site_infos->google}}" placeholder="Enter google address">
							</div>
							<div class="form-group">
								<label for="instagram">Instagram Address</label>
								<input class="form-control mb-4 input-rounded" id="instagram" name="instagram" type="url" value="{{$site_infos->instagram}}" placeholder="Enter instagram address">
							</div>
							<div class="form-group">
								<label for="footer_links">Footer Links 1</label>
								<textarea class="form-control mb-4 input-rounded" id="footer_links" name="footer_links" placeholder="Enter footer links">{{$site_infos->footer_links}}</textarea>
							</div>
							<div class="form-group">
								<label for="footer2_links">Footer Links 2</label>
								<textarea class="form-control mb-4 input-rounded" id="footer2_links" name="footer2_links" placeholder="Enter second footer links">{{$site_infos->footer2_links}}</textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success">Submit</button>
							</div>

						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('styles')
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
@endsection
@section('scripts')
<script>
	CKEDITOR.replace( 'footer_links' );
	CKEDITOR.replace( 'footer2_links' );
</script>
@endsection
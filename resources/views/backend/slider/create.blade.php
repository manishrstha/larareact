@extends('backend.layouts.app')
@section('title')
Create | Slider
@endsection
@section('content')
<div class="main-content-inner">
	<!-- sales report area start -->
	<div class="sales-report-area mt-3 mb-3">
		<div class="row">
			<div class="col-12 text-right p-3">
				<a href="{{route('slider.index')}}" class="btn btn-info btn-sm">Go Back</a>
			</div>
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
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="header-title">Add New sliders</h4>
						<form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group">
								<label for="slogan">Slider Slogan</label>
								<input class="form-control mb-4 input-rounded" id="slogan" name="slogan" type="text" placeholder="Enter slider slogan">
							</div>
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" name="image1" class="custom-file-input" id="image">
									<label class="custom-file-label" for="image">Choose slider image</label>
								</div>
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control mb-4 input-rounded" id="description" name="description" placeholder="Enter description"></textarea>
							</div>
							<div class="form-group">
								<label for="link">Url</label>
								<input class="form-control mb-4 input-rounded" id="link" name="link" type="url" placeholder="Enter slider link">
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
	CKEDITOR.replace( 'description' );
</script>
@endsection
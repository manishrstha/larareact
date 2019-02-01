@extends('backend.layouts.app')
@section('title')
Edit | {{$affiliation->name}}
@endsection
@section('content')
<div class="main-content-inner">
	<!-- sales report area start -->
	<div class="sales-report-area mt-3 mb-3">
		<div class="row">
			<div class="col-12 text-right p-3">
				<a href="{{route('affiliation.index')}}" class="btn btn-info btn-sm">Go Back</a>
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
						<h4 class="header-title">Add New Affiliations</h4>
						<form action="{{route('affiliation.update',$affiliation->id)}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							{{method_field('PUT')}}
							<div class="form-group">
								<label for="affiliation_name">Affiliation Name</label>
								<input class="form-control mb-4 input-rounded" id="affiliation_name" name="name" type="text" value="{{$affiliation->name}}" placeholder="Enter affiliation name">
							</div>
							<div class="col-12 col-sm-4 p-0 mb-3">
								<img src="{{asset('uploads/affiliation/'.$affiliation->image)}}" class="img-fluid" />
							</div>
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" name="image1" class="custom-file-input" id="image">
									<label class="custom-file-label" for="image">Choose sub affiliation image</label>
								</div>
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
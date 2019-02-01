@extends('backend.layouts.app')
@section('title')
Create | Pages
@endsection
@section('content')
<div class="main-content-inner">
	<!-- sales report area start -->
	<div class="sales-report-area mt-3 mb-3">
		<div class="row">
			<div class="col-12 text-right p-3">
				<a href="{{route('page.index')}}" class="btn btn-info btn-sm">Go Back</a>
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
						<h4 class="header-title">Add New Pages</h4>
						<form action="{{route('page.store')}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							<div class="form-group">
								<label for="page_name">Page Name</label>
								<input class="form-control mb-4 input-rounded" id="page_name" name="page_name" type="text" placeholder="Enter page name">
							</div>
							<div class="form-group">
								<label for="slogan">Slogan</label>
								<textarea class="form-control mb-4 input-rounded" id="slogan" name="slogan" placeholder="Enter page name"></textarea>
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control mb-4 input-rounded" id="description" name="description" placeholder="Enter page description"></textarea>
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
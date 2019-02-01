@extends('backend.layouts.app')
@section('title')
Edit | {{$page->page_name}}
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
						<form action="{{route('page.update',$page->id)}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							{{method_field('PUT')}}
							<div class="form-group">
								<label for="page_name">Page Name</label>
								<input class="form-control mb-4 input-rounded" id="page_name" name="page_name" type="text" value="{{$page->page_name}}" placeholder="Enter page name">
							</div>
							<div class="form-group">
								<label for="slogan">Slogan</label>
								<textarea class="form-control mb-4 input-rounded" id="slogan" name="slogan" placeholder="Enter page name"> {{$page->slogan}}</textarea>
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea class="form-control mb-4 input-rounded" id="description" name="description" placeholder="Enter page description"> {{$page->description}}</textarea>
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
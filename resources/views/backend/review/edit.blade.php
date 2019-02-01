@extends('backend.layouts.app')
@section('title')
Edit | {{$review->name}}
@endsection
@section('content')
<div class="main-content-inner">
	<!-- sales report area start -->
	<div class="sales-report-area mt-3 mb-3">
		<div class="row">
			<div class="col-12 text-right p-3">
				<a href="{{route('review.index')}}" class="btn btn-info btn-sm">Go Back</a>
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
						<h4 class="header-title">Add New reviews</h4>
						<form action="{{route('review.update',$review->id)}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							{{method_field('PUT')}}
							<div class="form-group">
								<label for="name">Reviewer Name</label>
								<input class="form-control mb-4 input-rounded" id="name" name="name" type="text" placeholder="Enter reviewer name" value="{{$review->name}}">
							</div>
							@php 
							$countries_id = App\Page::where('page_name','Destination')->get()->first();
							$countries = App\SubPage::where('page_id',$countries_id->id)->get();
							@endphp
							<select name="country" id="country" class="form-control">
								@foreach($countries as $country)
								<option value="{{ $country->name }}" {{ ($country->name == $review->country) ? 'selected' : '' }}>{{ $country->name }}</option>
								@endforeach
							</select>
							<div class="col-12 col-sm-4 p-0">
								<img src="{{asset('uploads/reviews/'.$review->image)}}" class="img-fluid">
							</div>
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" name="image1" class="custom-file-input" id="image">
									<label class="custom-file-label" for="image">Choose reviewer image</label>
								</div>
							</div>
							<div class="form-group">
								<label for="review">Review</label>
								<textarea class="form-control mb-4 input-rounded" id="review" name="review" placeholder="Enter review">{{$review->review}}</textarea>
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
	CKEDITOR.replace( 'review' );
</script>
@endsection
@extends('backend.layouts.app')
@section('title')
Edit | {{$subPage->name}}
@endsection
@section('content')
<div class="main-content-inner">
	<!-- sales report area start -->
	<div class="sales-report-area mt-3 mb-3">
		<div class="row">
			<div class="col-12 text-right p-3">
				<a href="{{route('subpage.index')}}" class="btn btn-info btn-sm">All Subpages</a>
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
						@php
							$pages = App\Page::where('id',$subPage->page_id)->get();
						@endphp
						<h4 class="header-title">Add New Sub Pages  @if(request()->page_id)  in {{$pages->first()->page_name}} page @endif</h4>
						<form action="{{route('subpage.update',$subPage->id)}}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							{{method_field('PUT')}}
							<div class="form-group">
								<label for="page_name">Page Name</label>
								<select class="form-control input-rounded" id="page_name" name="page_id">
									@foreach($pages as $page)
									<option value="{{$page->id}}">{{$page->page_name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="sub_page_name">Sub Page Name</label>
								<input class="form-control mb-4 input-rounded" id="sub_page_name" name="name" type="text" placeholder="Enter sub page name" value="{{$subPage->name}}">
							</div>
							<div class="col-12 col-sm-4 p-0 mb-3">
								<img src="{{asset('uploads/subpages/'.$subPage->image)}}" class="img-fluid" />
							</div>
							<div class="input-group mb-3">
								<div class="custom-file">
									<input type="file" name="image1" class="custom-file-input" id="image">
									<label class="custom-file-label" for="image">Choose sub page image</label>
								</div>
							</div>
							<div class="form-group">
								<label for="descrption">Description</label>
								<textarea class="form-control mb-4 input-rounded" id="descrption" name="description" placeholder="Enter descrption">{{$subPage->description}}</textarea>
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
	CKEDITOR.replace( 'descrption' );
</script>
@endsection
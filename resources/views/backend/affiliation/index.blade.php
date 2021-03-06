@extends('backend.layouts.app')
@section('title')
Pages
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
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
			<div class="col-12 text-right">
				<a class="btn btn-success" href="{{ route('affiliation.create') }}">Add New Affiliation</a>
			</div>
			<div class="col-12 mt-5">
				<div class="card">
					<div class="card-body">
						<h4 class="header-title">Affiliations</h4>
						<div class="data-tables datatable-dark">
							<table id="dataTable" class="text-center">
								<thead class="text-capitalize">
									<tr>
										<th>Affiliation Name</th>
										<th>Image</th>
										<th>Createad At</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($affiliations as $affiliation)
									<tr>
										<td>{{$affiliation->name}}</td>
										<td><img src="{{ asset('uploads/affiliation/'.$affiliation->image) }}"/></td>
										<td>{{ $affiliation->created_at->diffForHumans() }}</td>
										<td><a href="{{route('affiliation.edit',$affiliation->id)}}" class="btn btn-info btn-sm mr-3">Edit</a>
											<form class="d-inline" method="post" action="{{route('affiliation.destroy',$affiliation->id)}}">
												{{method_field('DELETE')}}
												{{csrf_field()}}
												<button type="submit" class="btn btn-danger btn-sm">Delete</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
@endsection
@extends('layouts.app')
@section('content')
<section class="breadcrumbs">	
	<div class="container">				
		<div class="row">
			<div class="col-12">
				<ul class="list-inline">
					<li class="list-inline-item">
						<a href="{{url('/')}}">Home</a>
					</li>
					@if($data->name)
					<li class="list-inline-item">
						<a href="{{route('home.pages',$data->page_id)}}">{{$page->page_name}}</a>
					</li>
					@endif
					<li class="list-inline-item">
						<a href="{{url()->current()}}">{{($data->page_name) ? $data->page_name : $data->name}}</a>
					</li>
				</ul>
			</div>	
		</div>
	</div>
</section>
<section class="post-content-area single-post-area section-gap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 pb-30 header-text text-center">
				<h1 class="mb-10">
					{{($data->page_name) ? $data->page_name : $data->name}}
				</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post mb-0 row">
					@if($data->image)
					<div class="col-lg-12">
						<div class="feature-img">
							<img class="img-fluid" src="{{ asset('uploads/subpages/' . $data->image ) }}" alt="{{($data->page_name) ? $data->page_name : $data->name}} image">
						</div>									
					</div>
					@endif
					<div class="col-lg-12">
						<div class="quotes mt-0">
							{!! $data->description !!}
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 sidebar-widgets">
				<div class="comment-form">
					<h4>Enquire Now</h4>
					<form action="{{route('mail.send')}}" method="post">
						{{csrf_field()}}
						<div class="form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
						</div>	
						<div class="form-group sr-only">
							<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'" value="Enquiry on {{($data->page_name) ? $data->page_name : $data->name}} !">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'">
						</div>
						<div class="form-group">
							<textarea class="form-control mb-10" rows="5" name="comments" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
						</div>
						<button type="submit" class="primary-btn text-uppercase">Send Mesage</button>	
					</form>
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection
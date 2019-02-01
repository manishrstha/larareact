@extends('layouts.app')

@section('content')	  
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28262.697292548044!2d85.32203155870387!3d27.691427349084506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1907fe4dea51%3A0xded760c0b650ff2!2sExpert+Multipurpose+Pvt.+Ltd.!5e0!3m2!1sen!2snp!4v1526445097884" width="100%" height="450" frameborder="0" style="border:0" width="100%" height="400px" allowfullscreen></iframe>
<section class="breadcrumbs">	
	<div class="container">				
		<div class="row">
			<div class="col-12">
				<ul class="list-inline">
					<li class="list-inline-item">
						<a href="{{url('/')}}">Home</a>
					</li>
					<li class="list-inline-item">
						<a href="{{url('/contact')}}">Contact Us</a>
					</li>
				</ul>
			</div>	
		</div>
	</div>
</section>
<section class="contact-page-area section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 d-flex flex-column address-wrap">
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="ion ion-ios-home"></span>
					</div>
					<div class="contact-details">
						<h5>{{$company_info->address}}</h5>
						<p>
							Please check out map
						</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="ion ion-ios-call"></span>
					</div>
					<div class="contact-details">
						<h5>{{$company_info->phone_number}}</h5>
						<p>Mon to Fri 9am to 6 pm</p>
					</div>
				</div>
				<div class="single-contact-address d-flex flex-row">
					<div class="icon">
						<span class="ion ion-ios-mail"></span>
					</div>
					<div class="contact-details">
						<h5>{{$company_info->mail_address}}</h5>
						<p>Send us your query anytime!</p>
					</div>
				</div>														
			</div>
			<div class="col-lg-8">
				<form class="form-area "action="{{route('mail.send')}}" method="post" class="contact-form text-right">
					{{csrf_field()}}
					<div class="row">	
						<div class="col-12 col-lg-4 form-group">
							<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
						</div>
						<div class="col-12 col-lg-4 form-group">
							<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
						</div>
						<div class="col-12 col-lg-4 form-group">
							<input name="phone" placeholder="Enter phone number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter phone number'" class="common-input mb-20 form-control" required="" type="text">
						</div>
						<div class="col-12 form-group">
							<input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
						</div>
						<div class="col-12 form-group">
							<textarea class="common-textarea form-control" name="comments" placeholder="Your Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea>				
						</div>
						<div class="col-lg-12">
							<div class="alert-msg" style="text-align: left;"></div>
							<button type="submit" class="genric-btn primary circle" style="float: right;">Send Message</button>											
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>	
</section>
@endsection
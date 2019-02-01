@extends('layouts.app')

@section('content')
<section class="banner-area" id="home">
	<div class="container">
		<div class="row fitscreen d-flex align-items-center">										
			@foreach($home_sliders as $slider)
			<div class="banner-content col-lg-7 col-md-6 justify-content-center ">
				<h1>
					{{$slider->slogan}}		
				</h1>
				<div class="text-white">
					{!!$slider->description!!}			
				</div>
				<a href="{{$slider->link}}" class="primary-btn header-btn text-uppercase mt-10">Get Started</a>
			</div>
			@endforeach	
		</div>
	</div>
</section>
<section class="service-area section-gap" id="service">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 pb-30 header-text text-center">
				<h1 class="mb-10">Courses That We Offer</h1>
				<p>
					{{$courses->slogan}}
				</p>
			</div>
		</div>						
		<div class="row">
			@foreach(App\SubPage::where('page_id',$courses->id)->limit(4)->get() as $course)
			<div class="col-lg-3 col-md-6">
				<a href="#">
					<div class="single-service">
						<div class="thumb">
							<img src="{{asset('uploads/subpages/'.$course->image)}}">									
						</div>
						<h4>{{$course->name}}</h4>
						<p class="text-justify">
							{!!substr($course->description,0,130)!!}....read more
						</p>
					</div>
				</a>
			</div>
			@endforeach																	
		</div>
	</div>	
</section>
<section class="work-process-area section-gap">
	<div class="container-fluid">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-30 col-12">
				<div class="title text-center">
					<h1 class="mb-10">Destination We Reach Out</h1>
					<p>
						{{$destinations->slogan}}
					</p>
				</div>
			</div>
			<div class="dest-carousel">
				@foreach(App\SubPage::where('page_id',$destinations->id)->get() as $destination)
				<a href="{{route('home.subpages',$destination->id)}}">
					<div class="card card-destination">
						<img class="img-fluid" src="{{asset('uploads/subpages/'.$destination->image)}}">	
						<p>{{ucfirst($destination->name)}}</p>
					</div>
				</a>
				@endforeach
			</div>
		</div>	
	</div>	
</section>
<section class="home-about-area section-gap relative bg-white">			
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-md-6 no-padding home-about-right">
				<div class="row">
					<div class="col-md-12 header-text text-center">
						<h1 class="mb-10">Services We Provide</h1>
						<p>Lorem ipsum dolor sit amet </p>
					</div>
					<div class="single-services col-12 col-sm-6 col-md-12 col-lg-6 text-center">
						<span class="ion ion-ios-home"></span>
						<h4>Carrer Counselling</h4>
						<p>
							Keeping in view your individual profile and the professional . We provide best counselling.
						</p>
					</div>	
					<div class="single-services col-12 col-sm-6 col-md-12 col-lg-6 text-center">
						<span class="ion ion-ios-card"></span>
						<h4>VISA Permit</h4>
						<p>
							We assist you with all the mock up interviews for the visa permit
						</p>
					</div>
					<div class="single-services col-12 col-sm-6 col-md-12 col-lg-6 text-center">
						<span class="ion ion-ios-airplane"></span>
						<h4>Pre Departure Briefings</h4>
						<p>
							We will provide every essential information and guides before your departure.
						</p>
					</div>
					<div class="single-services col-12 col-sm-6 col-md-12 col-lg-6 text-center">
						<span class="ion ion-ios-business"></span>
						<h4>Admission Guidance</h4>
						<p>
							We provide the best admission guidance inorder to remove your confusion.
						</p>
					</div>				
				</div>
			</div>
		</div>
	</div>	
</section>
<section class="discount-section-area relative section-gap">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row align-items-center justify-content-between no-gutters">
			<div class="col-lg-6 discount-left">
				<h1 class="text-white">Want Counselling?</h1>
				<p class="text-white">
					We Provide among the best service in the country. Inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial.
				</p>
				<a href="tel:{{str_replace(" ","",$company_info->phone_number)}}" class="header-btn">{{$company_info->phone_number}}</a>
				<a href="mailto:{{$company_info->mail_address}}" class="header-btn text-lowercase">{{$company_info->mail_address}}</a>
			</div>
			<div class="col-lg-5 discount-right">
				<h4 class="text-white">Get a free Appointment</h4>
				<form class="booking-form form-area" action="{{route('mail.send')}}" method="post" >
					{{csrf_field()}}
					<div class="row">
						<div class="col-lg-12 d-flex flex-column">
							<input name="name" placeholder="Your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" class="form-control mt-20" required="" type="text">
						</div>
						<div class="col-lg-6 d-flex flex-column">
							<input name="phone" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" class="form-control mt-20" required="" type="text">
						</div>
						<div class="col-lg-6 d-flex flex-column">
							<input name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="form-control mt-20" required="" type="email">
						</div>
						<div class="col-lg-6 d-flex flex-column sr-only">
							<input name="subject" placeholder="subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'subject'" class="form-control mt-20" required="" type="text" value="Please get me an appointment !">
						</div>
						<div class="col-lg-12 flex-column">
							<textarea rows="5" class="form-control mt-20" name="comments" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required=""></textarea>
						</div>
						<div class="col-lg-12">
							<div class="alert-msg" style="text-align: left; color:white !important;"></div>
						</div>
						<div class="col-lg-12 d-flex justify-content-end send-btn">
							<button type="submit" class="genric-btn primary mt-20 text-uppercase ">Get Appointment</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
</section>
<section class="testomial-area section-gap" id="testimonail">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-30 col-lg-7">
				<div class="title text-center">
					<h1 class="mb-10">Feedback from our students</h1>
					<p>We value our students and their opinions.</p>
				</div>
			</div>
		</div>						
		<div class="row">
			<div class="active-testimonial-carusel">
				@foreach($reviews as $review)
					<div class="single-testimonial item">
						<img class="mx-auto" src="{{asset('uploads/reviews/'.$review->image)}}" alt="{{$review->name}}">
						{!!$review->review!!}
						<h5>{{$review->name}}</h5>
						<p>
							Went to {{$review->country}}
						</p>
					</div>
				@endforeach
			</div>
		</div>
	</div>	
</section>
@endsection
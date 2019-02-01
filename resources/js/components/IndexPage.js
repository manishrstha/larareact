import React,{Component} from 'react';
import axios from 'axios';
import {StripTags,ImportFiles,SendEmail,LimitData} from '../layouts/helpers';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
import OwlCarousel from 'react-owl-carousel2';
import 'react-owl-carousel2/src/owl.carousel.css';
import {Helmet} from 'react-helmet';
class IndexPage extends Component {
	constructor(props){
		super(props);
		console.log(this.props.datas);
	}
	componentDidMount(){
		let home = document.querySelector("#home .fitscreen")
		let header = document.getElementById("header");
		let homeHeight = (window.innerHeight - header.clientHeight) + "px" ;
		home.style.height = homeHeight;
	}
	render() {
		const data = this.props.datas;
		const courseList = data.subPages.filter((item) => item.page_id == this.props.datas.courses.id);
		const destinationList = data.subPages.filter((item) => item.page_id == this.props.datas.destinations.id);
		const option0 = {
	        items: 4,
	        loop: true,
	        autoplayHoverPause: true,
	        autoplay: true,
	        nav:true,
	        navText: ["<i class='ion ion-ios-arrow-back'></i>","<i class='ion ion-ios-arrow-forward'></i>"],
	        margin:15,
	        responsive: {
	            0: {
	                items: 1
	            },
	            600: {
	            	items : 2
	            },
	            992: {
	                items: 3
	            },
	            1199: {
	                items: 4
	            }
	        }

		};
		const option1 = {
		    stagePadding: 50,
	        items: 3,
	        loop: true,
	        autoplayHoverPause: true,
	        autoplay: true,
	        nav:true,
	        navText: ["<i class='ion ion-ios-arrow-back'></i>","<i class='ion ion-ios-arrow-forward'></i>"],
	        responsive: {
	            0: {
	                items: 1
	            },
	            992: {
	                items: 2,
	            },
	            1199: {
	                items: 3
	            }
	        }
		};		
		const option2 = {
			items: 3,
	        loop: true,
	        margin: 30,
	        dots: true,
	        autoplay: true,
	        navText: ["<i class='ion ion-ios-arrow-back'></i>","<i class='ion ion-ios-arrow-forward'></i>"],
	        responsive: {
	            0: {
	                items: 1
	            },
	            480: {
	                items: 1,
	            },
	            768: {
	                items: 2,
	            },
	            961: {
	                items: 3,
	            }
	        }
		};
		const option3 = {
			items: 8,
	        loop: true,
	        autoplayHoverPause: true,
	        autoplay: true,
	        responsive: {
	            0: {
	                items: 4
	            },
	            768: {
	                items: 5,
	            },
	            991: {
	                items: 6,
	            },
	            1024: {
	                items: 7,
	            },
	            1199: {
	                items: 8
	            }
	        }
		}
		return(
			<main>
				<Helmet>
	                <title>Home Page</title>
	            </Helmet>
				<section className="banner-area" id="home">
					<div className="container">
						<div className="row fitscreen d-flex align-items-center">									
							{data.homeSliders.map((item) =>
								<div key={"sliders" + item.id} className="banner-content col-lg-7 col-md-6 justify-content-center ">
									<h1>
										{item.slogan}		
									</h1>
									<div className="text-white">
										{StripTags(item.description)}			
									</div>
									<a href={item.link} className="primary-btn header-btn text-uppercase mt-10">Get Started</a>
								</div>
							)}
						</div>
					</div>
				</section>
				<section className="service-area section-gap" id="service">
					<div className="container">
						<div className="row justify-content-center">
							<div className="col-md-12 pb-30 header-text text-center">
								<h1 className="mb-10">Courses That We Offer</h1>
								<p>
									{data.courses.slogan}
								</p>
							</div>
						</div>						
						<div className="row">
							<OwlCarousel options={option0}>
								{
									courseList.map((item) => 
										<Link key={item.name} to={"/page/" + item.page_id + "/subpage/" + item.id}>
											<div className="single-service">
												<div className="thumb">
													<img src={ImportFiles("subpages/"+item.image)} alt={item.name} />									
												</div>
												<h4>{item.name}</h4>
												<div className="text-justify" dangerouslySetInnerHTML={{__html: item.description.substr(0,120)}} />
											</div>
										</Link>
									) 
								}	
							</OwlCarousel>															
						</div>
					</div>	
				</section>
				<section className="work-process-area section-gap">
					<div className="container-fluid">
						<div className="row d-flex justify-content-center">
							<div className="menu-content pb-30 col-12">
								<div className="title text-center">
									<h1 className="mb-10">Destination We Reach Out</h1>
									<p>
										{data.destinations.slogan}
									</p>
								</div>
							</div>
							<OwlCarousel options={option1}>
							{
								destinationList.map((item) => 
								<Link key={item.name} to={"/page/" + item.page_id + "/subpage/" + item.id}>
									<div className="card card-destination">
										<img className="img-fluid" src={ImportFiles("subpages/"+item.image)} alt={item.name} />	
										<p>{item.name.toUpperCase()}</p>
									</div>
								</Link>
								)
							}
							</OwlCarousel>
						</div>	
					</div>	
				</section>
				<section className="home-about-area section-gap relative bg-white">			
					<div className="container">
						<div className="row align-items-center">
							<div className="col-12 col-md-6 no-padding home-about-right">
								<div className="row">
									<div className="col-md-12 header-text text-center">
										<h1 className="mb-10">Services We Provide</h1>
										<p>Lorem ipsum dolor sit amet </p>
									</div>
									<div className="single-services col-12 col-sm-6 col-md-12 col-lg-6 text-center">
										<span className="ion ion-ios-home"></span>
										<h4>Carrer Counselling</h4>
										<p>
											Keeping in view your individual profile and the professional . We provide best counselling.
										</p>
									</div>	
									<div className="single-services col-12 col-sm-6 col-md-12 col-lg-6 text-center">
										<span className="ion ion-ios-card"></span>
										<h4>VISA Permit</h4>
										<p>
											We assist you with all the mock up interviews for the visa permit
										</p>
									</div>
									<div className="single-services col-12 col-sm-6 col-md-12 col-lg-6 text-center">
										<span className="ion ion-ios-airplane"></span>
										<h4>Pre Departure Briefings</h4>
										<p>
											We will provide every essential information and guides before your departure.
										</p>
									</div>
									<div className="single-services col-12 col-sm-6 col-md-12 col-lg-6 text-center">
										<span className="ion ion-ios-business"></span>
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
				<section className="discount-section-area relative section-gap">
					<div className="overlay overlay-bg"></div>
					<div className="container">
						<div className="row align-items-center justify-content-between no-gutters">
							<div className="col-lg-6 discount-left">
								<h1 className="text-white">Want Counselling?</h1>
								<p className="text-white">
									We Provide among the best service in the country. Inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial.
								</p>
								<a href={"tel:" + this.props.datas.companyInfo.phone_number} className="header-btn mr-3">{this.props.datas.companyInfo.phone_number}</a>
								<a href={"mailto:" + this.props.datas.companyInfo.mail_address} className="header-btn text-lowercase">{this.props.datas.companyInfo.mail_address}</a>
							</div>
							<div className="col-lg-5 discount-right">
								<h4 className="text-white">Get a free Appointment</h4>
								<form className="booking-form form-area" onSubmit={SendEmail} action="/api/send" method="post" >
									<div className="row">
										<div className="col-lg-12 d-flex flex-column">
											<input name="name" placeholder="Your name" className="form-control mt-20" required="" type="text"/>
										</div>
										<div className="col-lg-6 d-flex flex-column">
											<input name="phone" placeholder="Phone" className="form-control mt-20" required="" type="text"/>
										</div>
										<div className="col-lg-6 d-flex flex-column">
											<input name="email" placeholder="Email" className="form-control mt-20" required="" type="email"/>
										</div>
										<div className="col-lg-6 d-flex flex-column sr-only">
											<input name="subject" placeholder="subject" className="form-control mt-20" value="Please get me an Appointment !" readOnly type="text" />
										</div>
										<div className="col-lg-12 flex-column">
											<textarea rows="5" className="form-control mt-20" name="comments" placeholder="Message" required=""></textarea>
										</div>
										<div className="col-lg-12">
											<div className="alert-msg"></div>
										</div>
										<div className="col-lg-12 d-flex justify-content-end send-btn">
											<button type="submit" className="genric-btn primary mt-20 text-uppercase ">Get Appointment</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>	
				</section>
				<section className="testomial-area section-gap" id="testimonail">
					<div className="container">
						<div className="row d-flex justify-content-center">
							<div className="menu-content pb-30 col-lg-7">
								<div className="title text-center">
									<h1 className="mb-10">Feedback from our students</h1>
									<p>We value our students and their opinions.</p>
								</div>
							</div>
						</div>						
						<div className="row">
								<OwlCarousel options={option2}>
								{
									data.reviews.map((item) => 
										<div key={item.name} className="single-testimonial item">
											<img className="mx-auto" src={ImportFiles("reviews/"+item.image)} alt={item.name}/>
											<div dangerouslySetInnerHTML={{ __html : item.review.substr(0,200) }} />
											<h5>{item.name}</h5>
											<p>
												Went to {item.country}
											</p>
										</div>
									)
								}
								</OwlCarousel>
						</div>
					</div>	
				</section>
				<section className="brands-area section-gap" id="partners">
			        <div className="container no-padding">
			            <div className="brand-wrap">
			                <OwlCarousel options={option3}>
			                {
			                	data.affiliation.map((item) =>
				                    <div key={item.name} className="col single-brand">
				                        <a href="/">
				                        	<img className="img-fluid" src={ImportFiles("affiliation/" + item.image)} alt={item.name} />
				                        </a>
				                    </div>    
			                	)
			                }     
			                </OwlCarousel>                                                                          
			            </div>
			        </div>  
			    </section>
			</main>
		)
	}
}
export default IndexPage;
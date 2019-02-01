import React,{Component} from 'react';
import {SendEmail} from '../layouts/helpers';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
import {Helmet} from 'react-helmet';
class ContactPage extends Component {
	render() {
		const data = this.props.datas;
		const style = {
			border:'0',
			width:'100%',
			height:'450px'
		}
		return(
			<main>
				<Helmet>
	                <title>Contact Page</title>
	            </Helmet>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28262.697292548044!2d85.32203155870387!3d27.691427349084506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1907fe4dea51%3A0xded760c0b650ff2!2sExpert+Multipurpose+Pvt.+Ltd.!5e0!3m2!1sen!2snp!4v1526445097884" style={style}></iframe>
				<section className="breadcrumbs">	
					<div className="container">				
						<div className="row">
							<div className="col-12">
								<ul className="list-inline">
									<li className="list-inline-item">
										<Link to='/'>Home</Link>
									</li>
									<li className="list-inline-item">
										<Link to='/contact'>Contact Us</Link>
									</li>
								</ul>
							</div>	
						</div>
					</div>
				</section>
				<section className="contact-page-area section-gap">
					<div className="container">
						<div className="row">
							<div className="col-lg-4 d-flex flex-column address-wrap">
								<div className="single-contact-address d-flex flex-row">
									<div className="icon">
										<span className="ion ion-ios-home"></span>
									</div>
									<div className="contact-details">
										<h5>{data.companyInfo.address}</h5>
										<p>
											Please check out map
										</p>
									</div>
								</div>
								<div className="single-contact-address d-flex flex-row">
									<div className="icon">
										<span className="ion ion-ios-call"></span>
									</div>
									<div className="contact-details">
										<h5>{data.companyInfo.phone_number}</h5>
										<p>Mon to Fri 9am to 6 pm</p>
									</div>
								</div>
								<div className="single-contact-address d-flex flex-row">
									<div className="icon">
										<span className="ion ion-ios-mail"></span>
									</div>
									<div className="contact-details">
										<h5>{data.companyInfo.mail_address}</h5>
										<p>Send us your query anytime!</p>
									</div>
								</div>														
							</div>
							<div className="col-lg-8">
								<form onSubmit={SendEmail} action="/api/send" method="post" className="contact-form text-right form-area">
									<div className="row">	
										<div className="col-12 col-lg-4 form-group">
											<input name="name" placeholder="Enter your name" className="common-input mb-20 form-control" required="required" type="text" />
										</div>
										<div className="col-12 col-lg-4 form-group">
											<input name="email" placeholder="Enter email address" className="common-input mb-20 form-control" required="required" type="email" />
										</div>
										<div className="col-12 col-lg-4 form-group">
											<input name="phone" placeholder="Enter phone number"  className="common-input mb-20 form-control" required="required" type="text" />
										</div>
										<div className="col-12 form-group">
											<input name="subject" placeholder="Enter your subject" className="common-input mb-20 form-control" required="required" type="text" />
										</div>
										<div className="col-12 form-group">
											<textarea className="common-textarea form-control" placeholder="Enter your message" name="comments"  required="required"></textarea>				
										</div>
										<div className="col-lg-12">
											<div className="alert-msg"></div>
										</div>
										<div className="col-lg-12">
											<button type="submit" className="genric-btn primary circle float-right">Send Message</button>											
										</div>
									</div>
								</form>	
							</div>
						</div>
					</div>	
				</section>
			</main>
		)
	}
}
export default ContactPage;
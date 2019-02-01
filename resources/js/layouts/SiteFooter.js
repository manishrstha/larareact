import React,{Component} from 'react';
import {StripTags,ImportFiles,SliceCharAndLink} from './helpers';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
class SiteFooter extends Component {
	render() {
		const data = this.props.datas;
		return(     
		    <footer className="footer-area">
		        <div className="container">
		            <div className="row">
		                <div className="col-lg-4  col-md-6 col-sm-6">
		                    <div className="single-footer-widget">
		                        <h6>Contact Us </h6>                            
		                        <address>
		                            <i className="ion ion-ios-home mr-2"></i> {data.companyInfo.company_name}<br/>
		                            <i className="ion ion-ios-locate mr-2"></i> {data.companyInfo.address}<br/>
		                            <a href={"tel:"+data.companyInfo.phone_number}><i className="ion ion-ios-call mr-2"></i> {data.companyInfo.phone_number}</a><br/>
		                            <a href={"mailto:" + data.companyInfo.mail_address}><i className="ion ion-ios-mail mr-2"></i> {data.companyInfo.mail_address}</a><br/>
		                            <a href="/"><i className="ion ion-ios-link mr-2"></i> </a>
		                        </address>
		                    </div>
		                </div>
		                <div className="col-lg-4 col-md-6 col-sm-6">
		                    <div className="single-footer-widget">
		                        <h6>Navigation Links</h6>
		                        <div className="row">
		                            <div className="col" dangerouslySetInnerHTML={{__html: data.companyInfo.footer_links}} />
		                            <div className="col" dangerouslySetInnerHTML={{__html: data.companyInfo.footer2_links}} />                                    
		                        </div>                          
		                    </div>
		                </div>  
		                <div className="col-lg-4  col-md-6 col-sm-6">
		                    <div className="single-footer-widget">
		                        <h6>About {data.companyInfo.company_name}</h6>
		                        {SliceCharAndLink(data.about_us.description,0,200,"page/3")}
		                       </div>
		                   </div>                                              
		               </div>

		           </div>
		           <div className="footer-bottom d-flex justify-content-between align-items-center">
		            <div className="container">
		                <div className="row">
		                    <p className="col-lg-8 col-sm-12 footer-text m-0">
		                        Copyright &copy; {new Date().getFullYear()} All rights reserved | Designed By <a target="_blank" href="http://www.dotweb.com.np/">Dot Web Technologies</a>
		                    </p>
		                    <div className="col-lg-4 col-sm-12 footer-social">
		                        <a target="_blank" href={data.companyInfo.facebook}><i className="fa fa-facebook"></i></a>
		                        <a target="_blank" href={data.companyInfo.twitter}><i className="fa fa-twitter"></i></a>
		                        <a target="_blank" href={data.companyInfo.google}><i className="fa fa-google-plus"></i></a>
		                        <a target="_blank" href={data.companyInfo.instagram}><i className="fa fa-instagram"></i></a>
		                    </div>

		                </div>
		            </div>
		        </div>
		    </footer>
		)
	}
}
export default SiteFooter;
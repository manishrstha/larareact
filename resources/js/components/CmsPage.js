import React ,{Component} from 'react';
import {SendEmail,ImportFiles} from '../layouts/helpers';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
class CmsPage extends Component{
	render(){
		const page = this.props.datas.pages.filter((item) => (item.id == this.props.routeProps.match.params.id))[0];
		const data = (this.props.routeProps.match.params.subId) ?
			this.props.datas.subPages.filter((item) => (item.id == this.props.routeProps.match.params.subId))[0]
												   :
			this.props.datas.pages.filter((item) => (item.id == this.props.routeProps.match.params.id))[0]
		;
		/*const data = this.props.datas.pages.filter((item) => console.log(item.id == this.props.routeProps.match.params.id));*/
		return (
			<main>
				<section className="breadcrumbs">	
					<div className="container">				
						<div className="row">
							<div className="col-12">
								<ul className="list-inline">
									<li className="list-inline-item">
										<Link to="/">Home</Link>
									</li>
									{
										(this.props.routeProps.match.params.subId) &&
										<li className="list-inline-item">
											<Link to={'/page/' + this.props.routeProps.match.params.id}>{page.page_name}</Link>
										</li>
									}
									<li className="list-inline-item">
										<Link to={'/page/' + this.props.routeProps.match.params.id + '/subpage/' + data.id}>{(data.page_name) ? data.page_name : data.name}</Link>
									</li>
								</ul>
							</div>	
						</div>
					</div>
				</section>
				<section className="post-content-area single-post-area section-gap">
					<div className="container">
						<div className="row justify-content-center">
							<div className="col-md-12 pb-30 header-text text-center">
								<h1 className="mb-10">
									{
										(data.name) ? data.name : data.page_name
									}
								</h1>
							</div>
						</div>
						<div className="row">
							<div className="col-lg-8 posts-list">
								<div className="single-post mb-0 row">
									{
										(data.image) &&
											<div className="col-lg-12">
												<div className="feature-img">
													<img className="img-fluid" src={ImportFiles('subpages/' + data.image)} alt={data.name} />
												</div>									
											</div>
									}
									
									<div className="col-lg-12">
										<div className="quotes mt-0" dangerouslySetInnerHTML={{ __html : data.description}} />
									</div>
								</div>
							</div>
							<div className="col-lg-4 sidebar-widgets">
								<div className="comment-form">
									<h4>Enquire Now</h4>
									<form onSubmit={SendEmail} action="/api/send" method="post">
										<div className="form-group">
											<input type="text" className="form-control" id="name" name="name" placeholder="Enter Name" />
										</div>
										<div className="form-group">
											<input type="email" className="form-control" id="email" name="email" placeholder="Enter email address" />
										</div>	
										<div className="form-group">
											<input type="text" className="form-control" name="phone" id="phone" placeholder="Phone Number" />
										</div>
										<div className="form-group sr-only">
											<input type="text" className="form-control" name="subject" id="subject" placeholder="Phone Number" value={(data.name) ? 'Enquiry from page "'+data.name + '" ! ' : 'Enquiry from page" ' + data.page_name + '" ! '} readOnly />
										</div>
										<div className="form-group">
											<textarea className="form-control mb-10" rows="5" name="comments" placeholder="Message" required=""></textarea>
										</div>
										<div className="form-group">
											<div className="alert-msg"></div>
										</div>
										<button type="submit" className="primary-btn genric-btn text-uppercase">Send Mesage</button>
									</form>
								</div>
							</div>
						</div>
					</div>	
				</section>
			</main>
		)
	}
}
export default CmsPage;
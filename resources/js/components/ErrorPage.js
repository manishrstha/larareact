import React,{Component} from 'react';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
class ErrorPage extends Component{
	render() {
		const styles = {
			position:"fixed",
			height:"100%",
			width:"100%",
			display:"flex",
			justifyContent:"center",
			alignItems:"center"
		}
		return (
			<div className="error-area ptb--100 text-center bg-danger" style={styles}>
				<div className="container">
					<div className="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 offset-sm-1 offset-md-2 offset-lg-3 offset-xl-4">
						<div className="card bg-danger text-white rounded-0 border-0">
							<div className="card-body">
								<h2 className="text-white">404</h2>
								<p>Ooops! Something went wrong .</p>
								<Link className="btn btn-success btn-xs" to="/">Go to homepage</Link>
							</div>
						</div>
					</div>
				</div>
			</div>
		)
	}
}
export default ErrorPage;
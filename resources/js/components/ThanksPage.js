import React ,{Component} from 'react';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
class ThankYouPage extends Component{
	render(){
		const styles = {
			padding:"50px 0"
		}
		return (
			<main>
				<div className="error-area ptb--100 text-center" style={styles}>
					<div className="container">
						<div className="error-content">
							<h2>Thanks</h2>
							<p>We will get back to you as soon as possible</p>
							<Link className="btn btn-danger btn-xs" to="/">Go to homepage</Link>
						</div>
					</div>
				</div>	
			</main>
		)
	}
}
export default ThankYouPage;
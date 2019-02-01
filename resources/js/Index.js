import React,{Component} from 'react';
import ReactDOM from 'react-dom';
import SiteHeader from './layouts/SiteHeader';
import IndexPage from './components/IndexPage';
import ContactPage from './components/ContactPage';
import CmsPage from './components/CmsPage';
import ErrorPage from './components/ErrorPage';
import ThanksPage from './components/ThanksPage';
import SiteFooter from './layouts/SiteFooter';
import ScrollToTop from './layouts/ScrollToTop';
import LoginPage from './backend/components/LoginPage';
import axios from 'axios';
import {BrowserRouter as Router,Route,Switch,Link} from 'react-router-dom';
import {withRoot} from './Root';
class Index extends Component {
	constructor(props){
		super(props);
		this.state = {
			allData : null
		}
	}
	componentWillMount(){
		axios.get('api/all-data/').then( response => {
			this.setState({
				allData : response.data
			})

		}).catch(errors => {
			console.log("Sorry data couldnt be fetched");
		})
	}
	render() {
		const CmsComp = withRoot(CmsPage,this.state.allData);
		if(this.state.allData!==null){	
			return (
				<Router basename={'/'}>
					<Switch> 
						<Route path="/" exact component={withRoot(IndexPage,this.state.allData)} />
					    <Route path="/contact" exact component={withRoot(ContactPage,this.state.allData)} />
					    <Route path="/thanks" exact component={withRoot(ThanksPage,this.state.allData)} />
					    <Route path="/page/:id" exact render={props => <CmsComp {...props} />} />
					    <Route path="/page/:id/subpage/:subId" exact render={props => <CmsComp {...props} />} />
					    <Route path="/backend/login" exact component={LoginPage} />
					    <Route component={ErrorPage} />
					</Switch>
				</Router>
			);	
		}else{	
			return(
				<div className="preloader">
					<span className="circle1"></span>
					<span className="circle2"></span>
				</div>
			)
		}
	}
}

if (document.getElementById('root')) {
	ReactDOM.render(<Index />, document.getElementById('root'));
}
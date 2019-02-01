import React,{Component} from 'react';
import { withRouter } from 'react-router-dom'
class ScrollToTop extends Component {
	componentDidUpdate(prevProps) {
		if (this.props.location !== prevProps.location) {
			window.scrollTo(0, 0);
		}
		if(this.props.history.location.hash){
			let dest = document.getElementById(this.props.history.location.hash.replace(this.props.history.location.hash.charAt(0),"")).offsetTop;
			window.scrollTo({
				top:dest,
				left:0,
				behaviour:'smooth'});
		}
	}

	render() {
		return null;
	}
}

export default withRouter(ScrollToTop);
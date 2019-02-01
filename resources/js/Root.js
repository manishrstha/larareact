import React,{Component} from 'react';
import ReactDOM from 'react-dom';
import SiteHeader from './layouts/SiteHeader';
import SiteFooter from './layouts/SiteFooter';
import ScrollToTop from './layouts/ScrollToTop';

export function withRoot(BaseComponent,propsData){
	class RootComp extends Component {
		render() {
			return (
				<>
					<SiteHeader datas={propsData}/>
					<ScrollToTop/>
					<BaseComponent routeProps={this.props} datas={propsData}/>
					<SiteFooter datas={propsData}/>
				</>
			);	
		}
	}
	return RootComp;
}
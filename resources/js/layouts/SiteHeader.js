import React,{Component} from 'react';
import {ImportFiles} from './helpers';
import {BrowserRouter as Redirect,Router,Link,Route,NavLink} from 'react-router-dom';
class SiteHeader extends Component {
	constructor(props){
		super(props);
	}
	render() {
		const data = this.props.datas;
		return(
			<header id="header">
		        <div className="header-top">
		            <div className="container">
		                <div className="row">
		                    <div className="col-lg-6 col-sm-6 col-4 header-top-left">
		                        <ul>
		                            <li><a href={data.companyInfo.facebook} target="_blank"><i className="fa fa-facebook"></i></a></li>
		                            <li><a href={data.companyInfo.twitter} target="_blank"><i className="fa fa-twitter"></i></a></li>
		                            <li><a href={data.companyInfo.google} target="_blank"><i className="fa fa-google-plus"></i></a></li>
		                            <li><a href={data.companyInfo.instagram} target="_blank"><i className="fa fa-instagram"></i></a></li>
		                        </ul>
		                    </div>
		                    <div className="col-lg-6 col-sm-6 col-8 header-top-right pr-sm-0">
		                        <a href={"tel:" + data.companyInfo.phone_number}>{data.companyInfo.phone_number}</a>
		                        <a href={"mailto:" + data.companyInfo.mail_address}>{data.companyInfo.mail_address}</a>          
		                    </div>
		                </div>                              
		            </div>
		        </div>
		        <div className="container main-menu">
		            <div className="row align-items-center justify-content-between d-flex">
		                <div id="logo">
		                    <Link to="/"><img src={ImportFiles("logo/"+data.companyInfo.logo)} alt={this.props.datas.companyInfo.company_name} title={this.props.datas.companyInfo.company_name} /></Link>
		                </div>
		                <nav id="nav-menu-container">
		                    <ul className="nav-menu">
		                        <li>
		                        	<NavLink exact={true} to="/" activeClassName="menu-active">
		                        		Home
		                        	</NavLink>
		                        </li>         
		                        <li>
		                        	<NavLink to={"/" + "#partners"} >
		                        		Partners
		                        	</NavLink>
		                        </li>
								{
									data.pages.map((item) =>
				                        (
				                        	<li key={item.page_name} className={
												(data.subPages.filter((sub) => (sub.page_id === item.id)).length > 0) ?  'menu-has-children' : ''
				                        	}
				                        	>
    				                        	<NavLink exact={true} to={"/page/"+item.id} activeClassName="menu-active">{item.page_name}</NavLink>
		    				                    <ul>
    				                        	{ 
    				                        		data.subPages.filter((sub) => (sub.page_id === item.id)).map((sub)=>
	    				                               	<li key={sub.name}>
	    				                               		<NavLink activeClassName="menu-active" to={"/page/" + item.id + "/subpage/" + sub.id}>{sub.name}</NavLink>
	    				                               	</li>
    				                        		)
    				                        	}
		    				                    </ul>
    				                        </li> 
				                        )
					                )
								}
		                        <li>
		                        	<NavLink exact={true} to="/contact" activeClassName="menu-active">
		                        		Contact
		                        	</NavLink>
		                        </li>
		                    </ul>
		                </nav>                  
		            </div>
		        </div>
		    </header>
		)
	}
}
export default SiteHeader;
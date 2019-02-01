import React,{Component} from 'react';
import {Helmet} from 'react-helmet';
class LoginPage extends Component{
	render(){
		return (
			<>
				<Helmet>
					<style>
						{".error-area{position:fixed;height:100%;width:100%;display:flex;justify-content:center;align-items:center;background:#fafafa;}.card-header{background:#8655FC;}.card-header,.card-body{padding:50px;}.form-group,.rmber-area{margin-bottom:2rem;}.btn{width:100%;height:50px;background:transparent;box-shadow: 0 0 22px rgba(0, 0, 0, 0.07);color:#2b2b2b;border:0;border-radius:50px;}.form-control{height:50px;border-radius:0;border:0;border-bottom:1px solid #eee;}"}
					</style>
				</Helmet>
				<div className="error-area ptb--100 text-center">
					<div className="container">
						<div className="col-12 col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3">
							<div className="card bg-white text-white rounded-0 border-0">
								<div className="card-header">
									<h1 className="text-white">Sign In</h1>
								</div>
								<div className="card-body">
									<form action="">
										<div className="form-group">
											<input type="email" className="form-control" placeholder="Please Enter your name" />
										</div>
										<div className="form-group">
											<input type="password" className="form-control" placeholder="Please Enter your name" />
										</div>
										<div className="row mb-4 rmber-area">
					                        <div className="col-6">
					                            <div className="custom-control custom-checkbox mr-sm-2">
					                                <input type="checkbox" className="custom-control-input" id="customControlAutosizing" name="remember" />
					                                <label className="custom-control-label text-dark" htmlFor="customControlAutosizing">Remember Me</label>
					                            </div>
					                        </div>
					                        <div className="col-6 text-right">
					                        	<a href="">Forgot Password?</a>
					                        </div>
					                    </div>
										<div className="form-group">
											<button type="submit" className="btn btn-success">Login <i className="fa fa-chevron-right"></i> </button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</>
		)
	}
}
export default LoginPage;
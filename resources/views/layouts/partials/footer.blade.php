<section class="brands-area section-gap" id="partners">
        <div class="container no-padding">
            <div class="brand-wrap">
                <div class="row align-items-center active-brand-carusel justify-content-start no-gutters">
                    @php 
                    $affiliations = App\Affiliation::all();
                    @endphp
                    @foreach($affiliations as $affiliation)
                    <div class="col single-brand">
                        <a href="#"><img class="img-fluid" src="{{asset("uploads/affiliation/".$affiliation->image)}}" alt="{{$affiliation->name}}"></a>
                    </div>                      
                    @endforeach
                </div>                                                                          
            </div>
        </div>  
    </section>
    <!-- End brands Area -->            

    <!-- start footer Area -->      
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Contact Us </h6>                            
                        <address>
                            <i class="ion ion-ios-home mr-2"></i> {{$company_info->company_name}}<br>
                            <i class="ion ion-ios-locate mr-2"></i> {{$company_info->address}}<br>
                            <a href="tel:{{str_replace(" ", "", $company_info->phone_number)}}"><i class="ion ion-ios-call mr-2"></i> {{$company_info->phone_number}}</a><br>
                            <a href="mailto:{{$company_info->mail_address}}"><i class="ion ion-ios-mail mr-2"></i> {{$company_info->mail_address}}</a><br>
                            <a href="{{url('/')}}"><i class="ion ion-ios-link mr-2"></i> {{url('/')}}</a>
                        </address>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Navigation Links</h6>
                        <div class="row">
                            <div class="col">
                                {!!$company_info->footer_links!!}
                            </div>
                            <div class="col">
                                {!!$company_info->footer2_links!!}
                            </div>                                      
                        </div>                          
                    </div>
                </div>  
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About {{ $company_info->company_name }}</h6>
                        @php 
                        $limited_page = App\Page::where('page_name','About Us')->first()->description;
                        @endphp
                        {!!
                           substr($limited_page,0,280)

                           !!}
                       </div>
                   </div>                                              
               </div>

           </div>
           <div class="footer-bottom d-flex justify-content-between align-items-center">
            <div class="container">
                <div class="row">
                    <p class="col-lg-8 col-sm-12 footer-text m-0">
                        Copyright &copy; <?= date("Y") ?> All rights reserved | Designed By <a target="_blank" href="http://www.dotweb.com.np/">Dot Web Technologies</a>
                    </p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="{{$company_info->facebook}}"><i class="fa fa-facebook"></i></a>
                        <a href="{{$company_info->twitter}}"><i class="fa fa-twitter"></i></a>
                        <a href="{{$company_info->google}}"><i class="fa fa-google-plus"></i></a>
                        <a href="{{$company_info->instagram}}"><i class="fa fa-instagram"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </footer>
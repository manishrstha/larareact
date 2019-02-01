<header id="header" id="home">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
                        <ul>
                            @php 
                            $company_info = App\SiteInfo::all()->first();
                            @endphp
                            <li><a href="{{$company_info->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$company_info->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$company_info->google}}"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="{{$company_info->instagram}}"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
                        <a href="tel:{{str_replace(" ", "", $company_info->phone_number)}}">{{$company_info->phone_number}}</a>
                        <a href="mailto:{{$company_info->mail_address}}">{{$company_info->mail_address}}</a>          
                    </div>
                </div>                              
            </div>
        </div>
        <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="{{url('/')}}"><img src="{{asset('uploads/logo/'.$company_info->logo)}}" alt="{{$company_info->company_name}}" title="{{$company_info->company_name}}" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="{{url('/')}}">Home</a></li>
                        @foreach(App\Page::all() as $page)
                        @php 
                        $sub_pages = App\SubPage::where('page_id',$page->id)->get();
                        @endphp
                        <li {{(count($sub_pages) > 0 ) ? 'class="menu-has-children"' : ''}}"><a href="{{route('home.pages',$page->id)}}">{{$page->page_name}}</a>
                            @if(count($sub_pages) > 0)
                            <ul>
                                @foreach($sub_pages as $sub_page)
                                <li><a href="{{route('home.subpages',$sub_page->id)}}"> {{$sub_page->name}} </a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>                            
                        @endforeach
                        <li><a href="#partners">Partners</a></li>
                        <li><a href="{{url('/contact')}}">Contact</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->                  
            </div>
        </div>
    </header>
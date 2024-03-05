    <div class="py-2 bg-primary" style="background-color: #203f5b !important">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
			    		<div class="col-md-3 pr-4 d-flex topper align-items-center">
								<a href="https://twitter.com/TechnoKnowledg4" target="_blank"><i class="fab fa-twitter mr-4" style="font-size:15px;color:white"></i></a>
								<a href="https://facebook.com/technoknowledge19" target="_blank"><i class="fab fa-facebook mr-4" style="font-size:20px;color:white"></i></a>
								<a href="#!"><i class="fab fa-instagram mr-4" style="font-size:20px;color:white"></i></a>
					<!--	<ul>
						<i class="fab fa-twitter" style="font-size:30px"></i>
						<i class="fab fa-twitter" style="font-size:30px"></i>
						<i class="fab fa-twitter" style="font-size:30px"></i>
						</ul>
					</div>-->
			    			<!-- <div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div> -->
							<!-- <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                      <li class="ftco-animate"><a href="#!"><span class="icon-twitter"></span></a></li>
                      <li class="ftco-animate"><a href="#!"><span class="icon-facebook"></span></a></li>
                      <li class="ftco-animate"><a href="#!"><span class="icon-instagram"></span></a></li>
                    </ul> -->
					    </div>
					    <div class="col-md-2 pr-4 d-flex topper align-items-center">
					    	
					    </div>
					    <div class="col-md-3 pr-2 d-flex topper align-items-center">
								<span class="pr-1 " style="color:white"></span>
								<span class="text"></span></div>
						<div class="col pr-2 d-flex topper align-items-center">
					    		<span class="pr-1" style="color:white"></span>
								<span class="text"><form>
								<div class="row">
								<div class="col-6" style="margin:auto">	
								<input class="form-control" style="color:white !important;font-size:15px;height:25px !important;margin:auto;background:#203f5b !important;border:1px solid white;border-radius: 3px;" type="text" id="search" placeholder="Search" size="10"  ></div>
								{{-- <div class="col" >
								<button class="btn btn-primary py-2 px-2" style="background-color: #203f5b;border: 0px">Search</button></div> --}}
								</div>
							</form></span>
							
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<div style="navbar-brand"><div style="padding-right:10px"><a  href="{{ asset('/') }}"><img style="width:80px" src="{{ asset('public/images/Logo.png') }}"></a></div></div>
				<a class="navbar-brand" href="{{ asset('/') }}"><span class="hide" style="color:#203f5b">Techno</span><span class="hide" style="color:#1bbed0">knowledge</span></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item"><a href="{{ asset('/') }}" class="x nav-link pl-0">Home</a></li>
				<li class="nav-item"><a href="{{ asset('/about') }}" class="x nav-link">Who we are</a></li>
				{{-- <li class="nav-item"><a href="{{ asset('/whatwedo') }}" class="nav-link">What We Do</a></li> --}}
						
						
                {{-- <li class="nav-item"><a href="/eduvella/whatwedo" class="nav-link">What we do</a></li> --}}
                <li class="nav-item dropdown"><a class="x dropdown-toggle nav-link" href="{{ asset('/whatwedo') }}" aria-haspopup="true" aria-expanded="false" >What We Do</a> 
                    <div class="dropdown-menu" style="box-shadow: 3px 3px 10px 1px #383838;" aria-labelledby="navbarDropdownMenuLink">
                           <a class="x dropdown-item" href="{{ asset('/services/teachertraining') }}" style="">Teacher Training</a>
                           <div class="dropdown-divider"></div>
                            <a class="x dropdown-item" href="{{ asset('/services/labsetup') }}" style="">Facilitate Lab Set Up</a>
                            <div class="dropdown-divider"></div>
							<a class="x dropdown-item" href="{{ asset('/services/studenttraining') }}" style="">Student Training</a>
							<div class="x dropdown-divider"></div>
							<a class="x dropdown-item" href="{{ asset('/services/technocamp') }}" style="">Technocamp</a>
							<div class="dropdown-divider"></div>
                            <a class="x dropdown-item" href="{{ asset('/services/specializedCur') }}" style="">Specialized curriculum design </a>
                          </div>
                        </li>
                        <li class="nav-item dropdown"><a class="x dropdown-toggle nav-link" href="{{ asset('/curriculum') }}" aria-haspopup="true" aria-expanded="false">Curriculum </a>
                            <div class="dropdown-menu" style="box-shadow: 3px 3px 10px 1px #383838;" aria-labelledby="navbarDropdownMenuLink">
                                   <a class="x dropdown-item" href="{{ asset('/curriculum/elementcurriculum') }}" style="">Elementary Level Curriculum</a>
                                   <div class="dropdown-divider"></div>
                                    <a class="x dropdown-item" href="{{ asset('/curriculum/middlecurriculum') }}" style="">Secondary Level Curriculum</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="x dropdown-item" href="{{ asset('/curriculum/highcurriculum') }}" style="">High School Curriculum</a>
                                  </div>
                                </li>
				{{-- <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li> --}}
				<li class="nav-item"><a href="{{ asset('/login') }}" class="x nav-link">Portal</a></li>
	          <li class="nav-item"><a href="{{ asset('/contact') }}" class="x nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
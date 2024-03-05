{{-- This is the COMPANY PROFILE page --}}

@extends('mainlayout')

@section('content')
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('public/images/bg_2.jpg')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Sign In</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Sign In <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class=" ftco-no-pb">
			<div class="container">
				<div class="row" style="width:100%">
						<div class="col">
							{{-- <div class="wrap-about py-5 pr-md-4 ftco-animate">
								<h2 class="mb-4">Company Profile</h2>
								<p>“Technoknowledge is working for creative computer learning.
									 We work across the spectrum to design a curriculum with Blended Learning strategies, STEM,
										logic development & Problem solving Techniques.<div class="content"> Developing, deploying & providing technology
										 support for creating the technology Producers rather than Consumers”.
										Technoknowledge is focused at logic and analytical development at 
										an early stage so that they will understand problems, analyze them and solve them. 
										As per Bill Gates “Every youngster must learn programming language to understand how 
										a computer or any machine that is run by computer works behind the scene”. </div></p>
										
										<a href="#!" class="show_hide" data-content="toggle-text">Read More</a>

										</div> --}}
										
									
{{-- 									
									
									
									Technoknowledge 
										
										 is the introduction of innovative
										programming platform for
										early learners. We enable students to be "creators of IT systems" rather than just consumers. 
										 We design Computer Science Curriculum and bring programming to classrooms in a fun and
										interactive manner.<div class="content"> The current ICT curricula  emphasizes on the technical details rather than
										creative potentials.
										
										 
												{{-- <span id="dots">...</span><span id="more"> --}}
											{{-- Our idea of “creative computing” supports the development of personal
										connections to computing, by block programming, drawing upon creativity, imagination, and
										interests.
										As  
										Many young people with access to computers participate as consumers, rather than
										designers   or   creators.   Creative   computing   emphasizes   the   knowledge,   practices,   and
										fundamental literacy that young people need to create the types of dynamic and interactive
										computational media that they enjoy in their daily lives.
										Creating computational artifacts prepares young people for more than careers as computer
										scientists or programmers. It supports young people’s development as computational thinkers,
										analyst and creators; individuals who can draw on computational concepts, practices, and
										perspectives in all aspects of their lives.
									</div> --}}
								
					{{-- <div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url('{{asset('images/teacher-1.jpg')}}');"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Bianca Wilson</h3>
								<span class="position mb-2">Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url('{{asset('images/teacher-2.jpg')}}');"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Mitch Parker</h3>
								<span class="position mb-2">English Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/teacher-3.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Stella Smith</h3>
								<span class="position mb-2">Art Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/teacher-4.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Monshe Henderson</h3>
								<span class="position mb-2">Science Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/teacher-5.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Daniel Tribor</h3>
								<span class="position mb-2">Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/teacher-6.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Mitch Parker</h3>
								<span class="position mb-2">English Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/teacher-7.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Stella Smith</h3>
								<span class="position mb-2">Art Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/teacher-8.jpg);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>Monshe Henderson</h3>
								<span class="position mb-2">Science Teacher</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
		                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
		                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
	              </div>
							</div>
						</div>
					</div>
				 --}}





				 {{-- <div class="wrap-about py-5 pr-md-4 ftco-animate">
						<h2 class="mb-4">Background</h2>
						<p>The future of world greatly depends on the youngsters of today, 
							and it is imperative that we develop this talent and educate them with 
							skills of future.<div class="content1"> Young kids, adults and youth, using core analytical
							 skills to solve problems, build industry of ideas and reduce inequality
								and digital divide across the globe. Over the next 10 years, there will
								 be 1.4 million jobs in computer science and only about 40,000 graduates
									will qualify for those jobs , so it’s obvious that there is shortage of a
									 million (1,000,000) of people. Current IT curriculum in schools has not 
									 evolved according to the changing computer technology. Our company works 
									 with those technologies and platforms which empower kids to code applications,
										animations and websites.  Teachers and educators will be trained so that they
										 can transfer their knowledge to their students in an effective manner. </div></p>
								
								<a href="#!" class="show_hide1" data-content="toggle-text">Read More</a>
								<br><br><br>

								</div> --}}
								{{-- <div class="col order-md-last wrap-about py-5 wrap-about bg-light"></div> --}}

				</div>
				
				
				<div class="col order-md-last wrap-about py-5 wrap-about bg-light" align="right">
						
						<div class="text px-4 ftco-animate">
							{{-- <img style="height:250px"src="{{URL::to('/')}}/public/images/kidsVision.jpg"> --}}
							{{-- <h2 class="mb-4">Vision</h2>
							<p><i>“Coding  is  todays  Language  of creativity
									.  
									All  our   children  deserve  a chance  to  become
									creators instead of consumers of Computer Science.”  </i><br>
								<b>	Maria Klawe.</b></p> --}}
							{{-- <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. And if she hasn’t been rewritten, then they are still using her.</p> --}}
							{{-- <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p> --}}
						</div>
					</div>
			
			
			
			
			
			</div>
				{{-- <div class="row"> --}}
						{{-- <div class="col wrap-about py-5 pr-md-4 ftco-animate">
								<h2 class="mb-4">Background</h2>
								<p>The future of world greatly depends on the youngsters of today, 
									and it is imperative that we develop this talent and educate them with 
									skills of future.<div class="content1"> Young kids, adults and youth, using core analytical
									 skills to solve problems, build industry of ideas and reduce inequality
										and digital divide across the globe. Over the next 10 years, there will
										 be 1.4 million jobs in computer science and only about 40,000 graduates
											will qualify for those jobs , so it’s obvious that there is shortage of a
											 million (1,000,000) of people. Current IT curriculum in schools has not 
											 evolved according to the changing computer technology. Our company works 
											 with those technologies and platforms which empower kids to code applications,
												animations and websites.  Teachers and educators will be trained so that they
												 can transfer their knowledge to their students in an effective manner. </div></p>
										
										<a href="#!" class="show_hide1" data-content="toggle-text">Read More</a>
										<br><br><br>

										</div>
										<div class="col order-md-last wrap-about py-5 wrap-about bg-light"></div> --}}
						{{-- </div> --}}
			</div>
		</section>
		<script>
				jQuery(document).ready(function () {
				jQuery(".content").hide();
				jQuery(".show_hide").on("click", function () {
						var txt = jQuery(".show_hide").text();
						
						if(txt == 'Read More'){
							jQuery(".content").show(200);
							jQuery(".show_hide").text('Read Less');
							}else{
								jQuery(".content").hide(200);
							jQuery(".show_hide").text('Read More');
							}
					//console.log(txt)
						// jQuery(this).next('.content').slideToggle(200);
				});
	});
	
	jQuery(document).ready(function () {
				jQuery(".content1").hide();
				jQuery(".show_hide1").on("click", function () {
						var txt = jQuery(".show_hide1").text();
						
						if(txt == 'Read More'){
							jQuery(".content1").show(200);
							jQuery(".show_hide1").text('Read Less');
							}else{
								jQuery(".content1").hide(200);
							jQuery(".show_hide1").text('Read More');
							}
					//console.log(txt)
						// jQuery(this).next('.content').slideToggle(200);
				});
	});

	</script>
@endsection
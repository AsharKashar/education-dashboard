{{-- This is the ABOUT page --}}



@extends('mainlayout')

@section('content')
    <!-- END nav -->
    {{-- <style>
				#more {display: none;}
				</style> --}}
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('public/images/bg_1.jpg')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread" style="font-size:26px;font-weight:normal">Anybody can learn computer science, but we are enabling our early learners with support and latest resources designed especially for the young minds </h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Who we are <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row">
					<div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
						
						<div class="text px-4 ftco-animate">
							{{-- <img style="height:250px"src="{{asset('public/images/kidsVision.jpg"> --}}
	          	<h2 class="mb-4">Vision</h2>
							<p align="justify" style="color:black"><i>“Coding  is  todays  Language  of creativity
									.  
									All  our   children  deserve  a chance  to  become
									creators instead of consumers of Computer Science.”  </i><br>
								<b>	Maria Klawe.</b></p>
							{{-- <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. And if she hasn’t been rewritten, then they are still using her.</p> --}}
							{{-- <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p> --}}
						</div>
					</div>
					<div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
          	<h2 class="mb-4">About Us</h2>
						<p align="justify" style="color:black">Technoknowledge is all about the introduction of innovative programming platform for early learners.
							 Learning to code helps young students develop into logical thinkers, problem solvers, creators, and
							  collaborators.</p><div class="content"> <p align="justify">Teaching computer science to all early age students helps ensure that these students,
							   especially girls and underrepresented minorities, will participate and succeed in a much-needed, 21st
							    century skill set. Our idea of “creative computing” supports the development of personal connections 
							   to computing, by block programming, drawing upon creativity, imagination, and interests. Creative computing emphasizes the knowledge, practices, and fundamental literacies that young people need to create the types of dynamic and interactive computational media that they enjoy in their daily lives. 

								We design Computer Science Curriculum and bring programming to classrooms in a fun and interactive
								 manner. Our computational artifacts prepares young people for more than careers as computer
								  scientists or programmers. It supports young people’s development as computational thinkers, 
								  analyst and creators; individuals who can draw on computational concepts, practices, and
								   perspectives in all aspects of their lives, across disciplines and contexts. 
							
							
							
							
							
							
							{{-- Technoknowledge 
								
								 is the introduction of innovative
								programming platform for
								early learners. We enable students to be "creators of IT systems" rather than just consumers. 
								 We design Computer Science Curriculum and bring programming to classrooms in a fun and
								interactive manner. The current ICT curricula  emphasizes on the technical details rather than
								creative potentials. --}}
								
								 
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
								perspectives in all aspects of their lives. --}}
								<br><br></div></p>
							<a href="#!" class="btn btn-tertiary px-4 py-3" id="show_hide" data-content="toggle-text">Read More</a>
						{{-- </span>
						<button onclick="myFunction()" id="myBtn">Read more</button> --}}
						
						
						<div class="row mt-5">
							
							{{-- <div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"> --}}
										{{-- <span class="flaticon-security"></span> --}}
									{{-- </div>
									<div class="text">
										<h3>Safety First</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div> --}}
									{{-- <div class="text">
										<h3>Regular Classes</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
									<div class="text">
										<h3>Certified Teachers</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
									<div class="text">
										<h3>Sufficient Classrooms</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-jigsaw"></span></div>
									<div class="text">
										<h3>Creative Lessons</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div> --}}
							{{-- </div>
							<div class="col-lg-6">
								<div class="services-2 d-flex">
									<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-kids"></span></div>
									<div class="text">
										<h3>Sports Facilities</h3>
										<p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
									</div>
								</div>
							</div> --}}
							
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url('{{asset('public/images/bg_4.jpg')}}');" data-stellar-background-ratio="0.5">
    	{{-- <div class="container">
    		<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section heading-section-black ftco-animate">
            <h2 class="mb-4"><span>20 Years of</span> Experience</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>	
    		<div class="row d-md-flex align-items-center justify-content-center">
    			<div class="col-lg-10">
    				<div class="row d-md-flex align-items-center">
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="18">0</strong>
		                <span>Certified Teachers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="351">0</strong>
		                <span>Successful Kids</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="564">0</strong>
		                <span>Happy Parents</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18">
		            	<div class="icon"><span class="flaticon-doctor"></span></div>
		              <div class="text">
		                <strong class="number" data-number="300">0</strong>
		                <span>Awards Won</span>
		              </div>
		            </div>
		          </div>
	          </div>
          </div>
        </div>
			</div> --}}
			<section class=" ftco-no-pb">
					<div class="container">
							<div class="row justify-content-center mb-5 pb-2">
									<div class="col-md-8 text-center heading-section ftco-animate">
											<h2 class="mb-4"><span>Our</span> Team</h2>
											<p style="color:black"><b>We are young professionals working in education and technology sectors over a decade.
												 Through our research-driven professional development initiatives, the team at Technknowledge 
												 is committed to providing access<div class="content1"> to creative computing, logic development and coding. As former 
												 educators we are lifelong learners, deeply engaged, and passionate about what we do 
													</b></div>
												
												<a href="#!" class="show_hide1" data-content="toggle-text"><b>Read More</b></a>
												</p></div>
									</div>
							</div>
					</div>
			</section>

			<div class="container"> 
			<div class="row"  style="margin-left:10px">
					<div class="col  ftco-animate">
							<div class="staff">
									<div class="img-wrap d-flex align-items-stretch">
											<div class="img align-self-stretch" style="background-image: url('{{asset('public/images/team2.jpg')}}');"></div>
									</div>
									<div class="text pt-3 text-center" style="background-color: rgba(255, 255, 255, 0.1)">
											<h3>Romana Rafi</h3>
											<span class="position mb-2">Technical Head</span>
											<div class="faded">
													{{-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> --}}
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
					<div class="col  ftco-animate">
							<div class="staff">
									<div class="img-wrap d-flex align-items-stretch">
											<div class="img align-self-stretch" style="background-image: url('{{asset('public/images/team1.jpg')}}');"></div>
									</div>
									<div class="text pt-3 text-center" style="background-color: rgba(255, 255, 255, 0.1)">
											<h3>Tanveer Maqsood</h3>
											<span class="position mb-2">Curriculum Head</span>
											<div class="faded">
													{{-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> --}}
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
					<div class="col  ftco-animate">
							<div class="staff">
									<div class="img-wrap d-flex align-items-stretch">
											<div class="img align-self-stretch" style="background-image: url('{{asset('public/images/team1.jpg')}}');"></div>
									</div>
									<div class="text pt-3 text-center" style="background-color: rgba(255, 255, 255, 0.1)">
											<h3>Mohsin Amir</h3>
											<span class="position mb-2">Chief Designer</span>
											<div class="faded">
													{{-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> --}}
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
					<div class="col ftco-animate">
							<div class="staff">
									<div class="img-wrap d-flex align-items-stretch">
											<div class="img align-self-stretch" style="background-image: url('{{asset('public/images/team2.jpg')}}');"></div>
									</div>
									<div class="text pt-3 text-center" style="background-color: rgba(255, 255, 255, 0.1)">
											<h3>Somiya Zaman</h3>
											<span class="position mb-2">Curriculum Director</span>
											<div class="faded">
													{{-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> --}}
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

					{{-- <div class="col  ftco-animate">
							<div class="staff">
									<div class="img-wrap d-flex align-items-stretch">
											<div class="img align-self-stretch" style="background-image: url('{{asset('public/images/team1.jpg')}}');"></div>
									</div>
									<div class="text pt-3 text-center" style="background-color: rgba(255, 255, 255, 0.1)">
											<h3>Dr. Rafi Us Shan </h3>
											<span class="position mb-2">Consultant</span>
											<div class="faded"> --}}
													{{-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> --}}
													{{-- <ul class="ftco-social text-center">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
				</div>
									</div>
							</div>
					</div>				 --}}
			</div></div>
			
    </section>
{{-- 
    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
          	<span class="subheading">Testimonial</span>
            <h2 class="mb-4"><span>What Parents</span> Says About Us</h2>
            <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url('{{asset('public/images/teacher-1.jpg')}}');">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Racky Henderson</p>
                    <span class="position">Father</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url('{{asset('public/images/teacher-2.jpg')}}');">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Henry Dee</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url('{{asset('public/images/teacher-3.jpg')}}');">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Mark Huff</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url('{{asset('public/images/teacher-4.jpg')}}');">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Rodel Golez</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url('{{asset('public/images/teacher-1.jpg')}}');">
                  </div>
                  <div class="text ml-2 bg-light">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Ken Bosh</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url('{{asset('public/images/bg_5.jpg')}}');" data-stellar-background-ratio="0.5">
    	<div class="container">
    		<div class="row justify-content-end">
    			<div class="col-md-6 py-5 px-md-5 bg-primary">
	          <div class="heading-section heading-section-white ftco-animate mb-5">
	          	<span class="subheading">Request A Quote</span>
	            <h2 class="mb-4">Request A Quote</h2>
	            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	          </div>
	          <form action="#" class="appointment-form ftco-animate">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" placeholder="First Name">
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Last Name">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		    					<div class="form-field">
          					<div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                      	<option value="">Select Your Course</option>
                        <option value="">Art Lesson</option>
                        <option value="">Language Lesson</option>
                        <option value="">Music Lesson</option>
                        <option value="">Sports</option>
                        <option value="">Other Services</option>
                      </select>
                    </div>
		              </div>
		    				</div>
	    					<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Phone">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		              <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
		            </div>
		            <div class="form-group ml-md-4">
		              <input type="submit" value="Request A Quote" class="btn btn-secondary py-3 px-4">
		            </div>
	    				</div>
	    			</form>
    			</div>
        </div>
    	</div>
    </section>


		<section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="{{asset('public/images/image_1.jpg')}}" class="gallery image-popup img d-flex align-items-center" style="background-image: url('{{asset('public/images/course-1.jpg')}}');">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="{{asset('public/images/image_2.jpg')}}" class="gallery image-popup img d-flex align-items-center" style="background-image: url('{{asset('public/images/image_2.jpg')}}');">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="{{asset('public/images/image_3.jpg')}}" class="gallery image-popup img d-flex align-items-center" style="background-image: url('{{asset('public/images/image_3.jpg')}}');">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="{{asset('public/images/image_4.jpg')}}" class="gallery image-popup img d-flex align-items-center" style="background-image: url('{{asset('public/images/image_4.jpg')}}');">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
								
							</div>
						</a>
					</div>
        </div>
    	</div>
		</section> --}}
		
		<script>
			jQuery(document).ready(function () {
			jQuery(".content").hide();
			jQuery("#show_hide").on("click", function () {
					var txt = jQuery("#show_hide").text();
					
					if(txt == 'Read More'){
						jQuery(".content").show(200);
						jQuery("#show_hide").text('Read Less');
						}else{
							jQuery(".content").hide(200);
						jQuery("#show_hide").text('Read More');
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

// function myFunction() {
//   var dots = document.getElementById("dots");
//   var moreText = document.getElementById("more");
//   var btnText = document.getElementById("myBtn");

//   if (dots.style.display === "none") {
//     dots.style.display = "inline";
//     btnText.innerHTML = "Read more"; 
//     moreText.style.display = "none";
//   } else {
//     dots.style.display = "none";
//     btnText.innerHTML = "Read less"; 
//     moreText.style.display = "inline";
//   }
// }
		</script>

		@endsection
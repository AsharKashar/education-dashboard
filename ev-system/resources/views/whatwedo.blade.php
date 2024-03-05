@extends('mainlayout')

@section('content')
{{-- background-image: url('{{URL::to('/')}}/public/images/TechnoKnowledge What we do.jpg') --}}
    <section class="hero-wrap hero-wrap-2" style="background-color:#203F5B;">
      <div class="overlay" style="background-color:#203F5B;"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread" style="font-size:26px;font-weight:normal">Empowering young students, we need to abandon a one-size-fits-all approach and instead design creative educational experiences around the idea that coding can be individually meaningful and useful to every kid </h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>What We Do <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    

    
		<section class="ftco-section" style="padding-top: 60px">
        <div class="container">
            <div class="row">
              {{-- <div class="col-lg"><center><h2 class=""><b>Goals</b></h2></center></div> --}}
            </div>
            <center><div class="row" style="width:60%">
                <center><p style="color:black">To incorporate programming and coding into early years’ 
                  computer science curriculum. The subject must be taught at an early 
                  stages of a student’s learning pyramid.   </p></center>
            </div></center>

        </div>
<br><br>




<!--///////////////////////////////////////////-->

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg"><center><h2 class="" style="color:grey"><b>Services</b></h2></center></div>
          </div><br>
        {{-- <div class="row">
        

        
        </div> --}}



      <div class="row">
    
        
    
    
    <div class="col-md-8 col-lg-4 ftco-animate">
          <div class="pricing-entry bg-light pb-4 text-center">
            <div>
              <h3 class="mb-3">Teacher Training</h3>
              {{-- <p><span class="price">$24.50</span> <span class="per">/ 5mos</span></p> --}}
            </div>
            <div class="img" style="background-image: url({{URL::to('/')}}/public/images/bg_1.jpg);"></div>
            <div class="px-4">
              <p>Our program “TechnoToT (train ...</p>
            </div>
            <p class="button text-center"><a href="{{asset('services/teachertraining')}}" class="btn btn-primary px-4 py-3">View Details</a></p>
          </div>
    </div>
  
    


  
        <div class="col-md-8 col-lg-4 ftco-animate">
          <div class="pricing-entry bg-light pb-4 text-center">
            <div>
              <h3 class="mb-3">Facilitate Lab Setup</h3>
              {{-- <p><span class="price">$34.50</span> <span class="per">/ 5mos</span></p> --}}
            </div>
            <div class="img" style="background-image: url({{URL::to('/')}}/public/images/bg_2.jpg);"></div>
            <div class="px-4">
              <p>Our expert can help the schools and...</p>
            </div>
            <p class="button text-center"><a href="{{asset('/services/labsetup')}}" class="btn btn-secondary px-4 py-3">View Details</a></p>
          </div>
    </div>
  


  
        <div class="col-md-8 col-lg-4 ftco-animate">
          <div class="pricing-entry bg-light active pb-4 text-center">
            <div>
              <h3 class="mb-3">Student Training</h3>
              {{-- <p><span class="price">$54.50</span> <span class="per">/ 5mos</span></p> --}}
            </div>
            <div class="img" style="background-image: url({{URL::to('/')}}/public/images/bg_3.jpg);"></div>
            <div class="px-4">
              <p>Our program TechnoKid (“train the kid”)...</p>
            </div>
            <p class="button text-center"><a href="{{asset('services/studenttraining')}}" class="btn btn-tertiary px-4 py-3">View Details</a></p>
          </div>
    </div>
  



  
        <div class="col-md-8 col-lg-4 ftco-animate">
          <div class="pricing-entry bg-light pb-4 text-center">
            <div>
              <h3 class="mb-3">Technocamps</h3>
              {{-- <p><span class="price">$89.50</span> <span class="per">/ 5mos</span></p> --}}
            </div>
            <div class="img" style="background-image: url({{URL::to('/')}}/public/images/bg_3.jpg);"></div>
            <div class="px-4">
              <p>Our trained professional development experts...</p>
            </div>
            <p class="button text-center" ><a href="{{asset('services/technocamp')}}" class="btn btn-tertiary px-4 py-3" style="background:#e3e328;border:1px solid #e3e328">View Details</a></p>
          </div>
    </div> 
  





  
    <div class="col-md-8 col-lg-4 ftco-animate">
        <div class="pricing-entry bg-light pb-4 text-center">
          <div>
            <h3 class="mb-3" style="font-size:23px;">Specialized curriculum design</h3>
            {{-- <p><span class="price">$89.50</span> <span class="per">/ 5mos</span></p> --}}
          </div>
          <div class="img" style="background-image: url({{URL::to('/')}}/public/images/bg_3.jpg);"></div>
          <div class="px-4">
            <p>The technology, curriculum and professional...</p>
          </div>
          <p class="button text-center" ><a href="{{asset('services/specializedCur')}}" class="btn btn-tertiary px-4 py-3" style="background:grey;border:1px solid grey">View Details</a></p>
        </div>
      </div> 

      <div class="col-md-8 col-lg-4 ftco-animate">
        <div class="pricing-entry bg-light pb-4 text-center">
          <div>
            <h3 class="mb-3">Total Responsive</h3>
            {{-- <p><span class="price">$89.50</span> <span class="per">/ 5mos</span></p> --}}
          </div>
          <div class="img" style="background-image: url({{URL::to('/')}}/public/images/bg_1.jpg);"></div>
          <div class="px-4">
            <p>Data to be provided ...<br><br></p>
          </div>
          <p class="button text-center" ><a href="{{asset('services/')}}" class="btn btn-tertiary px-4 py-3" style="background:red;border:1px solid red">View Details</a></p>
        </div>
      </div> 
  
        


      </div>
    </div>
  </section>


  <!--//////////////////////////////////////////////////-->


			<div class="container">
				<div class="row">
					<div class="col course d-lg-flex ftco-animate">
						{{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-1.jpg);"></div> --}}
						<div class="text bg-light p-4" style="width: 100%">
                {{-- <i class="fas fa-chalkboard-teacher" ></i> --}}
                <i class="fas fa-laptop-code" style="font-size:48px;"></i>
               
							<h3>Creative Computing</h3>
							{{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
							<p>Introduce Creative Computing and innovative programming platforms for early age kids</p>
						</div>
					</div>
					<div class="col course d-lg-flex ftco-animate">
						{{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-2.jpg);"></div> --}}
						 <div class="text bg-light p-4" style="width: 100%">
                <i class="fas fa-child" style="font-size:48px;"></i>
							 <h3>Kid Empowerment</h3>
							{{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
							<p>Empower kids from a very young age to understand problem, analyze them and solve them</p>
						</div>
					</div> 
					  
						{{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-3.jpg);"></div> --}}
						<div class="col course d-lg-flex ftco-animate"> 
						{{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-4.jpg);"></div> --}}
						<div class="text bg-light p-4" style="width: 100%">
                <i class="fas fa-graduation-cap" style="font-size:48px;"></i>
							 <h3>Algorithm-Based Learning</h3>
							{{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
							<p>Promote analytical, cognitive and problem-solving skills through algorithm-based learning</p>
						</div>
          </div>
        </div>


        <div class="row">
            <div class="col course d-lg-flex ftco-animate">
              {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-1.jpg);"></div> --}}
              <div class="text bg-light p-4" style="width: 100%">
                  <i class="fas fa-brain" style="font-size:48px;"></i>
                <h3>Smart Learning</h3>
                {{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
                <p>Shift focus of students from playing interactive games to writing and building creative games and animations</p>
              </div>
            </div>
            <div class="col course d-lg-flex ftco-animate">
              {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-2.jpg);"></div> --}}
               <div class="text bg-light p-4" style="width: 100%">
                  <i class="fas fa-tools" style="font-size:48px;"></i>
                 <h3>Problem Solving</h3>
                {{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
                <p>Develop Logic development & problem solving techniques in the existing curriculum</p>
              </div>
            </div> 
              
              {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-3.jpg);"></div> --}}
              <div class="col course d-lg-flex ftco-animate"> 
              {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-4.jpg);"></div> --}}
              <div class="text bg-light p-4" style="width: 100%">
                  <i class="fas fa-book" style="font-size:48px;"></i>
                 <h3>Smart Curriculum</h3>
                {{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
                <p>Integrate Block Programming, Blended Learning Striates and STEM in the existing curriculum</p>
              </div>
            </div>
          </div>

          <div class="row">
              <div class="col course d-lg-flex ftco-animate">
                {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-1.jpg);"></div> --}}
                <div class="text bg-light p-4" style="width: 100%">
                    <i class="fas fa-robot" style="font-size:48px;"></i>
                  <h3>Technology Support</h3>
                  {{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
                  <p>Developing, deploying & providing technology support for creating the technology Producers rather than Consumers</p>
                </div>
              </div>
              <div class="col course d-lg-flex ftco-animate">
                {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-2.jpg);"></div> --}}
                 <div class="text bg-light p-4" style="width: 100%">
                    <i class="fas fa-apple-alt" style="font-size:48px;"></i>
                   <h3>Teacher Training</h3>
                  {{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
                  <p>Train the teachers and instructors in the schools with our state of art creative computing curriculum</p>
                </div>
              </div> 
                
                {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-3.jpg);"></div> --}}
                <div class="col course d-lg-flex ftco-animate"> 
                {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-4.jpg);"></div> --}}
                <div class="text bg-light p-4" style="width: 100%">
                    <i class="fas fa-desktop" style="font-size:48px;"></i>
                   <h3>Creative Computer Cirriculum</h3>
                  {{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
                  <p>Train the students with our state of art creative computing curriculum</p>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col course d-lg-flex ftco-animate">
                  {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-1.jpg);"></div> --}}
                  <div class="text bg-light p-4" style="width: 100%">
                      <i class="fas fa-microscope" style="font-size:48px;"></i>
                    <h3>State Of Art Lab</h3>
                    {{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
                    <p>Develop a state of art LAB where students and teachers as well as instructors can get awareness and training about our creative computing curriculum</p>
                  </div>
                </div>
                <div class="col course d-lg-flex ftco-animate">
                  {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-2.jpg);"></div> --}}
                   <div class="text bg-light p-4" style="width: 100%">
                      <i class="fas fa-shapes" style="font-size:48px;"></i>
                      
                     <h3>TechnoCamp</h3>
                    {{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
                    <p>Conducting training camps “Technocamps” in winters and summers break for the students as well as teachers</p>
                  </div>
                </div> 
                  
                  {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-3.jpg);"></div> --}}
                  <div class="col course d-lg-flex ftco-animate"> 
                  {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-4.jpg);"></div> --}}
                  <div class="text bg-light p-4" style="width: 100%">
                      <i class="fas fa-folder" style="font-size:48px;"></i>
                     <h3>Technocamps</h3>
                    {{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
                    <p>Providing a complete access to our creative computing curriculum to our registered users</p>
                  </div>
                </div>
              </div>


              <div class="row">
                  <div class="col course d-lg-flex ftco-animate">
                    {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-1.jpg);"></div> --}}
                    <div class="text bg-light p-4" style="width:100%">
                        <i class="fas fa-search-plus" style="font-size:48px;"></i>
                      <h3>Leaning Assessment</h3>
                      {{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
                      <p>Developing a Learning management & assessment system where teachers and students can monitor their performances</p>
                    </div>
                  </div>
                  <div class="col course d-lg-flex ftco-animate">
                    {{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-2.jpg);"></div> --}}
                     <div class="text bg-light p-4" style="width: 100%">
                        <i class="fas fa-music" style="font-size:48px;"></i>
                       <h3>Media Development</h3>
                      {{-- <p class="subheading"><span>Class time:</span> 9:00am - 10am</p> --}}
                      <p>Developing presentations, audio and videos content of creative computing</p>
                    </div>
                  </div> 
                  <div class="col course d-lg-flex ftco-animate"></div>
                    
                    
                </div>
					{{-- <div class="col-md-6 course d-lg-flex ftco-animate"> --}}
						{{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-5.jpg);"></div> --}}
						{{-- <div class="text bg-light p-4">
							<h3><a href="#">Study Lesson</a></h3>
							<p class="subheading"><span>Class time:</span> 9:00am - 10am</p>
							<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
						</div>
					</div>
					<div class="col-md-6 course d-lg-flex ftco-animate"> --}}
						{{-- <div class="img" style="background-image: url({{URL::to('/')}}/public/images/course-6.jpg);"></div> --}}
						{{-- <div class="text bg-light p-4">
							<h3><a href="#">Experiment Lesson</a></h3>
							<p class="subheading"><span>Class time:</span> 9:00am - 10am</p>
							<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
						</div>
					</div> --}}
				</div>
			{{-- </div> --}}
		</section>

@endsection
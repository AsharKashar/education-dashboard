{{-- This is the SERVICES page --}}

@extends('mainlayout')

@section('content')    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{URL::to('/')}}/public/images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Services</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Services <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
    	<div class="container">
          {{-- <div class="row">
          

          
          </div> --}}



    		<div class="row">
			
					
			
			
			<div class="col-md-4 col-lg-3 ftco-animate">
        		<div class="pricing-entry bg-light pb-4 text-center">
        			<div>
	        			<h3 class="mb-3">Teacher Training</h3>
	        			{{-- <p><span class="price">$24.50</span> <span class="per">/ 5mos</span></p> --}}
	        		</div>
	        		<div class="img" style="background-image: url({{URL::to('/')}}/public/images/bg_1.jpg);"></div>
	        		<div class="px-4">
	        			<p>Our program “TechnoToT (train the trainer)” ...</p>
        			</div>
        			<p class="button text-center"><a href="{{asset('services/teachertraining')}}" class="btn btn-primary px-4 py-3">View Details</a></p>
        		</div>
			</div>
		
			


		
        	<div class="col-md-5 col-lg-3 ftco-animate">
        		<div class="pricing-entry bg-light pb-4 text-center">
        			<div>
	        			<h3 class="mb-3">Facilitate Lab Setup</h3>
	        			{{-- <p><span class="price">$34.50</span> <span class="per">/ 5mos</span></p> --}}
	        		</div>
	        		<div class="img" style="background-image: url({{URL::to('/')}}/public/images/bg_2.jpg);"></div>
        			<div class="px-4">
	        			<p>Our expert can help the schools and institutes...</p>
        			</div>
        			<p class="button text-center"><a href="{{asset('/services/labsetup')}}" class="btn btn-secondary px-4 py-3">View Details</a></p>
        		</div>
			</div>
		


		
        	<div class="col-md-5 col-lg-3 ftco-animate">
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
		



		
        	<div class="col-md-5 col-lg-3 ftco-animate">
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
		





		
			<div class="col-md-5 col-lg-3 ftco-animate">
					<div class="pricing-entry bg-light pb-4 text-center">
						<div>
							<h3 class="mb-3">Specialized curriculum design</h3>
							{{-- <p><span class="price">$89.50</span> <span class="per">/ 5mos</span></p> --}}
						</div>
						<div class="img" style="background-image: url({{URL::to('/')}}/public/images/bg_3.jpg);"></div>
						<div class="px-4">
							<p>The technology, curriculum and professional...</p>
						</div>
						<p class="button text-center" ><a href="{{asset('services/specializedCur')}}" class="btn btn-tertiary px-4 py-3" style="background:grey;border:1px solid grey">View Details</a></p>
					</div>
				</div> 
		
					


        </div>
    	</div>
    </section>

@endsection

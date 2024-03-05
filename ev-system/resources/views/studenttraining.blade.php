{{-- This is the TEACHER TRAINING PROFILE page --}}

@extends('mainlayout')

@section('content')
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{URL::to('/')}}/public/images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Student Training</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{asset('/services')}}">Services <i class="ion-ios-arrow-forward"></i></a></span><span>Student Training <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class=" ftco-no-pb">
			<div class="container">
                    <div class="row" style="width:100%">
                        <div class="col wrap-about py-5 pr-md-4 ftco-animate">
                                <center><h2 class="mb-4">Student Training</h2>
                                <p>Our program TechnoKid (“train the kid”) is focused on engulfing fundamentals
                                   of computer science to young kids. We provide structured learning and implement 
                                   it through effective tools. Our algorithm based learning helps young minds to 
                                   think logically and thus coding comes naturally to children. We impart fundamentals 
                                   of creative computing and render coding through practice in respective tools.
                                    Our learning management and assessment module helps students to keep record of 
                                    their learning and helps them to learn interactively. </p></center>
                            
							
                            </div>
                        
                    </div>


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
        </script>    
    @endsection

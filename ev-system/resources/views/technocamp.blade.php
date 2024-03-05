{{-- This is the TEACHER TRAINING PROFILE page --}}

@extends('mainlayout')

@section('content')
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{URL::to('/')}}/public/images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Technocamps</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{asset('/services')}}">Services <i class="ion-ios-arrow-forward"></i></a></span><span>Technocamps <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class=" ftco-no-pb">
			<div class="container">
                    <div class="row" style="width:100%">
                        <div class="col wrap-about py-5 pr-md-4 ftco-animate">
                                <center><h2 class="mb-4">Technocamps</h2>
                                <p>Our program “TechnoToT 
                            (train the trainer)” trains the teachers, instructors and educators to teach the creative 
                            computing through long-term and extensive professional development, coaching and mentoring.
                             Our professional development trainers work with the educators and follow the developed 
                             customized plans for teachers and educators using the research based interactive methodologies.
                              We deliver on-site professional development, an interest-driven curriculum, and resources 
                              for sustainable, large-scale support. We also provide the training for our own Learning 
                              management and assessment module to the teachers where they can access their students and
                               monitor their performance. After completing the training, the teacher will prove to be 
                               sufficient in their knowledge and efficient in teaching independently</p></center>
                            
							
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

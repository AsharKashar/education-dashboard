{{-- This is the TEACHER TRAINING PROFILE page --}}

@extends('mainlayout')

@section('content')
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{URL::to('/')}}/public/images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Specialized curriculum design </h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{asset('/services')}}">Services <i class="ion-ios-arrow-forward"></i></a></span><span>Specialized curriculum design  <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class=" ftco-no-pb">
			<div class="container">
                    <div class="row" style="width:100%">
                        <div class="col wrap-about py-5 pr-md-4 ftco-animate">
                                <center><h2 class="mb-4">Specialized curriculum design </h2>
                                <p>The technology, curriculum and professional development facilitators at 
                                    Technoknowledge has developed a state of art and interactive curriculum
                                     where students are learning to code as early as in kindergarten. We used 
                                     a combination of free open-source curricula and long-term professional 
                                     development to customize and support implementation for the young students. 
                                     We can also design specialized curriculum according to the duration, lecture 
                                     numbers and terms for specific institute. Our professional developers and content
                                      designers can provide high quality material as per the institute requirement.   </p></center>
                            
							
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

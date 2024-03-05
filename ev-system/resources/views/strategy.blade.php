{{-- This is the TEACHER TRAINING PROFILE page --}}

@extends('mainlayout')

@section('content')
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{URL::to('/')}}/public/images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Strategy</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home <i class="ion-ios-arrow-forward"></i></a><span>Strategy <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class=" ftco-no-pb">
			<div class="container">
                    <div class="row" style="width:100%">
                        <div class="col wrap-about py-5 pr-md-4 ftco-animate">
                                <center><h2 class="mb-4">Strategy</h2>
                                <p align="justify">Data to be provided...</p></center>
                            
							
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

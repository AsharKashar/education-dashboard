{{-- This is the TEACHER TRAINING PROFILE page --}}

@extends('mainlayout')

@section('content')
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{URL::to('/')}}/public/images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Corporate social responsibility</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>>Corporate social responsibility <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class=" ftco-no-pb">
			<div class="container">
                    <div class="row" style="width:100%">
                        <div class="col wrap-about py-5 pr-md-4 ftco-animate">
                                <center><h2 class="mb-4">Corporate social responsibility</h2>
                                <p align="justify">Our approach to corporate social responsibility (CSR) reflects
                                   the steps that we aretaking   to   ensure   that   we   are,   and  
                                    remain,   a   good   corporate   citizen.   Socialresponsibility
                                     encompasses everything we do that has an impact on society aroundus – 
                                     it remains the core of our ethos, the foundation of which is the 
                                     recognition thatas part of the growing economy, social responsibility
                                      needs to be the primarycommitment of every  organization. Through 
                                      Technoknowledge and our team’s motivation, we plan to focus on StreetChildren  
                                      and the  Third Gender. Diversity, equality and inclusion, our sharedvalues as 
                                      an organization, gives us the perfect platform to launch our CSR projectsalongside
                                       our primary venture.As part of growing economy we recognize the need of our
                                        Social Responsibility andour approach toward educating children in the field of
                                         Computer Sciences willculminate in increasing the percentage of schools teaching 
                                         code from only 40% to arobust growing sector. Similarly, Pakistan being one of the 
                                         few countries of theworld that recognize the third gender on identity cards, we feel 
                                         it is incumbent onevery   citizen of this country to identify their potential. 
                                         We are committed toabsorbing them into the learning pyramid so that they may
                                          flourish personally andcontribute to the society and economy of Pakistan. </p></center>
                            
							
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

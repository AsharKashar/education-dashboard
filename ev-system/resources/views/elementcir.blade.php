@extends('mainlayout')

@section('content')
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{URL::to('/')}}/public/images/bg_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Elementary Level Curriculum</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="{{asset('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span><span class="mr-2"><a href="{{asset('/curriculum')}}">Curriculum <i class="ion-ios-arrow-forward"></i></a></span> <span>Elementary Level Curriculum <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    

    
		<section class="ftco-section" style="padding-top: 60px">
        <div class="container">

            
          <div class="container" style="padding-bottom: 3em;">
                <div class="row">
                  <div class="col-lg"><center><h2 class=""><b>Elementary Level Curriculum</b></h2></center></div>
                </div>
                <div class="row">
                        <div class="col-lg" style="padding-top:2em;padding-bottom:2em"><center><p style="color: rgba(0, 0, 0, 0.5);">Our curriculum includes projects and resources designed specifically for elementary coders and coding educators with little or no coding experience. Our curriculum is based on popular block coding applications and tools where we gradually introduce a variety of practices and concepts while simultaneously introducing young coders to a variety of blocks and tools in ScratchJr. </p></center></div>
                      </div>
                {{-- <center><div class="row" style="width:60%">
                        <div class="container" style="padding-bottom:2em">
                                <div class="row">
                                         <div class="col"> <div class="text bg-light p-4" style="width: 100%">
                                                <i class="fas fa-desktop" style="font-size:48px;"></i></div></div> 
                                <div class="col"><div class="text p-4"><i class="fas fa-desktop" style="font-size:48px"></i></div>
                                <b>Introduction to computer (.ppt)</b></div>
                                
                                
                                <div class="col"><div class="text p-4"><i class="fas fa-code" style="font-size:48px"></i></div>
                                <b>Introduction to ICTS (.ppt)</b></div>
                                
                                
                                <div class="col"><div class="text p-4"><i class="fas fa-mobile" style="font-size:48px"></i></div>
                                <b>Internet & smart devices (.ppt)</b></div></div></div>
                               
                    <center><p> 
                      </p>
                       <a href="#!" class="show_hide" data-content="toggle-text">Read More</a> 
                    </center>
                    </div>
                       
                      
                      </center>
              
            </div>

            <div class="container" style="padding-bottom: 3em;">
                    <div class="row ftco-animate" >
                        <div class="col-md-12 col-lg-5" >
                                <div class="col-lg" style="padding-top:2em;padding-bottom:2em"><center><h4 style="color: rgba(0, 0, 0, 0.5);"><b>For grade 1, 2 & 3: (logic Development)</b></h4></center></div>
                            <ul style="color: rgba(0, 0, 0, 0.5);">
                                <li>Crazy Character Algorithms Activity: an Introduction to Sequences of Instructions</li>
                                <li>My School Day</li>
                                <li>Are Computer Clever</li>
                                <li>Lego Building Algorithm Activity</li>
                                <li>The Adventures of Kara, Winston and the SMART Crew</li>
                                <li>Zippep's Astro Circus</li>
                                <li>Play and learn: being online</li>
                                <li>Smartie the Penguin</li>
                            </ul>
                        </div>
                        <div class=" col-lg-2" >
                        </div>
                    <div class="col-md-12 col-lg-5" >
                          <div class="col-lg" style="padding-top:2em;padding-bottom:2em"><center><h3 style="color: rgba(0, 0, 0, 0.5);"><b>For Grade 4, 5:  (logic Development)</b></h3></center></div>
                          <ul style="color: rgba(0, 0, 0, 0.5);">
                                <li>advance problems will be customized</li>
                          </ul>
                        </div>
                        
                    <div class="col-md-12 col-lg-5" >
                            <div class="col-lg" style="padding-top:2em;padding-bottom:2em"><center><h3 style="color: rgba(0, 0, 0, 0.5);"><b>Programming</b></h3></center></div>
                            <ul style="color: rgba(0, 0, 0, 0.5);">
                                    <li>Course A, B, C can be used (code.org) for 1  & 2  grade</li>
                                    <li>Course D,E,F can be used (code.org) for 3,4 &5  grade</li>
                            </ul>
                        </div>
                        <div class=" col-lg-2" >
                            </div>
                    <div class="col-md-12 col-lg-5" >
                            <div class="col-lg" style="padding-top:2em;padding-bottom:2em"><center><h3 style="color: rgba(0, 0, 0, 0.5);"><b>MS Office</b></h3></center></div>
                            <ul style="color: rgba(0, 0, 0, 0.5);">
                                    <li>MS Paint</li>
                                    <li>MS Word Basics</li>
                                    <li>Power Point</li>
                            </ul>
                        </div>
                        


                    </div> --}}
            </div>

            </div>
			{{-- </div> --}}
		</section>

@endsection
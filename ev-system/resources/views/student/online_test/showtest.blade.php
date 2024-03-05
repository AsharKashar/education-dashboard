@extends('layouts.app')

@section('title')
{{ trans('subject_lang.panel_title') }}
@endsection
@section('content')
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('subject_lang.panel_title') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              {{ trans('subject_lang.panel_title') }}
                          </header>
                          <div>
                              <ul class="nav nav-tabs" id="myTab" role="tablist">
                                  <li class="nav-item active">
                                      <a class="nav-link" data-toggle="tab" href="#level1" role="tab" aria-selected="true">Level 1</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#level2" role="tab" aria-selected="true">Level 2</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#level3" role="tab" aria-selected="true">Level 3</a>
                                  </li>
                              </ul>
                              <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade in active" id="level1" role="tabpanel">
                                      <div class="row">
                                        @foreach( App\Test::where('class_id', auth()->user()->class_id)->where('status',1)->orderBy('created_at','desc')->where('category', '1')->get() as $test )
                                        <div class="col-lg-3">
                                          <!-- small box -->
                                          <div class="test-grid">
                                            <div class="inner">
                                              <h2>{{ $test->name }}</h2>
                                              <span class="badge badge-new"> Level: {{ $test->category }} </span>
                                              <h4>Class: {{ App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : '' }}</h4>
                                              <h5>Subject: {{ $test->subject($test->subject_id) ? $test->subject($test->subject_id)->title : '' }}</h5>
                                              <p>Duration: {{ $test->duration }} minutes</p>
                                            </div>
                                            <a href="{{ url('student/start_test/'.$test->id) }}" class="small-box-footer">
                                              Start Test <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                          </div>
                                        </div>
                                        @endforeach
                                      </div>
                                  </div>
                                  <div class="tab-pane fade in" id="level2" role="tabpanel">
                                      <div class="row">
                                        @foreach(App\Test::where('class_id', auth()->user()->class_id)->where('status',1)->orderBy('created_at','desc')->where('category', '2')->get() as $test )
                                        <div class="col-lg-3">
                                          <!-- small box -->
                                          <div class="test-grid">
                                            <div class="inner">
                                              <h2>{{ $test->name }}</h2>
                                              <span class="badge badge-new"> Level: {{ $test->category }} </span>
                                              <h4>Class: {{ App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : '' }}</h4>
                                              <h5>Subject: {{ $test->subject($test->subject_id) ? $test->subject($test->subject_id)->title : '' }}</h5>
                                              <p>Duration: {{ $test->duration }} minutes</p>
                                            </div>
                                            <a href="{{ url('student/start_test/'.$test->id) }}" class="small-box-footer">
                                              Start Test <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                          </div>
                                        </div>
                                        @endforeach
                                      </div>
                                  </div>

                                  <div class="tab-pane fade in" id="level3" role="tabpanel">
                                      <div class="row">
                                        @foreach(App\Test::where('class_id', auth()->user()->class_id)->where('status',1)->orderBy('created_at','desc')->where('category', '3')->get() as $test )
                                        <div class="col-lg-3">
                                          <!-- small box -->
                                          <div class="test-grid">
                                            <div class="inner">
                                              <h2>{{ $test->name }}</h2>
                                              <span class="badge badge-new"> Level: {{ $test->category }} </span>
                                              <h4>Class: {{ App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : '' }}</h4>
                                              <h5>Subject: {{ $test->subject($test->subject_id) ? $test->subject($test->subject_id)->title : '' }}</h5>
                                              <p>Duration: {{ $test->duration }} minutes</p>
                                            </div>
                                            <a href="{{ url('student/start_test/'.$test->id) }}" class="small-box-footer">
                                              Start Test <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                          </div>
                                        </div>
                                        @endforeach
                                      </div>
                                  </div>
                              </div>
                          </div>
                          
                          
                      </section>
                  </div>
              </div>
               

@endsection

@extends('layouts.app')

@section('title')
Test Starts
@endsection
@section('content')
<style type="text/css">
.timer{float: right;}
.istime{color: red;font-size: 25px}
.jst-hours {
  float: left;
}
.jst-minutes {
  float: left;
}
.jst-seconds {
  float: left;
}
.jst-clearDiv {
  clear: both;
}
.jst-timeout {
  color: red;
}
.more .radio-inline {display: block;margin: 10px}
</style>
<body onload="lll()">

            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">Test Starts</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Test Start
                          </header>
                          <header class="panel-heading">
                          <div style="float:left;">
                          <div class="timer" id="tim"></div>
                        </div>
                        </header>
                          <div class="well">
                            <form method="POST" action="{{ url('student/test/store') }}" id="form_id">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="student_id" value="{{ Auth::user()->id }}">
                              <input type="hidden" name="test_id" value="{{ $id }}">
                            <div class="tab-content">
                             @foreach($questions as $key => $tq)
                              <div id="menu{{ $tq->id }}" class="tab-pane fade in @if(($key+1) == '1') active @endif">
                                <h3>Question {{ $key+1 }}</h3>
                                <p>{{ $tq->question }}</p>
                                <br>
                                @if ($tq->type == 'options')
                                  @php
                                      $uniqueString = str_random(10);
                                      $getoptions = App\TestOption::where('question_id', $tq->id)->get();
                                  @endphp
                                  <input type="hidden" name="id[]" value="{{$uniqueString}}">
                                  <input type="hidden" name="type[{{$uniqueString}}]" value="options">
                                  <div class="radio-list more">
                                    @foreach ($getoptions as $idx =>  $go)
                                    <label class="radio-inline">
                                      <input type="radio" name="option[{{$uniqueString}}][]" value="{{$idx}}">{{$idx+1}}. {{ $go->option }}
                                    </label>
                                    @endforeach
                                  </div>
                                @elseif($tq->type == 'fillword')
                                  @php
                                      $uniqueString = str_random(10);
                                  @endphp
                                  <input type="hidden" name="id[]" value="{{$uniqueString}}">
                                  <input type="hidden" name="type[{{$uniqueString}}]" value="fillword">
                                  @for ($i = 0; $i < $tq->options; $i++)
                                    <div class="row">
                                      <div class="col-md-4">
                                        <input type="text" name="option[{{$uniqueString}}][]" class="form-control" placeholder="Answer" >
                                      </div>
                                    </div>
                                    <br>
                                  @endfor
                                @elseif($tq->type == 'yesno')
                                  @php
                                      $uniqueString = str_random(10);
                                  @endphp
                                  <input type="hidden" name="id[]" value="{{$uniqueString}}">
                                  <input type="hidden" name="type[{{$uniqueString}}]" value="yesno">
                                  <div class="radio-list more">
                                    <label class="radio-inline">
                                      <input type="radio" name="option[{{$uniqueString}}][]" value="0"> Yes
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="option[{{$uniqueString}}][]" value="1"> No
                                    </label>
                                  </div>
                                @elseif($tq->type == 'short')
                                  @php
                                      $uniqueString = str_random(10);
                                  @endphp
                                  <input type="hidden" name="id[]" value="{{$uniqueString}}">
                                  <input type="hidden" name="type[{{$uniqueString}}]" value="short">
                                  @for ($i = 0; $i < $tq->options; $i++)
                                    <div class="row">
                                      <div class="col-md-4">
                                        <input type="text" name="option[{{$uniqueString}}][]" class="form-control" placeholder="Answer" >
                                      </div>
                                    </div>
                                    <br>
                                  @endfor
                                @elseif($tq->type == 'file')
                                  <div>
                                    @php
                                        $uniqueString = str_random(10);
                                        $link = strtolower('ev-assets/uploads/test-files/'. $tq->file);
                                        $link2 = 'ev-assets/uploads/test-files/'. $tq->file;
                                        $extensions = array("gif", "jpg", "png", "jpeg", "png", "tiff", "tif");
                                        $urlExt = pathinfo($link, PATHINFO_EXTENSION);
                                    @endphp
                                  <input type="hidden" name="id[]" value="{{$uniqueString}}">
                                  <input type="hidden" name="type[{{$uniqueString}}]" value="file">
                                    @if ($tq->file)
                                      @if (in_array($urlExt, $extensions))
                                        <div>
                                            <img src="{{url($link2)}}" style="max-width:50%">
                                        </div>
                                        <br>
                                      @else 
                                        <a href="{{url($link2)}}" class="btn btn-primary">
                                          Download attached file
                                        </a>
                                        <br>
                                      @endif
                                      <div>
                                        <div class="row">
                                          <div class="col-md-4">
                                            <textarea name="option[{{$uniqueString}}][]"  class="form-control" placeholder="Answer"></textarea>
                                          </div>
                                        </div>
                                      </div>
                                    @endif
                                  </div>
                                @endif
                              </div>
                             @endforeach
                            </div>
                            <ul class="pagination">
                              @foreach ($questions as $key => $value)
                                <li class="@if(($key+1) == '1') active @endif"><a data-toggle="pill" href="#menu{{ $value->id }}">{{ $key+1 }}</a></li>
                              @endforeach
                            </ul>
                            <!-- Modal -->
                              <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Submit Test</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>Are you sure you want to submit?</p>
                                    </div>
                                    <div class="modal-footer">
                                      
                                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                      <input type="submit" class="btn btn-primary" value="Yes" style="float:right;">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- Modal -->
                              
                              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"style="">Submit Exam</button>
                            </form>
                            <p style="font-size:9px;color:red"><i>Note: Submit test before the time is up!!!</i></p>

                          </div>
                      </section>
                  </div>
              </div>
               
<script type="text/javascript" src="https://cdn.rawgit.com/sygmaa/CircularCountDownJs/master/circular-countdown.min.js"></script>
<script>
function lll (argument) {
  $('.timer').circularCountDown({
          duration: {
              seconds: {{ $test->duration ? $test->duration * 60 : 60}}
          
          },
      end: function(){
        alert('time up!!!!!!!!!!!!!!!');
        $('#form_id').submit();
      }
        });

/**/  
}    
</script>
@endsection

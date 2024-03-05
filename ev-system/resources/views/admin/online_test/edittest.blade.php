@extends('layouts.app')

@section('title')
Edit Tests
@endsection
@section('content')
@include('layouts.teststyle')
<div class="content-wrapper">
    <div class="edu-loading"></div>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                    <li class="active">Edit Test</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ trans('other.online_test') }}
                    </header>
                    {!! Form::open(array('url'=>'test/update_test','id'=>'quiz-form','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                        <div class="container-fluid">
                        <input type="hidden" name="test_id" value="{{$test->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text"  class="form-control" value="{{ $test->name }}" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('other.category') }}</label>
                                    <div class="col-lg-9">
                                        <select name="category" class="form-control" required>
                                            <option value="1" @if($test->category == 1) selected @endif>{{ trans('other.level1') }}</option>
                                            <option value="2" @if($test->category == 2) selected @endif>{{ trans('other.level2') }}</option>
                                            <option value="3" @if($test->category == 3) selected @endif>{{ trans('other.level3') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('other.can_redo_test') }}?</label>
                                    <div class="col-lg-9">
                                        <select name="redo" class="form-control" required>
                                            <option value="6" @if($test->redo == 6) selected @endif>Anytime</option>
                                            <option value="1" @if($test->redo == 1) selected @endif>One Time</option>
                                            <option value="2" @if($test->redo == 2) selected @endif>Two Times</option>
                                            <option value="3" @if($test->redo == 3) selected @endif>Three Times</option>
                                            <option value="4" @if($test->redo == 4) selected @endif>Four Times</option>
                                            <option value="5" @if($test->redo == 5) selected @endif>Five Times</option>
                                            <option value="0" @if($test->redo == 0) selected @endif>Not Allowed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('other.duration') }} (in minutes)</label>
                                    <div class="col-lg-9">
                                        <input type="number" min="0"  class="form-control" value="{{ $test->duration }}" name="duration" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('sattendance_lang.attendance_select_classes') }}</label>
                                    <div class="col-lg-9">
                                        <select name="class_id" class="form-control" required  onchange="return get_class_subjects(this.value)">
                                            <option value="">Choose..</option>
                                            @foreach( App\Classes::get_classes() as $classl )
                                                <option value="{{ $classl->id }}"   @if($test->class_id == $classl->id) selected @endif>{{ $classl->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('other.subject') }}</label>
                                    <div class="col-lg-9">
                                        <select name="subject_id" id="subject_selector_holder" class="form-control" required>
                                            @php
                                                if ($test->class_id) {
                                                    $subj = App\Subject::where('class_id',$test->class_id)->get();
                                                }
                                                else{
                                                    $subj = App\Subject::where('class_id',App\Classes::first()->id)->get();
                                                }
                                            @endphp
                                            @if($subj)
                                                @foreach( $subj as $sub )
                                                    <option value="{{ $sub->id }}"  @if($test->subject_id == $sub->id) selected @endif>{{ $sub->title }}</option>
                                                @endforeach
                                            @else
                                                <option>Select a class first</option>
                                            @endif 
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('other.status') }}</label>
                                    <div class="col-lg-9">
                                        <select name="status" class="form-control" required>
                                            <option value="2" @if($test->status == 2) selected @endif>Pending</option>
                                            <option value="1" @if($test->status == 1) selected @endif>Enabled</option>
                                            <option value="0" @if($test->status == 0) selected @endif>Disabled</option>
                                        </select>
                                    </div>
                                </div>

                                @if (Auth::user()->admin_type == 'super')
                                    <div class="form-group">
                                        <label  class="col-lg-2 control-label">{{ trans('other.global') }}</label>
                                        <div class="col-lg-9">
                                            <select name="global" class="form-control" required>
                                                <option value="1" @if($test->global == 1) selected @endif>Yes</option>
                                                <option value="0" @if($test->global == 0) selected @endif>No</option>
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h3 style="margin-left:10px">{{ trans('other.question_editor') }}</h3>
                                <hr>

                                <div class="question-editor">
                                    <div></div>
                                    <h1>Edit questions here</h1>

                                    <ol class="question-editor-inner">
                                        @foreach ($testQuestions as $tq)
                                            @if ($tq->type == 'options')
                                                @php
                                                    $uniqueString = str_random(10);
                                                @endphp
                                                <li id="option-question" type="options" ref="{{$uniqueString}}"> 	
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse"  onclick="onlybar(this);" data-parent="#accordion" href="#collapse{{$uniqueString}}">
                                                            <i class="glyphicon glyphicon glyphicon-chevron-down" title="Show/Hide"></i> 
                                                            {{ trans('other.options') }}
                                                        </a>
                                                        <button class="btn btn-danger btn-xs pull-right" type="button" id="btn-close-quiz">x</button>
                                                    </h4>
                                                    <div id="collapse{{$uniqueString}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <input type="hidden" name="type[]" value="options">
                                                        <input type="hidden" name="id[]" value="{{$uniqueString}}">
                                                        <label class="form-label"><strong>Write question:</strong></label>
                                                        <input type="text" class="form-control question" required value="{{$tq->question}}" name="question[]" placeholder="Question...">
                                                        <p class="mt-15">Options:</p>
                                                        <div class="options-group">
                                                            <div class="options-lists">
                                                                @php
                                                                    $getoptions = App\TestOption::where('question_id', $tq->id)->get();
                                                                @endphp
                                                                @foreach ($getoptions as $go)
                                                                    <div class="options">
                                                                        <div class="bor-bo-opt mb10">
                                                                            <div class="input-group">
                                                                                <input type="text" name="option[{{$uniqueString}}][]" class="form-control" value="{{$go->option}}" placeholder="Answer..." required>
                                                                                <span class="input-group-btn">
                                                                                    <a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a>
                                                                                </span>
                                                                            </div>
                                                                            <input type="checkbox" @if($go->correct == 1) checked @endif name="correct[{{$uniqueString}}][]"> 
                                                                                <label class="ckbox mb20 mt-10"> This is correct answer</label>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <button class="btn btn-success btn-md mt-10" type="button" id="add_option"><i class="glyphicon glyphicon-plus"></i> Add answer</button>
                                                        </div>
                                                        <div class="points"><label class="mrg-10">Point: </label><input name="point[]" maxlength="2"  max="99" min="0" value="{{$tq->point}}" class="form-control ib input-points" type="number" required></div>
                                                        <hr>
                                                    </div>
                                                </li>
                                            @elseif($tq->type == 'fillword')
                                                @php
                                                    $uniqueString = str_random(10);
                                                @endphp
                                                <li id="option-question" type="fillword" ref="{{$uniqueString}}"> 	
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse"  onclick="onlybar(this);" data-parent="#accordion" href="#collapse{{$uniqueString}}">
                                                            <i class="glyphicon glyphicon glyphicon-chevron-down" title="Show/Hide"></i> 
                                                            {{ trans('other.fill_word') }}
                                                        </a>
                                                        <button class="btn btn-danger btn-xs pull-right" type="button" id="btn-close-quiz">x</button>
                                                    </h4>
                                                    <div id="collapse{{$uniqueString}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <input type="hidden" name="type[]" value="fillword">
                                                        <input type="hidden" name="id[]" value="{{$uniqueString}}">
                                                        <label class="form-label"><strong>Write sentence:</strong></label>
                                                    
                                                        <input type="text" class="form-control question" name="question[]" required value="{{$tq->question}}" placeholder="Sentence...">
                                                        <p class="mt-10"><label class="label label-info">Hint:</label> replace word to be complemented with <strong>____</strong>, i.e. 4 undescores</p>
                                                        <p class="mt-15">Correct Answer:</p>
                                                        <div class="options-group">
                                                            <div class="options-lists">
                                                                @for ($i = 0; $i < $tq->options; $i++)
                                                                    <div class="options">
                                                                        <div class="bor-bo-opt mb10">
                                                                            <div class="input-group">
                                                                                <input type="text" name="option[{{$uniqueString}}][]" class="form-control" placeholder="Correct Answer...">
                                                                                <span class="input-group-btn">
                                                                                    <a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a>
                                                                                </span>
                                                                            </div>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                @endfor
                                                            </div>
                                                            <button class="btn btn-success btn-md mt-10" type="button" id="add_option"><i class="glyphicon glyphicon-plus"></i> Add correct answer</button>
                                                        </div>
                                                        <div class="points"><label class="mrg-10">Point: </label><input name="point[]" maxlength="2"  max="99" min="0" value="{{$tq->point}}" class="form-control ib input-points" type="number" required></div>
                                                        <hr>
                                                    </div>
                                                </li>
                                            @elseif($tq->type == 'yesno')
                                                @php
                                                    $uniqueString = str_random(10);
                                                @endphp
                                                <li id="option-question" type="yesno" ref="{{$uniqueString}}"> 	
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse"  onclick="onlybar(this);" data-parent="#accordion" href="#collapse{{$uniqueString}}">
                                                            <i class="glyphicon glyphicon glyphicon-chevron-down" title="Show/Hide"></i> 
                                                            {{ trans('other.yes_no') }}
                                                        </a>
                                                        <button class="btn btn-danger btn-xs pull-right" type="button" id="btn-close-quiz">x</button>
                                                    </h4>
                                                    <div id="collapse{{$uniqueString}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <input type="hidden" name="type[]" value="yesno">
                                                        <input type="hidden" name="id[]" value="{{$uniqueString}}">
                                                        <label class="form-label"><strong>Write Question:</strong></label>
                                                    
                                                        <input type="text" class="form-control question" name="question[]" required  value="{{$tq->question}}" placeholder="Question...">
                                                        <div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="option[{{$uniqueString}}][]" value="1"> Yes
                                                            </label>
                                                        </div>
                                                        <div>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="option[{{$uniqueString}}][]" value="2"> No
                                                            </label>
                                                        </div>
                                                        <br>
                                                        <p class="mt-10"><label class="label label-info">Hint:</label> &nbsp;Check correct answer</p>
                                                        <br>
                                                        <div class="points"><label class="mrg-10">Point: </label><input name="point[]"  maxlength="2"  max="99" min="0" value="{{$tq->point}}" class="form-control ib input-points" type="number" required></div>
                                                        <hr>
                                                    </div>
                                                </li>
                                            @elseif($tq->type == 'short')
                                                @php
                                                    $uniqueString = str_random(10);
                                                @endphp
                                                <li id="option-question" type="short" ref="{{$uniqueString}}"> 	
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse"  onclick="onlybar(this);" data-parent="#accordion" href="#collapse{{$uniqueString}}">
                                                            <i class="glyphicon glyphicon glyphicon-chevron-down" title="Show/Hide"></i> 
                                                            {{ trans('other.short_answer') }}
                                                        </a>
                                                        <button class="btn btn-danger btn-xs pull-right" type="button" id="btn-close-quiz">x</button>
                                                    </h4>
                                                    <div id="collapse{{$uniqueString}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <input type="hidden" name="type[]" value="short">
                                                        <input type="hidden" name="id[]" value="{{$uniqueString}}">
                                                        <label class="form-label"><strong>Write question:</strong></label>
                                                        <input type="text" class="form-control question" name="question[]" required value="{{$tq->question}}" placeholder="Question...">
                                                        <p class="mt-15">Correct Answer:</p>
                                                        <div class="options-group">
                                                            <div class="options-lists">
                                                                @for ($i = 0; $i < $tq->options; $i++)
                                                                    <div class="options">
                                                                        <div class="bor-bo-opt mb10">
                                                                            <div class="input-group">
                                                                                <input type="text" name="option[{{$uniqueString}}][]" class="form-control" placeholder="Correct Answer...">
                                                                                <span class="input-group-btn">
                                                                                    <a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a>
                                                                                </span>
                                                                            </div>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                @endfor
                                                            </div>
                                                            <button class="btn btn-success btn-md mt-10" type="button" id="add_option"><i class="glyphicon glyphicon-plus"></i> Add correct answer</button>
                                                        </div>
                                                        <div class="points"><label class="mrg-10">Point: </label><input name="point[]" maxlength="2"  max="99" min="0" value="{{$tq->point}}" class="form-control ib input-points" type="number" required></div>
                                                        <hr>
                                                    </div>
                                                </li>
                                            @elseif($tq->type == 'file')
                                                @php
                                                    $uniqueString = str_random(10);
                                                @endphp
                                                <li id="option-question" type="file" ref="{{$uniqueString}}"> 	
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse"  onclick="onlybar(this);" data-parent="#accordion" href="#collapse{{$uniqueString}}">
                                                            <i class="glyphicon glyphicon glyphicon-chevron-down" title="Show/Hide"></i> 
                                                            {{ trans('other.file') }}
                                                        </a>
                                                        <button class="btn btn-danger btn-xs pull-right" type="button" id="btn-close-quiz">x</button>
                                                    </h4>
                                                    <div id="collapse{{$uniqueString}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <input type="hidden" name="type[]" value="file">
                                                        <input type="hidden" name="id[]" value="{{$uniqueString}}">
                                                        <label class="form-label"><strong>Write question:</strong></label>
                                                        <textarea class="form-control question" name="question[]" required placeholder="Question...">{{$tq->question}}</textarea>	
                                                        <div class="options">
                                                            <p class="mt-10">Upload file: <small>Only if it neccessary: </small></p>		
                                                            <input type="file" name="file[{{$uniqueString}}][]" class="form-control question">
                                                            <input type="hidden" name="fileedit[{{$uniqueString}}][]" value="{{$tq->file}}" class="form-control question">
                                                            <br>
                                                            <div>
                                                                @php
                                                                    $link = strtolower('ev-assets/uploads/test-files/'. $tq->file);
                                                                    $link2 = 'ev-assets/uploads/test-files/'. $tq->file;
                                                                    $extensions = array("gif", "jpg", "png", "jpeg", "png", "tiff", "tif");
                                                                    $urlExt = pathinfo($link, PATHINFO_EXTENSION);
                                                                @endphp
                                                                @if ($tq->file)
                                                                    @if (in_array($urlExt, $extensions))
                                                                        <div>
                                                                            <img src="{{url($link2)}}" style="max-width:400px">
                                                                        </div>
                                                                        <br>
                                                                    @else 
                                                                        <a href="{{url($link2)}}" class="btn btn-primary">
                                                                        Download attached file
                                                                        </a>
                                                                        <br>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                            <p class="mt-10 mb0"><label class="label label-info">INFO:</label> Teacher will upload file</p>
                                                        </div>
                                                        <div class="points"><label class="mrg-10">Point: </label><input name="point[]" maxlength="2"  max="99" min="0" value="{{$tq->point}}" class="form-control ib input-points" type="number" required></div>
                                                        <hr>
                                                    </div>
                                                </li>
                                            @endif
                                        
                                            
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quiz-right">
                                    <h3>{{ trans('other.select_question_type') }}</h3>
                                    <hr>
                                    <div class="quiz-action-section">
                                        <button type="button" class="btn btn-primary pickaction" val="options">{{ trans('other.options') }}</button>
                                        <button type="button" class="btn btn-primary pickaction" val="fillword">{{ trans('other.fill_word') }}</button>
                                        <button type="button" class="btn btn-primary pickaction" val="yesno">{{ trans('other.yes_no') }}</button>
                                        <button type="button" class="btn btn-primary pickaction" val="short">{{ trans('other.short_answer') }}</button>
                                        <button type="button" class="btn btn-primary pickaction" val="file">{{ trans('other.file') }}</button>
                                        <button type="submit" class="btn btn-success">Update Test Questions</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                            
                    </div>
                    {!! Form::close() !!}
                </section>
            </div>
        </div>
    </div>
</div>
               
    <script>
        var counter = "{{$testQuestions->count()}}";
        $('.pickaction').on('click', function (e) {
            e.preventDefault();
            $('.edu-loading').addClass('m-loading');
            var action = $(this).attr('val');
            $.ajax({
                    url: "{{url('select-quiz-type')}}" + '/' + action,
                    success: function(response)
                    {
                        $('.edu-loading').removeClass('m-loading');
                        counter += 1;
                        $('#number-holder').text(counter);
                        //$('#number-holder').text((eval($('.question-editor-inner').children().length)));
                        $('.question-editor-inner').append(response);
                        // $('.question-editor-inner #option-question:last-child #number-holder').text($('.question-editor-inner').children().length -1);
                    },
                    error: function(data) {
                        $('.edu-loading').removeClass('m-loading');
                    }
            });
        })
        $(document).on('click', '#btn-del-opt', function(e) {
            e.preventDefault();
            var parent = $(this).parent().parent().parent().parent();
            parent.slideUp(300, function () {
                parent.remove();
            });
        });
        $(document).on('click', '#btn-close-quiz', function (e) {
            e.preventDefault();
            var parent = $(this).parent().parent("#option-question");
            parent.slideUp(300, function () {
                parent.remove();
                counter -= 1;
                $('#number-holder').text(counter);
               // $('#number-holder').text((eval($('.question-editor-inner').children().length)));
            });
        })
        $(document).ready(function(){
            $('#quiz-form').submit(function (e) {
                var $checkboxes = $('#quiz-form').find('input[type="checkbox"]');
                $checkboxes.filter(':checked').val(1);
                $checkboxes.not(':checked').val(0);
                $checkboxes.prop('checked', true);
            })
                
        });
        $(function  () {
           // $("div.question-editor-inner").sortable();
            $("ol.question-editor-inner").sortable({
                group: 'question-editor-inner',
                pullPlaceholder: false,
                // animation on drop
                onDrop: function  ($item, container, _super) {
                    var $clonedItem = $('<li/>').css({height: 0});
                    $item.before($clonedItem);
                    $clonedItem.animate({'height': $item.height()});

                    $item.animate($clonedItem.position(), function  () {
                    $clonedItem.detach();
                    _super($item, container);
                    });
                },

                // set $item relative to cursor position
                onDragStart: function ($item, container, _super) {
                    var offset = $item.offset(),
                        pointer = container.rootGroup.pointer;

                    adjustment = {
                    left: pointer.left - offset.left,
                    top: pointer.top - offset.top
                    };

                    _super($item, container);
                },
                onDrag: function ($item, position) {
                    $item.css({
                    left: position.left - adjustment.left,
                    top: position.top - adjustment.top
                    });
                }
            });
        });
        $(document).on('keyup', '.input-points', function (e) {
            var val = $(this).val();
            if(val.length <= 2){
                $(this).val(val);
            }
            else{
                $(this).val(val.substring(0, 2));
            }
        });
        $(document).ready(function(){
            $(window).bind('scroll', function() {
            var navHeight = $( window ).height() - 70;
                if ($(window).scrollTop() > navHeight) {
                    $('.quiz-right').addClass('fixed');
                }
                else {
                    $('.quiz-right').removeClass('fixed');
                }
            });
        });
        function onlybar(el) {
			// el = $(el).closest('.sortable-div');
			el = $(el).find('i:first');
            el.toggleClass('rotated');
        }
        

        $(document).on('click', '#add_option', function (e) {
            e.preventDefault();
            var parent = $(this).parent();
            //var index = $(this).parent().parent().index();
            var attr = $(this).parent().parent().parent().attr('ref');
            var type = $(this).parent().parent().parent().attr('type');
            if(type == 'options'){
                var options = '<div class="options"><div class="bor-bo-opt mb10"><div class="input-group"><input type="text" name="option['+ attr +'][]" class="form-control" placeholder="Answer..." required><span class="input-group-btn"><a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a></span></div><input type="checkbox" name="correct['+ attr +'][]"> <label class="ckbox mb20 mt-10"> This is correct answer</label><br></div></div>';
            }
            else if(type == 'fillword' || type == 'short'){
                var options = '<div class="options"><div class="bor-bo-opt mb10"><div class="input-group"><input type="text" name="option['+ attr +'][]" class="form-control" placeholder="Correct Answer..."><span class="input-group-btn"><a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a></span></div><br></div></div>';
            }
            parent.find('.options-lists').append(options);
        });
        function get_class_subjects(class_id) {
            $.ajax({
                url: '<?php echo e(url('')); ?>/get_class_subjects/' + class_id ,
                success: function(response)
                {
                    jQuery('#subject_selector_holder').html(response);
                }
            });
        } 
    </script>
    <script src="{{asset('ev-assets/backend/plugins/bower_components/jquery-sortable/jquery-sortable.js')}}"></script>
@endsection

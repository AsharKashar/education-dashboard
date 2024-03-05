@extends('layouts.app')

@section('title')
Create Tests
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
                    <li class="active">{{ trans('other.online_test') }}</li>
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
                    {!! Form::open(array('url'=>'store_online_test','id'=>'quiz-form','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                        <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text"  class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('other.category') }}</label>
                                    <div class="col-lg-9">
                                        <select name="category" class="form-control" required>
                                            <option value="1">{{ trans('other.level1') }}</option>
                                            <option value="2">{{ trans('other.level2') }}</option>
                                            <option value="3">{{ trans('other.level3') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('other.can_redo_test') }}?</label>
                                    <div class="col-lg-9">
                                        <select name="redo" class="form-control" required>
                                            <option value="6">Anytime</option>
                                            <option value="1">One Time</option>
                                            <option value="2">Two Times</option>
                                            <option value="3">Three Times</option>
                                            <option value="4">Four Times</option>
                                            <option value="5">Five Times</option>
                                            <option value="0">Not Allowed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('other.duration') }} (in minutes)</label>
                                    <div class="col-lg-9">
                                        <input type="number" min="0"  class="form-control" value="" name="duration" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('sattendance_lang.attendance_select_classes') }}</label>
                                    <div class="col-lg-9">
                                        <select name="class_id" class="form-control" required  onchange="return get_class_subjects(this.value)">
                                            <option value="">Choose..</option>
                                            @foreach( App\Classes::get_classes() as $classl )
                                                <option value="{{ $classl->id }}">{{ $classl->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('other.subject') }}</label>
                                    <div class="col-lg-9">
                                        <select name="subject_id" id="subject_selector_holder" class="form-control" required>
                                            <option>Select a class first</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-lg-2 control-label">{{ trans('other.status') }}</label>
                                    <div class="col-lg-9">
                                        <select name="status" class="form-control" required>
                                            <option value="2">Pending</option>
                                            <option value="1">Enabled</option>
                                            <option value="0">Disabled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h3 style="margin-left:10px">{{ trans('other.question_editor') }}</h3>
                                <hr>

                                <div class="question-editor">
                                    <h4 class="badge badge-new" id="number-holder"></h4>
                                    <h1>Edit questions here</h1>

                                    <ol class="question-editor-inner">
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
                                        <button  type="submit" class="btn btn-success">{{ trans('other.submit_test_questions') }}</button>
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
        var counter = 0;
        $('.pickaction').on('click', function (e) {
            e.preventDefault();
            $('.edu-loading').addClass('m-loading');
            var action = $(this).attr('val');
            $.ajax({
                    url: "{{url('select-quiz-type')}}" + '/' + action,
                    success: function(response)
                    {
                        $('.edu-loading').removeClass('m-loading');
                        counter +=1;
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
                counter -=1;
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
        
        
        $(document).on('keyup', '.input-points', function (e) {
            var val = $(this).val();
            if(val.length <= 2){
                $(this).val(val);
            }
            else{
                $(this).val(val.substring(0, 2));
            }
        });
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
                var options = '<div class="options"><div class="bor-bo-opt mb10"><div class="input-group"><input type="text" name="option['+ attr +'][]" class="form-control" placeholder="Correct Answer..." required><span class="input-group-btn"><a class="btn btn-default" id="btn-del-opt"><i class="glyphicon glyphicon-remove"></i></a></span></div><br></div></div>';
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

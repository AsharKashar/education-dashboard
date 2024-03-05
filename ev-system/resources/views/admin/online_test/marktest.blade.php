@extends('layouts.app')

@section('title')
Mark Tests
@endsection
@section('content')
<div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                <li class="active">Mark Test</li>
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Mark Test
                </header>
                <div class="panel-body">
                    {!! Form::open(array('url'=>'mark-test-question','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                    <div class="row">
                        <div class="col-md-6" id="printTop">
                            <div class="form-group">
                                <div class="row">
                                    <label  class="col-lg-2 control-label" style="margin-top:5px">Select Test</label>
                                    <div class="col-lg-9">
                                        <select name="test_id" class="form-control">
                                            @foreach ($tests as $test)
                                                <option value="{{$test->id}}" @if(isset($test_id) && $test_id == $test->id) selected @endif>{{$test->name}}: {{App\Subject::find($test->subject_id) ? App\Subject::find($test->subject_id)->title: ''}} -- {{App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : ''}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <label  class="col-lg-2 control-label"></label>
                                <div class="col-lg-9">
                                    {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                @if(isset($results))
                    @if($results->count() > 0)
                    <hr />
                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Subject</th>
                                        <th>Class</th>
                                        <th>Status</th>
                                        <th>Score</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $results as $key => $result )
                                        <tr>
                                            <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                            <td data-title="Student Name">{{ App\User::find($result->student_id) ? App\User::find($result->student_id)->name : "" }}</td>
                                            @php
                                                $getTest = App\Test::find($result->test_id);
                                            @endphp
                                            <td data-title="Subject">{{ $getTest && App\Subject::find($getTest->subject_id) ? App\Subject::find($getTest->subject_id)->title : '' }}</td>
                                            <td data-title="Class">{{ $getTest && App\Classes::find($getTest->class_id) ? App\Classes::find($getTest->class_id)->title : '' }}</td>
                                            <td data-title="Status">
                                                @if($result->status == 1)
                                                    <button class="btn btn-success btn-xs"></i>Marked</button>
                                                @else
                                                    <button class="btn btn-warning btn-xs"></i>Pending</button>
                                                @endif
                                            </td>
                                            <td data-title="Score">{{ $result->score }}</td>
                                            <td data-title="Action">
                                                <a href="{{url('test/mark-test/'.$result->id)}}">
                                                    <button class="btn btn-primary btn-xs"><i class="fa fa-check"></i> Mark test</button>
                                                </a>
                                                @if($result->score)
                                                <a href="{{url('test/review-result/'.$result->id)}}">
                                                    <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Review result</button>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div style="padding:10px">
                            <h1>No test result found</h1>
                        </div>
                    @endif
                @endif
            </section>
        </div>
    </div>
               
<script type="text/javascript">

function get_class_subjects(class_id) {

    $.ajax({
        url: '<?php echo e(url('')); ?>/get_class_subjects/' + class_id ,
        success: function(response)
        {
            jQuery('#section_selector_holder').html(response);
        }
    });
    
} 
</script>
@endsection

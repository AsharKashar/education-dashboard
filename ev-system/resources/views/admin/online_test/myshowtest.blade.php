@extends('layouts.app')

@section('title')
{{ trans('other.tests_library') }}
@endsection
@section('content')
<div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                <li class="active">{{ trans('other.tests_library') }}</li>
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <a class="btn btn-success" href="{{url('create-test')}}" style="margin:5px">
                        {{ trans('other.add_test') }}
                    </a>
                </header>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link" data-toggle="tab" href="#allTests" role="tab" aria-selected="true">{{ trans('other.all_tests') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#myTests" role="tab" aria-selected="true">{{ trans('other.my_tests') }}</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade in active" id="allTests" role="tabpanel">
                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('other.test_name') }}</th>
                                        <th>{{ trans('other.subject') }}</th>
                                        <th>{{ trans('other.grade') }}</th>
                                        <th>{{ trans('other.duration') }}</th>
                                        <th>{{ trans('other.can_redo_test') }}</th>
                                        <th>{{ trans('other.test_questions') }}</th>
                                        <th>{{ trans('other.date_created') }}</th>
                                        <th>{{ trans('other.status') }}</th>
                                        <th>{{ trans('other.category') }}</th>
                                        <th>{{ trans('student_lang.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                    @foreach( $alltests as $key => $test )
                                        <tr>
                                            <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                            <td data-title="{{ trans('other.test_name') }}"> {{ $test->name }} </td>
                                            <td data-title="{{ trans('other.subject') }}">{{ $test->subject($test->subject_id)->title }}</td>
                                            <td data-title="{{ trans('other.grade') }}">{{ App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : '' }}</td>
                                            <td data-title="{{ trans('other.duration') }}">{{ $test->duration }} minutes</td>
                                            <td data-title="{{ trans('other.can_redo_test') }}">{{ $test->check_redo($test->redo) }}</td>
                                            <td data-title="{{ trans('other.test_questions') }}">
                                                @php
                                                    $getQuestion = App\TestQuestion::where('test_id', $test->id)->get();
                                                @endphp
                                                {{$getQuestion->count()}}
                                            </td>
                                            <td data-title="{{ trans('other.date_created') }}">{{ $test->created_at->format('d, M Y') }}</td>
                                            <td data-title="{{ trans('other.status') }}">
                                                @if($test->status == 1)<span class="badge badge-success"> Enabled </span> @elseif($test->status == 2)<span class="badge badge-warning"> Pending </span> @else <span class="badge badge-danger"> Disabled </span> @endif
                                            </td>
                                            <td data-title="{{ trans('other.category') }}">Level: {{ $test->category }}</td>
                                            <td data-title="{{ trans('student_lang.action') }}">
                                                <a class="active" href="{{ url('edit-test/'.$test->id) }}">
                                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                </a>
                                                <a class="active"  data-toggle="modal" href="#myModaldel{{ $test->id }}">
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                </a>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="myModaldel{{ $test->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                <a href="{{ url('test/delete/'.$test->id) }}">
                                                                <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="myTests" role="tabpanel">
                        <div id="hide-table">
                            <table id="exampletab" class="table table-striped table-bordered table-hover dataTable no-footer"> 
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('other.test_name') }}</th>
                                        <th>{{ trans('other.subject') }}</th>
                                        <th>{{ trans('other.grade') }}</th>
                                        <th>{{ trans('other.duration') }}</th>
                                        <th>{{ trans('other.can_redo_test') }}</th>
                                        <th>{{ trans('other.test_questions') }}</th>
                                        <th>{{ trans('other.date_created') }}</th>
                                        <th>{{ trans('other.status') }}</th>
                                        <th>{{ trans('other.category') }}</th>
                                        <th>{{ trans('student_lang.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
        
                                    @foreach( $tests as $key => $test )
                                        <tr>
                                            <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                            <td data-title="{{ trans('other.test_name') }}"> {{ $test->name }} </td>
                                            <td data-title="{{ trans('other.subject') }}">{{ $test->subject($test->subject_id)->title }}</td>
                                            <td data-title="{{ trans('other.grade') }}">{{ App\Classes::find($test->class_id) ? App\Classes::find($test->class_id)->title : '' }}</td>
                                            <td data-title="{{ trans('other.duration') }}">{{ $test->duration }} minutes</td>
                                            <td data-title="{{ trans('other.can_redo_test') }}">{{ $test->check_redo($test->redo) }}</td>
                                            <td data-title="{{ trans('other.test_questions') }}">
                                                @php
                                                    $getQuestion = App\TestQuestion::where('test_id', $test->id)->get();
                                                @endphp
                                                {{$getQuestion->count()}}
                                            </td>
                                            <td data-title="{{ trans('other.date_created') }}">{{ $test->created_at->format('d, M Y') }}</td>
                                            <td data-title="{{ trans('other.status') }}">
                                                @if($test->status == 1)<span class="badge badge-success"> Enabled </span> @elseif($test->status == 2)<span class="badge badge-warning"> Pending </span> @else <span class="badge badge-danger"> Disabled </span> @endif
                                            </td>
                                            <td data-title="{{ trans('other.category') }}">Level: {{ $test->category }}</td>
                                            <td data-title="{{ trans('student_lang.action') }}">
                                                <a class="active" href="{{ url('edit-test/'.$test->id) }}">
                                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                </a>
                                                <a class="active"  data-toggle="modal" href="#myModaldel{{ $test->id }}">
                                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                </a>
                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="myModaldel{{ $test->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                                <a href="{{ url('test/delete/'.$test->id) }}">
                                                                <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                
            </section>
        </div>
    </div>
               
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#exampletab').dataTable();
    });
</script>
@endsection
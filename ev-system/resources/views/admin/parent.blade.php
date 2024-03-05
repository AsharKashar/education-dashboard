@extends('layouts.app')

@section('title')
{{ trans('parentes_lang.panel_title') }}
@endsection
@section('content')

 
    <div class="row">
            <div class="col-lg-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                <li class="active">{{ trans('parentes_lang.panel_title') }}</li>
            </ul>
            <!--breadcrumbs end -->
            </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                @if(Auth::user()->permission('is_admin'))
                <header class="panel-heading">
                <a class="btn btn-success" data-toggle="modal" href="{{ url('parents/create_parent') }}" style="margin:5px">
                    {{ trans('parentes_lang.add_parentes') }}
                </a>
                </header>
                @endif
                <div id="hide-table">
                    <table id="example1"  class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th>#</th>
                                {{--  <th>{{ trans('student_lang.student_photo') }}</th>  --}}
                                <th>{{ trans('student_lang.student_name') }}</th>
                                <th>{{ trans('student_lang.student_email') }}</th>
                                <th>{{ trans('student_lang.student_address') }}</th>
                                <th>{{ trans('student_lang.student_phone') }}</th>
                                <th>{{ trans('others.school') }}</th>
                                @if(Auth::user()->permission('is_admin'))<th>{{ trans('student_lang.action') }}</th>@endif
                            </tr>
                        </thead>
                        <tbody>

                        @foreach( $parents as $parent )
                        <tr>
                            <td data-title="#"><a href="#">{{ $parent->id }}</a></td>
                            {{--  <td data-title="Photo"> <img src="{{ asset('ev-assets/uploads/avatars/'.$parent->image) }}" alt="..." class="img-circle profile_img" width="50px" height="50px"> </td>  --}}
                            <td data-title="Name">{{ $parent->name }}</td>
                            <td data-title="Email">{{ $parent->email }}</td>
                            <td data-title="Address">{{ $parent->address }}</td>
                            <td data-title="Phone">{{ $parent->phone }}</td>
                            <td data-title="{{ trans('others.school') }}">{{ App\School::find($parent->school_id) ? App\School::find($parent->school_id)->name : '' }}</td>
                            @if(Auth::user()->permission('is_admin'))
                            <td data-title="Action">
                            <a class="active" data-toggle="modal" href="#myModal2{{ $parent->id }}">
                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal2{{ $parent->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">{{ trans('parentes_lang.update_parentes') }}</h4>
                                        </div>
                                        {!! Form::open(array('url'=>'parents/update_parent','id'=>'demo-form2','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                        <div class="modal-body">

                                          
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">{{ trans('teacher_lang.teacher_name') }}</label>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" value="{{ $parent->name }}" name="name">
                                                    <input type="hidden" class="form-control" value="{{ $parent->id }}" name="id">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">{{ trans('student_lang.student_email') }}</label>
                                                <div class="col-lg-9">
                                                    <input type="email" class="form-control" value="{{ $parent->email }}" name="email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">{{ trans('student_lang.student_address') }}</label>
                                                <div class="col-lg-9">
                                                    <input type="address" class="form-control" value="{{ $parent->address }}" name="address">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-lg-2 control-label">{{ trans('student_lang.student_phone') }}</label>
                                                <div class="col-lg-9">
                                                    <input type="phone" class="form-control" value="{{ $parent->phone }}" name="phone">
                                                </div>
                                            </div>
                                            {{--  <div class="form-group">
                                                <label  class="col-lg-2 control-label">{{ trans('student_lang.student_photo') }}</label>
                                                <div class="col-lg-9">
                                                    <input type="file" class="form-control" name="file">
                                                </div>
                                            </div>  --}}
                                            <div class="form-group">
                                                    <label  class="col-lg-2 control-label">{{ trans('others.school') }}</label>
                                                    <div class="col-lg-9">
                                                        <select class="form-control" name="school">
                                                            @foreach(App\School::get_schools() as $school)
                                                                <option value="{{ $school->id }}" @if($parent->school_id == $school->id) selected @endif>{{ $school->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                            <button class="btn btn-warning" type="submit" name='submit'>{{ trans('teacher_lang.update_teacher') }}</button>
                                        
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                            <a class="active"  data-toggle="modal" href="#myModaldel{{ $parent->id }}">
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                            </a>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="myModaldel{{ $parent->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            
                                        </div><p style='margin:auto;width:80%'>Are you sure you want to delete</p>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                            <a href="{{ url('parents/delete/'.$parent->id) }}">
                                            <button class="btn btn-danger">{{ trans('student_lang.delete') }}</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
         
@endsection
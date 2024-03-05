@extends('layouts.app')


@section('title')
{{ $user->name }}'s {{ trans('topbar_menu_lang.profile') }}
@endsection
@section('content')
<?php 
      //determines the authenticated user
      $authe = $user;
    ?>
    <style type="text/css">
        .des{background-color:#5F9EA0;color:white}
    </style>
 
            <div class="row">
                  <div class="col-lg-12">
                      <!--breadcrumbs start -->
                      <ul class="breadcrumb">
                          <li><a href="{{ url('student') }}"><i class="fa fa-home"></i>{{ trans('dashboard_lang.panel_title') }}</a></li>
                          <li class="active">{{ trans('topbar_menu_lang.profile') }}</li>
                      </ul>
                      <!--breadcrumbs end -->
                  </div>
              </div>
              <!-- page start-->
              <div class="row">
                  <aside class="profile-nav col-lg-5">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="{{ asset('ev-assets/uploads/avatars/'.$authe->image) }}" alt="">
                              </a>
                              <h1>{{ $authe->name }}</h1>
                              <p>{{ $authe->email }}</p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="{{ url('admin/editprofile/'.$authe->id) }}"> <i class="fa fa-user"></i> {{ trans('topbar_menu_lang.profile') }}</a></li>
                              <li><a href="{{ url('student/editprofile/'.$authe->id) }}"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-7">
                      <section class="panel">
                          <div class="bio-graph-heading">
                              {{ App\School::find($authe->school_id)->name }}
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1>Bio Graph</h1>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>{{ trans('student_lang.student_name') }}</span>: {{ $authe->name }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Registration No </span>: {{ $authe->reg_no }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Address </span>: {{ $authe->address }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Birthday</span>: {{ $authe->birthday }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Religion </span>: {{ $authe->religion }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Email </span>: {{ $authe->email }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>{{ trans('student_lang.student_sex') }} </span>: {{ $authe->gender }}</p>
                                  </div>
                                  <div class="bio-row">
                                      <p><span>Phone </span>: {{ $authe->phone }}</p>
                                  </div>
                              </div>
                          </div>
                      </section>
                      
                  </aside>
              </div>

              <div class="white-box">
                    <header class="panel-heading">
                              <h3>{{ $authe->name }}'s {{ trans('topbar_menu_lang.menu_attendance') }} ({{ date('M') }})</h3>
                          </header>
                  <table class="table table-striped table-advance table-hover"> 
                              <thead>
                              <tr>
                              <?php
                              if ((int)date('m') == 9 && (int)date('m') == 4 && (int)date('m') == 6 && (int)date('m') == 11) {
                                $sp = 30;
                              }
                              elseif ((int)date('m') == 2) {
                                if (((int)date('Y') % 4) == 0) {
                                  $sp = 29;
                                }
                                else {
                                  $sp = 28;
                                }
                              }
                              else{
                                $sp = 31;
                              }
                              for ($day=1; $day <= $sp; $day++) { ?>

                                  <th class="@if($day == (int)date('d')) des @endif">{{ $day }}</th>
                                  <?php 
                              }?>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                              <?php
                              for ($day=1; $day <= $sp; $day++) { 
                                $date = (int)date('Y').'-'.(int)date('m').'-'.$day;
                              ?>
                              <?php 
                                $getattc = App\Attendance::where('date',$date)->where('student_id',$authe->id)->where('status',1)->count();
                                $getattd = App\Attendance::where('date',$date)->where('student_id',$authe->id)->where('status',0)->count();
                                ?>
                                  <td data-title="">@if($getattc > 0) P @elseif($getattd > 0) A @else @endif</td>
                                  <?php }?>
                              </tr>
                              </tbody>
                          </table>
                  </div>

               

@endsection
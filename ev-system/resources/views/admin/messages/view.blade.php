@extends('layouts.app')

@section('title')
{{ trans('student_lang.panel_title') }}
@endsection
@section('content')
<?php $auth = Auth::user(); ?>

@if($messages->from_role == "parent")
<?php $senderget = App\User::where('role', 'parent')->orderBy('created_at','desc')->paginate();?>
@elseif($messages->from_role == "student")
<?php $senderget = App\User::where('role', 'student')->orderBy('created_at','desc')->paginate();?>
@elseif($messages->from_role == "admin")
<?php $senderget = App\User::where('role', 'admin')->orderBy('created_at','desc')->paginate();?>
@elseif($messages->from_role == "teacher")
<?php $senderget = App\User::where('role', 'teacher')->orderBy('created_at','desc')->paginate();?>
@endif

                            
<?php 
    if(Auth::user()->id != $messages->from){
        $messages->update(['active' => '1']);
    }
?>
<style>
    * {
        box-sizing: border-box;
    }
    
    body {
        font: 16px Arial;  
    }
    
    /*the container must be positioned relative:*/
    .autocomplete {
        position: relative;
        display: inline-block;
    }
    
    input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
    }
    
    input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
    }
    
    input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
        cursor: pointer;
    }
    
    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }
    
    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff; 
        border-bottom: 1px solid #d4d4d4; 
    }
    
    /*when hovering an item:*/
    .autocomplete-items div:hover {
        background-color: #e9e9e9; 
    }
    
    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
        background-color: DodgerBlue !important; 
        color: #ffffff; 
    }
    .edu-loading.m-loading{
        position: absolute;
        height: 2px;
        top: 0;
        left: 0;
        right: 0;
        z-index: 20;
        animation: loadOn ease 1500ms;
        z-index: 30000;
        background:gold
    }

    @keyframes loadOn {
        0%{
            width: 0%;
        }
        100%{
            width: 100%;
        }
    }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <div class="edu-loading"></div>

    <!-- Main content -->
    <section class="content">
        <!--mail inbox start-->
        <div class="mail-box">
        @include('admin.messages.aside')
            <aside class="lg-side">
                <div class="inbox-head">
                    <h3>{{ trans('message_lang.read_message') }} </h3>
                    
                </div>
                <div class="inbox-body">
                        <div class="heading-inbox row">
                            <div class="col-md-8">
                                <div class="compose-btn">
                                    <a class="btn btn-sm btn-primary" href="#reply"><i class="fa fa-reply"></i> {{ trans('message_lang.reply') }} </a>
                                    <!-- <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn  btn-sm tooltips"><i class="fa fa-print"></i> </button>
                                    <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm tooltips"><i class="fa fa-trash-o"></i></button> -->
                                </div>

                            </div>
                            <div class="col-md-4 text-right">
                                <p class="date">{{ $messages->created_at->format('d M,Y \a\t h:i a') }}</p>
                            </div>
                            <div class="col-md-12">
                                <h4> {{ $messages->title }}</h4>
                            </div>
                        </div>
                        <div class="sender-info">
                            <div class="row">
                                <div class="col-md-12">
                                    <i class=" fa fa-user"></i>
                                    <?php
                                    $sender = App\User::where('id',$messages->from)->first();
                                    ?>
                                    <strong>{{ $sender ? $sender->name: '' }}</strong>
                                    <span>{{ $sender ? $sender->email: '' }} </span>
                                    <a class="sender-dropdown " href="javascript:;">
                                        <i class="fa fa-chevron-down"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="view-mail" style="border-bottom:1px solid #88918d;margin-bottom:20px">
                            <p>{{ $messages->body }}</p>
                        </div>
                        <ul class="fb-comments">
                            @foreach( $replies->where('message_id',"$messages->id") as $reply )
                            <?php $author = App\User::find($reply->author_id); ?>
                                <li>
                                    <a href="#" class="cmt-thumb">
                                        <img src="{{ asset('ev-assets/uploads/avatars/'.$author->image) }}" alt="">
                                    </a>
                                    <div class="cmt-details">
                                        <a href="#">
                                        <?php
                                        if ($reply->author_role == 'student') {
                                            $author = App\User::find($reply->author_id);
                                            echo $author->name;
                                        }elseif ($reply->author_role == 'admin') {
                                            $author = App\User::find($reply->author_id);
                                            echo $author->name;
                                        }
                                        elseif ($reply->author_role == 'teaching') {
                                            $author = App\User::find($reply->author_id);
                                            echo $author->name;
                                        }
                                        elseif ($reply->author_role == 'parent') {
                                            $author = App\User::find($reply->author_id);
                                            echo $author->name;
                                        }
                                        ?>

                                        </a>
                                        <span> {{ $reply->body }}</span>
                                        <p>{{ $reply->created_at->format('d M,Y \a\t h:i a') }}
                                        <?php
                                        if ($authe->role == 'admin' || $reply->author_id == $authe->id) { ?>
                                        - <a href="{{ url('messages/reply/delete/'.$reply->id) }}" class="like-link">Delete</a>
                                        <?php  } ?>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        <form action="{{ url('messages/reply') }}" class="form-horizontal tasi-form" method="POST" id="reply">
                            <input type="hidden" name="message_id" value="{{ $messages->id }}">
                            <input type="hidden" name="author_id" value="{{ $authe->id }}">
                            <input type="hidden" name="author_role" value="{{ $authe->role }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group col-md-9">
                                    <label class="exampleInputFile">{{ trans('message_lang.reply') }} </label><br>
                                    <textarea name='body' class="form-control" rows="10">{{ old('body') }}</textarea>
                                
                            </div>
                            <div class="form-group col-md-9">
                                <button type="submit" name='publish' class="btn btn-primary">{{ trans('message_lang.reply') }} </button>
                            </div>
                        </form>
                    </div>
            </aside>
        </div>
        <!--mail inbox end-->
    </section>
</div>
<!--main content end-->
@include('admin.messages.script')
@endsection



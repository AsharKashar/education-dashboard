@extends('layouts.app')

@section('title')
Review Tests
@endsection
@section('content')
<style>
ol, ul {
    margin: 0;
    padding-left:15px
}
ul {
    list-style-type: none;
}
li {
    margin-bottom: 10px
}
.ml5{
    margin-left: 20px
}
</style>
<div class="row">
        <div class="col-lg-12">
            <!--breadcrumbs start -->
            <ul class="breadcrumb">
                <li><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> {{ trans('dashboard_lang.panel_title') }}</a></li>
                <li class="active">Review Test</li>
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Review Test
                </header>
                {!! Form::open(array('url'=>'mark-test-store','class'=>'form-horizontal form-label-left' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                <input type="hidden" class="form-control" name="test_id" value="{{$testresult->test_id}}">
                <input type="hidden" class="form-control" name="student_id" value="{{$testresult->student_id}}">
                <div id="hide-table">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Point</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $questions as $key => $question )
                                @php
                                    $uniqueString = str_random(10);
                                @endphp
                                <tr>
                                    <td data-title="#"><a href="#">{{ $key+1 }}</a></td>
                                    <td data-title="Question">
                                        {{ $question->question }}

                                        <hr>
                                        <div>
                                            @if ($question->type == 'options')
                                                @php
                                                    $getoptions = App\TestOption::where('question_id', $question->id)->get();
                                                @endphp
                                                <div class="radio-list more">
                                                    @foreach ($getoptions as $idx =>  $go)
                                                    <label class="radio-inline">
                                                        <input type="radio" name="option[{{$uniqueString}}][]" value="{{$idx}}">{{$idx+1}}. {{ $go->option }}
                                                    </label>
                                                    @endforeach
                                                </div>
                                            @elseif($question->type == 'yesno')
                                                <div class="radio-list more">
                                                    <label class="radio-inline">
                                                    <input type="radio"  name="option[{{$uniqueString}}][]" value="0"> Yes
                                                    </label>
                                                    <label class="radio-inline">
                                                    <input type="radio" name="option[{{$uniqueString}}][]" value="1"> No
                                                    </label>
                                                </div>
                                            @elseif($question->type == 'file')
                                                <div>
                                                    @php
                                                        $link = strtolower('ev-assets/uploads/test-files/'. $question->file);
                                                        $link2 = 'ev-assets/uploads/test-files/'. $question->file;
                                                        $extensions = array("gif", "jpg", "png", "jpeg", "png", "tiff", "tif");
                                                        $urlExt = pathinfo($link, PATHINFO_EXTENSION);
                                                    @endphp
                                                    @if ($question->file)
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
                                            @endif
                                        </div>
                                    </td>
                                    <td data-title="Answer">
                                        @if (isset($answers[$key]))
                                            @if ($question->type == 'options')
                                                @if (isset($answers[$key][0]))
                                                    @if (isset($question->options[$answers[$key][0]]))
                                                        {{$question->options[$answers[$key][0]]->option}}
                                                    @endif
                                                @endif
                                            @elseif($question->type == 'fillword' || $question->type == 'short')
                                                <ol>
                                                    @for ($i = 0; $i < count($answers[$key]); $i++)
                                                        @if (isset($answers[$key][$i]))
                                                            <li>
                                                                {{$answers[$key][$i]}}
                                                            </li>
                                                        @endif
                                                        <br>
                                                    @endfor
                                                </ol>
                                            @elseif ($question->type == 'yesno')
                                                @if (isset($answers[$key][0]))
                                                    @if ($answers[$key][0] == 0)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                @endif
                                            @elseif($question->type == 'file')
                                                @if ($answers[$key][0])
                                                    {{$answers[$key][0]}}
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                    <td data-title="Point">
                                        <input type="text" name="point[]" value="{{ isset($mark_point[$key]) ? $mark_point[$key] : $question->point}}" class="form-control">
                                    </td>
                                    <td data-title="Action">
                                        <ul>
                                            <li>
                                                <label class="radio-inline">
                                                    <input type="radio" @if(isset($mark_action[$key]) && $mark_action[$key] == 0) checked @endif name="action[{{$key}}][]" value="0" required> Correct
                                                </label>
                                            </li>
                                            <li>
                                                <label class="radio-inline">
                                                    <input type="radio" @if(isset($mark_action[$key]) && $mark_action[$key] == 1) checked @endif name="action[{{$key}}][]" value="1" required> Incorrect
                                                </label>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <button class="ml5 btn btn-primary">Submit Review</button>
                </div>
                {!! Form::close() !!}
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

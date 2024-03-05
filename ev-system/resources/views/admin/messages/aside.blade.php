<aside class="sm-side">
        <div class="user-head">
            <a href="javascript:;" class="inbox-avatar">
                <img src="{{ asset('ev-assets/uploads/avatars/'.$authe->image) }}" alt="" height="60px" width="60px">
            </a>
            <div class="user-name">
                <h5><a href="#">{{ $authe->name }}</a></h5>
                <span><a href="#">{{ $authe->email }}</a></span>
            </div>
            <a href="javascript:;" class="mail-dropdown pull-right">
                <i class="fa fa-chevron-down"></i>
            </a>
        </div>
        <div class="inbox-body">
            <a class="btn btn-compose" data-toggle="modal" href="#myModal">
                {{ trans('message_lang.add_title') }}
            </a>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">{{ trans('message_lang.add_title') }}</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('url'=>'messages/store','id'=>'send-message','class'=>'form-horizontal' ,'role'=>'form','method'=>'POST', 'files'=>true)) !!}
                                <div class="form-group">
                                  <label  class="col-lg-2 control-label">{{ trans('message_lang.to') }}</label>
                                  <div class="col-lg-10">
                                      <input id="myInput" type="text" name="myCountry" class="form-control" placeholder="Search user by name">
                                  </div>
                              </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">{{ trans('message_lang.message_title') }}</label>
                                    <div class="col-lg-10">
                                        <input type="text" id="message-title" name="title" class="form-control" placeholder="" required>
                                        <input type="hidden" name="from" class="form-control" placeholder="" value="{{ $authe->id }}">
                                        <input type="hidden" name="from_role" class="form-control" placeholder="" value="{{ $authe->role }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">{{ trans('message_lang.message_message') }}</label>
                                    <div class="col-lg-10">
                                        <textarea name="body"  id="message-body" class="form-control" cols="30" rows="10" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-send">{{ trans('message_lang.send') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <ul class="inbox-nav inbox-divider">
            <li class="{{ request()->is('messages') ? 'active' : ''}}">
                <a href="{{ url('messages') }}"><i class="fa fa-group"></i> {{ trans('message_lang.inbox') }} @if($count > 0)<span class="label label-danger pull-right">{{ $count }}</span>@endif</a>
            </li>
            <li class="{{ request()->is('messages/sent') ? 'active' : ''}}">
                <a href="{{ url('messages/sent') }}"><i class=" fa fa-check-square-o"></i>{{ trans('message_lang.sent') }}</a>
            </li>
        </ul>

    </aside>
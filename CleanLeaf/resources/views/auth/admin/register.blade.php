@extends('layouts.admin')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row mgb15">
                <div class="col-md-12">
                    <label class="fc-blue">Register an account</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('adminRegisterPost',$user->username) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control input-sm" name="name" value="{{ old('name') }}" placeholder="Name">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">                            
                            <select class="form-control input-sm" name="role" value="{{ old('role') }}">
                                <option disabled selected>Role</option>
                                <option value="staff">Staff</option>
                                <option value="admin">Administrator</option>
                            </select>
                            @if ($errors->has('role'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">                            
                            <input type="email" class="form-control input-sm" name="email" value="{{ old('email') }}" placeholder="Email Address">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">
                                <i class="fa fa-btn fa-user"></i> Register
                            </button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $('#register').addClass('active');

        $('form').find(':submit').prop('disabled', false);

        $('form').on('submit', function(){
            $(this).find(':submit').prop('disabled', true);
            $('.fa-user').removeClass('fa-user').addClass('fa-spinner fa-pulse fa-fw');
        });
    </script>
@stop
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mgb15">
            <div class="col-lg-3">
                <img src="{{ asset($user->image) }}" class="img-responsive img-circle img-thumbnail ht50 mgr5"><span class="fs20">{{ $user->name }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#">Dashboard</a></li>
                            <li><a data-toggle="collapse" href="#collapse1">Documents <span class="caret"></span></a></li>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{ route('adminJobOrder',$user->username) }}" class="pdl30">Job Order</a></li>
                                </ul>
                            </div>
                            <li><a href="#">Articles</a></li>
                            <li><a href="#">Website</a></li>
                            <li><a href="#">Account Executives</a></li>
                            <li><a href="{{ route('adminSettings',$user->username) }}">Settings</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row mgb15">
                            <div class="col-sm-12">
                                <span class="fc-blue">Register an account</span>
                            </div>
                        </div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                <div class="col-md-6">
                                    <select class="form-control" name="role" value="{{ old('role') }}">
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
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" placeholder="Password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
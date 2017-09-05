@extends('layouts.admin')

@section('content')
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-body">
				<label class="fc-blue" data-toggle="collapse" data-target="#changeAvatar"><span class="caret"></span> Avatar</label>
				<div class="row collapse in mgt15" id="changeAvatar">
					<div class="col-sm-4 col-sm-offset-4">
						<img src="{{ asset($user->image) }}" class="img-responsive img-circle img-thumbnail mgb15">
						<form action="{{ route('adminImage',$user->id) }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							{{ method_field('patch') }}
							<input type="file" name="image" class="form-control input-sm" onchange="this.form.submit()">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<label class="fc-blue" data-toggle="collapse" data-target="#changeAccount"><span class="caret"></span> Account Settings</label>
				<form action="{{ route('adminSettingsUpdate',$user->id) }}" method="post" class="collapse mgt15" id="changeAccount">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="row">
						<div class="col-sm-3">
							<label>Name</label>
						</div>
						<div class="col-sm-9">
	                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<input type="text" name="name" class="form-control input-sm" placeholder="Full Name" value="{{ $user->name }}">
								@if ($errors->has('name'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('name') }}</strong>
	                                </span>
	                            @endif
	                        </div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<label>Username</label>
						</div>
						<div class="col-sm-9">
	                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
								<input type="text" name="username" class="form-control input-sm" placeholder="Username" value="{{ $user->username }}">
								@if ($errors->has('username'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('username') }}</strong>
	                                </span>
	                            @endif
	                        </div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<label>Email Address</label>
						</div>
						<div class="col-sm-9">
	                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<input type="email" name="email" class="form-control input-sm" placeholder="Email Address" value="{{ $user->email }}">
								@if ($errors->has('email'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('email') }}</strong>
	                                </span>
	                            @endif
	                        </div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary pull-right"><span class="fa fa-check"></span> Save Changes</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body">
				<label class="fc-blue" data-toggle="collapse" data-target="#changePassword"><span class="caret"></span> Change Password</label>
				<form action="{{ route('adminPasswordUpdate',$user->id) }}" method="post" class="collapse mgt15" id="changePassword">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="row">
						<div class="col-sm-3">
							<label>Old Password</label>
						</div>
						<div class="col-sm-9">
	                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
								<input type="password" name="old_password" class="form-control input-sm" placeholder="Old Password">
								@if ($errors->has('old_password'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('old_password') }}</strong>
	                                </span>
	                            @endif
	                        </div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<label>New Password</label>
						</div>
						<div class="col-sm-9">
	                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<input type="password" name="password" class="form-control input-sm" placeholder="New Password">
								@if ($errors->has('password'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('password') }}</strong>
	                                </span>
	                            @endif
	                        </div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<label>Confirm Password</label>
						</div>
						<div class="col-sm-9">
	                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<input type="password" name="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
								@if ($errors->has('password_confirmation'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
	                                </span>
	                            @endif
	                        </div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary pull-right"><span class="fa fa-check"></span> Change Password</button>
						</div>
					</div>
				</form>
			</div>
		</div>		
	</div>
@stop

@section('scripts')
	<script>
		$('#settings').addClass('active');
	</script>
@stop
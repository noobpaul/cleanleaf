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
							<li><a href="{{ route('admin',$user->username) }}">Documents</a></li>
							<li><a href="{{ route('adminJobOrder',$user->username) }}">Job Order</a></li>
							<li><a href="#">Articles</a></li>
							<li><a href="#">Website</a></li>
							<li><a href="#">Account Executives</a></li>
							<li class="active"><a href="#">Settings</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="panel panel-default mgb30">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4">
								<img src="{{ asset($user->image) }}" class="img-responsive img-circle img-thumbnail mgb15">
								<form action="{{ route('adminImage',$user->id) }}" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('patch') }}
									<input type="file" name="image" class="form-control" onchange="this.form.submit()">
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default mgb30">
					<div class="panel-body">
						<form action="{{ route('adminSettingsUpdate',$user->id) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('patch') }}
							<div class="row mgb15">
								<div class="col-sm-3">
									<label>Name</label>
								</div>
								<div class="col-sm-9">
									<input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ $user->name }}">
								</div>
							</div>
							<div class="row mgb15">
								<div class="col-sm-3">
									<label>Username</label>
								</div>
								<div class="col-sm-9">
									<input type="text" name="username" class="form-control" placeholder="Username" value="{{ $user->username }}">
								</div>
							</div>
							<div class="row mgb15">
								<div class="col-sm-3">
									<label>Email Address</label>
								</div>
								<div class="col-sm-9">
									<input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ $user->email }}">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary pull-right">Save Changes</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-body">
						<form action="{{ route('adminPasswordUpdate',$user->id) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('patch') }}
							<div class="row mgb15">
								<div class="col-sm-3">
									<label>Current Password</label>
								</div>
								<div class="col-sm-9">
									<input type="password" name="current_pw" class="form-control" placeholder="Current Password">
								</div>
							</div>
							<div class="row mgb15">
								<div class="col-sm-3">
									<label>New Password</label>
								</div>
								<div class="col-sm-9">
									<input type="password" name="new_pw" class="form-control" placeholder="New Password">
								</div>
							</div>
							<div class="row mgb15">
								<div class="col-sm-3">
									<label>Confirm Password</label>
								</div>
								<div class="col-sm-9">
									<input type="password" name="confirm_pw" class="form-control" placeholder="Confirm Password">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary pull-right">Change Password</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
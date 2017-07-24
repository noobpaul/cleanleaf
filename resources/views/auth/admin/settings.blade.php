@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li><a href="{{ route('admin',$user->username) }}">Documents</a></li>
							<li><a href="#">Articles</a></li>
							<li><a href="#">Website</a></li>
							<li><a href="#">Account Executives</a></li>
							<li class="active"><a href="#">Settings</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="{{ route('adminSettingsUpdate',$user->id) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('patch') }}
							<div class="row mgb15">
								<div class="col-sm-2">
									<label>Name</label>
								</div>
								<div class="col-sm-10">
									<input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ $user->name }}">
								</div>
							</div>
							<div class="row mgb15">
								<div class="col-sm-2">
									<label>Username</label>
								</div>
								<div class="col-sm-10">
									<input type="text" name="username" class="form-control" placeholder="Username" value="{{ $user->username }}">
								</div>
							</div>
							<div class="row mgb15">
								<div class="col-sm-2">
									<label>Email Address</label>
								</div>
								<div class="col-sm-10">
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
			</div>
		</div>
	</div>
@stop
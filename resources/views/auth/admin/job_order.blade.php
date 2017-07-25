@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row mgb15">
			<div class="col-lg-3">
				{{ $user->name }}
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li><a href="{{ route('admin',$user->username) }}">Documents</a></li>
							<li class="active"><a href="#">Job Order</a></li>
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
						Documents
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
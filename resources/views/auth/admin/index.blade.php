@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li class="active"><a href="#">Documents</a></li>
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
						titi
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
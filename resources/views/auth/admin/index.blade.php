@extends('layouts.admin')

@section('content')
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
					Dashboard
				</div>
			</div>
		</div>
	</div>
@stop
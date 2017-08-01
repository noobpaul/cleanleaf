@extends('layouts.admin')

@section('content')	
	<div class="row">
		<div class="col-lg-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<ul class="nav nav-pills nav-stacked">
						<li><a href="{{ route('admin',$user->username) }}">Dashboard</a></li>
						<li><a data-toggle="collapse" href="#collapse1">Documents <span class="caret"></span></a></li>
						<div id="collapse1" class="panel-collapse collapse in">
							<ul class="nav nav-pills nav-stacked">
								<li class="active"><a href="#" class="pdl30">Job Order</a></li>
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
					@if($user->role != 'admin')
					<div class="row mgb15">
						<div class="col-sm-12">
							<span class="fc-blue">Fill up the required information</span>
						</div>
					</div>
					<form action="{{ route('adminJobOrderPost',$user->id) }}" method="post">
						{{ csrf_field() }}
						<!-- <div class="row mgb15">
							<div class="col-sm-6">
								<input type="text" name="date" class="form-control" id="datepicker" placeholder="Date">
							</div>
						</div> -->
						<div class="row mgb15">
							<div class="col-sm-6">
								<input type="text" name="name" class="form-control" placeholder="Name of Requisitioner">
							</div>
						</div>
						<div class="row mgb15">
							<div class="col-sm-6">
								<input type="text" name="client_name" class="form-control" placeholder="Client Name">
							</div>
							<div class="col-sm-6">
								<input type="text" name="address" class="form-control" placeholder="Address">										
								<div class="mgb15"></div>
								<input type="text" name="contact_number" class="form-control" placeholder="Contact Number" maxlength="11">										
							</div>
						</div>
						<div class="row mgb15">
							<div class="col-sm-12">
								<textarea class="form-control" name="particular" placeholder="Particular"></textarea>
							</div>
						</div>
						<div class="row mgb15">
							<div class="col-sm-12">
								<textarea name="remarks" class="form-control" placeholder="Remarks"></textarea>
							</div>
						</div>
						<div class="row mgb15">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-primary pull-right">Send Request</button>
							</div>
						</div>
					</form>
					@else
					<div class="row mgb15">
						<div class="col-sm-12">
							<span class="fc-blue">Job Order Requests</span>
						</div>						
					</div>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($job_orders as $job_order)
								<tr>
									<td>{{ $job_order->name }}</td>
									<td>{{ date_format($job_order->created_at, 'm-d-Y') }}</td>
									<td>{{ $job_order->status }}</td>
									<td>
										<a href="{{ route('adminJobOrderPdf',$job_order->id) }}"><button class="btn btn-primary">View</button></a>
									</td>
									<td>
										<a href="{{ route('adminJobOrderAccept',[$user->username,$job_order->id]) }}"><button class="btn btn-success">Accept</button></a>
										<a href="{{ route('adminJobOrderReject',[$user->username,$job_order->id]) }}"><button class="btn btn-danger">Reject</button></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
			$( "#datepicker" ).datepicker();
		} );
	</script> -->
@stop
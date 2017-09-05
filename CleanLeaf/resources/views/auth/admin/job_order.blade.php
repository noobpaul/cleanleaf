@extends('layouts.admin')

@section('content')
	<div class="panel panel-default">
		<div class="panel-body">
			@if(!$user->isAdmin())
			<div class="row mgb15">
				<div class="col-sm-12">
					<label class="fc-blue">Fill up the required information</label>
				</div>
			</div>
			<form action="{{ route('adminJobOrderPost',$user->id) }}" method="post">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<input type="text" name="name" class="form-control input-sm" value="{{ old('name') }}" placeholder="Name of Requisitioner">
							@if ($errors->has('name'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('name') }}</strong>
	                            </span>
	                        @endif
	                    </div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group{{ $errors->has('client_name') ? ' has-error' : '' }}">
							<input type="text" name="client_name" class="form-control input-sm" value="{{ old('client_name') }}" placeholder="Client Name">
							@if ($errors->has('client_name'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('client_name') }}</strong>
	                            </span>
	                        @endif
	                    </div>
					</div>
					<div class="col-sm-6">
						<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
							<input type="text" name="address" class="form-control input-sm" value="{{ old('address') }}" placeholder="Address">
							@if ($errors->has('address'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('address') }}</strong>
	                            </span>
	                        @endif
	                    </div>
						<div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
							<input type="text" name="contact_number" class="form-control input-sm" value="{{ old('contact_number') }}" placeholder="Contact Number" maxlength="11">
							@if ($errors->has('contact_number'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('contact_number') }}</strong>
	                            </span>
	                        @endif
	                    </div>									
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group{{ $errors->has('particular') ? ' has-error' : '' }}">
						<textarea class="form-control input-sm" name="particular" placeholder="Particular">{{ old('particular') }}</textarea>
							@if ($errors->has('particular'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('particular') }}</strong>
	                            </span>
	                        @endif
	                    </div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
						<textarea class="form-control input-sm" name="remarks" placeholder="Remarks">{{ old('remarks') }}</textarea>
							@if ($errors->has('remarks'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('remarks') }}</strong>
	                            </span>
	                        @endif
	                    </div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-primary btn-sm pull-right" id="send"><span class="fa fa-paper-plane"></span> Send Request</button>
					</div>
				</div>
			</form>
			@else
			<div class="row">
				<div class="col-sm-12">
					<label class="fc-blue">Job Order Requests</label>
				</div>						
			</div>
				@if(!$job_orders->isEmpty())
					<div class="table-responsive">
						<table class="table table-striped table-hover">
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
									<td>
										@if($job_order->status === null)
										<span class="text-primary">New</span>
										@elseif($job_order->status == 1)
										<span class="text-success">Accepted</span>
										@elseif($job_order->status == 0)
										<span class="text-danger">Rejected</span>								
										@endif
									</td>
									<td>
										<div class="btn-group btn-group-sm">
											<a href="{{ route('adminJobOrderPdf',$job_order->id) }}" class="btn btn-primary"><span class="fa fa-eye"></span> View</a>
											@if($job_order->status === null || $job_order->status == 0)
											<a href="{{ route('adminJobOrderAccept',[$user->username,$job_order->id]) }}" class="btn btn-success"><span class="fa fa-check"></span> Accept</a>
											<a href="{{ route('adminJobOrderReject',[$user->username,$job_order->id]) }}" class="btn btn-danger"><span class="fa fa-times"></span> Reject</a>
											@endif
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					<span class="text-muted mgl15">No Job Requests available.</span>
				@endif
			@endif
		</div>
	</div>
@stop

@section('scripts')
	<script>
		$('#jobOrder').addClass('active');

		$('form').find(':submit').prop('disabled', false);

		$('form').on('submit', function(){
			$(this).find(':submit').prop('disabled', true);
			$('.fa-paper-plane').removeClass('fa-paper-plane').addClass('fa-spinner fa-pulse fa-fw');
		});
	</script>
	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
			$( "#datepicker" ).datepicker();
		} );
	</script> -->
@stop
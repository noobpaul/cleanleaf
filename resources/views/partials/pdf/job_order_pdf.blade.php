<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="form-group">
			<label>Date</label> <span>{{ date_format($job_order->created_at, 'm-d-Y') }}</span><br>
			<label>Name of Requisitioner</label> <span>{{ $job_order->name }}</span><br>
			<label>Client Name</label> <span>{{ $job_order->client_name }}</span><br>
			<label>Address</label> <span>{{ $job_order->address }}</span><br>
			<label>Contact Number</label> <span>{{ $job_order->contact_number }}</span><br>
			<label>Particular</label> <span>{{ $job_order->particular }}</span><br>
			<label>Remarks</label> <span>{{ $job_order->remarks }}</span>
		</div>
	</div>
</body>
</html>
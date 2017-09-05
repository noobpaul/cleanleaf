<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.bold{
			font-weight: bold;
		}
		.pd240{
			padding-left: 40px;
		}
		.l-center{
			padding-left: 220px;
		}
		.l-center1{
			padding-left: 235px;
		}
		.add_editpd{
			padding-left: 300px;
		}
		.udline{
			text-decoration: underline;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="form-group">
			<label class="bold l-center">Clean Leaf International Corporation</label><br>
			<br>
			<label class="bold l-center1">JOB ORDER REQUEST FORM</label><br>
			<br>
			<br>
			<label>Date: </label> <span class="bold udline">{{ date_format($job_order->created_at, 'm-d-Y') }}</span><br>
			<br>
			<br>
			<br>
			<span class="bold udline">{{ $job_order->name }}</span><br>
			<label>Name of Requisitioner</label><br>
			<br>
			<br>
			<div style="width: 100%; display: table;">
			<div style="width: 300px; display: table-cell;"><span class="bold udline">{{ $job_order->client_name }}</span></div>
			<div style="width: 400px; display: table-cell;"><span class="bold pd240 udline">{{ $job_order->address }}</span> / <span class="bold udline">{{ $job_order->contact_number }}</span><br></div>
			</div>
			<label>Client Name</label><label class="add_editpd">Address</label> / <label>Contact Number</label> <br>
			<br>
			<br>
			<label>Particular</label> <br>
			<br> 
			<span class="udline">{{ $job_order->particular }}</span><br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<label>Remarks</label><br>
			<br>
			<span class="udline">{{ $job_order->remarks }}</span>
		</div>
	</div>
</body>
</html>
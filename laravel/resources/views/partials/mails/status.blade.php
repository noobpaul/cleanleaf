<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		{{ $user->name }}
	@if($job_order->status == true)
		accepted
	@else
		rejected
	@endif
		your Job Order Request, {{ $job_order->created_at }}
</body>
</html>
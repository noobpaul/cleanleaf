@extends('layouts.admin')

@section('content')
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-heading ht100 text-center">
								<span class="fa fa-pencil fa-3x"></span>
								<h4>Job Order</h4>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-warning">
							<div class="panel-heading ht100 text-center">
								<span class="fa fa-book fa-3x"></span>
								<h4>Articles</h4>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-danger">
							<div class="panel-heading ht100 text-center">
								<span class="fa fa-address-book fa-3x"></span>
								<h4>A. Executives</h4>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel panel-success">
							<div class="panel-heading ht100 text-center">
								<span class="fa fa-globe fa-3x"></span>
								<h4>Website</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
	<script>
		$('#dashboard').addClass('active');
	</script>
@stop
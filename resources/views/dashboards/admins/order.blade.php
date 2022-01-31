@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Order Form')

@section('content')
<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-body">
				<form class="form" method="POST" action="">
					@csrf
					<div class="form-group">
						<h3 class="form-header">Mi form</h3>
					</div>
					<div class="form-group">
						<label class="form-control-label">label</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">SUBMIT</button>
					</div>
				</form>
			</div>
		</div>
				
	</div>
</div>

@endsection

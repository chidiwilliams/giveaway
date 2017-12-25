@extends('master')

@section('heafoo')
@endsection

@section('content')
	<div class="pledge-page">
		<div class="container">
			<div class="col-md-7">
				<div class="page-heading">
					<div class="page-name">Pledge</div>
					<div class="page-line"></div>
				</div>

				<div class="pledge-form">
					<form action="{{ route('ipledge') }}" method="POST">
						<div class="input-group">
							<label for="name">What's your name?</label>
							<input type="text" name="name">
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-5">g</div>
		</div>
	</div>
@endsection
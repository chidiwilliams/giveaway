@extends('master')

@section('heafoo')
@endsection

@section('content')
	{{ $errors }}
	<div class="pledge-page">
		<div class="container">
			<div class="col-md-6">
				<div class="page-heading">
					<div class="page-name">Pledge</div>
					<div class="page-line"></div>
				</div>

				<div class="pledge-form">
					<form action="{{ route('ipledge') }}" method="POST">
			            {{ csrf_field() }}

						<div class="input-group">
							<label for="name">What's your name?</label>
							<input type="text" name="name" placeholder="Francis" maxlength="15" required="required">
						</div>
						
						<div class="input-group">
							<label for="name">What course are you studying? In what level?</label>
							<input type="text" name="course" placeholder="Marketing" maxlength="20">
							<input type="text" name="level" placeholder="300" class="short" required="required">
						</div>

						<div class="input-group">
							<label for="name">What do you pledge? How many?</label>
							<input type="text" name="item" placeholder="Tin of sardines" maxlength="20" required="required">
							<input type="text" name="qty" placeholder="1" class="short" required="required">
						</div>

						<input type="submit" value="Pledge">
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="bubbles">
					<img src="{{ asset('img/Bubble.svg') }}" alt="" class="bubble">
					<div class="bubble-text">
						<div class="text">
							Some joke about how rich you are ...
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
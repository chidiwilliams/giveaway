@extends('master')

@section('heafoo')
@endsection

@section('content')
	<div class="pledge-page" id="pledge">
		<div class="container">
			<div class="visible">
				<div class="page-heading">
					<div class="page-name">Pledge</div>
					<div class="page-line"></div>
				</div>

				{{ $errors }}

				<div class="pledge-form">
					<form action="{{ route('ipledge') }}" method="POST">
			            {{ csrf_field() }}

						<div class="input-group">
							<label for="name">What's your name? {{-- This should show an error 'x' when the $errors->has('name') --}}</label>
							<input type="text" name="name" placeholder="Francis" maxlength="15" required="required">
						</div>
						
						<div class="input-group">
							<label for="name">What course are you studying?</label>
							<custom-input type="text" name="course" :items="courses" placeholder="Course" classes="long" dropdown-id="1"></custom-input>
							<custom-input type="text" name="level" :items="levels" placeholder="Lvl" classes="short" dropdown-id="2"></custom-input>
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
		</div>
	</div>
@endsection
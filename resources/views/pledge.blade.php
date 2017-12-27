@extends('master')

@section('heafoo')
@endsection

@section('content')
	<pledge-component inline-template>
	    <div class="pledge-page">
	        <div class="container">
	            <div class="page-heading">
	                <div class="page-name">Pledge</div>
	                <div class="page-line"></div>
	            </div>
	            <div class="col-md-offset-2">
	                <div class="visible">

	                    <div class="pledge-form">
	                        <form action="{{ route('ipledge') }}" method="POST">
	                            <input type="hidden" value="csrf">
	                            
	                            <div class="input-group">
	                                <label for="name">What course are you studying?</label>
	                                <custom-input name="course" :items="courses" placeholder="Accounting" classes="long" dropdown-id="1" v-on:change="changeCourse"></custom-input>
	                            </div>

	                            <div class="input-group">
	                                <label for="name">What level are you currently in?</label>
	                                <custom-input name="level" :items="levels" classes="short" dropdown-id="2" v-on:change="changeLevel" :reset="resetLevel"></custom-input>
	                            </div>

	                            <div class="input-group">
	                                <label for="name">What do you pledge? How many?</label>
	                                <input type="text" name="item" placeholder="Tin of sardines" maxlength="20" required="required" v-model="inputs.item" v-on:input="updateValue($event)">
	                                <input type="text" name="qty" placeholder="1" class="short" required="required" maxlength="3" v-model.number="inputs.qty" v-on:input="updateValue($event)">
	                            </div>

	                            <input type="submit" value="Pledge">
	                        </form>
	                    </div>
	                </div>  
	            </div>
	        </div>
	    </div>

	</pledge-component>
@endsection

@section('js')
@endsection
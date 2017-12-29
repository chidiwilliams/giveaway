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
                    <div class="pledge-form">
                        <form action="{{ route('ipledge') }}" method="POST" v-on:submit.prevent="onSubmit($event)">
                        	{{ csrf_field() }}

							{{ Auth::user()->course }}
                            
                            <div class="input-group">
                                <label for="name">What course are you studying?</label>
                                <custom-input 
									@if(Auth::user()->course)
										value="{{ Auth::user()->course }}"
										disabled="true"
									@endif
                                	name="course" 
                                	classes="long" 
                                	dropdown-id="1" 
                                	:items="courses" 
                                	:error-class="{ error : inputs.course.error }" 
                                	v-on:change="changeCourse"></custom-input>
                            </div>

                            <div class="input-group">
                                <label for="name">What level are you currently in?</label>
                                <custom-input 
                                	name="level" 
                                	:items="levels" 
                                	classes="short" 
                                	dropdown-id="2" 
                                	:error-class="{ error : inputs.level.error }" 
                                	:reset="toggleResetLevel" 
                                	v-on:change="changeLevel"></custom-input>
                            </div>

                            <div class="input-group">
                                <label for="name">What do you pledge? How many?</label>
                                <input type="text" name="item" placeholder="Tin of sardines" maxlength="20" required="required" v-model="inputs.item.value" v-on:input="updateValue($event)" :class="{ error: inputs.item.error }">
                                <input type="text" name="qty" placeholder="1" class="short" required="required" maxlength="3" v-model="inputs.qty.value" v-on:input="updateValue($event)" :class="{ error: inputs.qty.error }">
                            </div>

                            <input type="submit" value="Pledge">
                        </form>
                    </div>
	            </div>
	        </div>
	    </div>

	</pledge-component>
@endsection

@section('js')
@endsection
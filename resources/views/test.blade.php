@extends('master')

@section('css')
<style>
	.test-wheel
	{
		-webkit-animation: anim 20s;
		-moz-animation: anim 20s;
		-o-animation: anim 20s;
		animation: anim 20s;
	}

	@-webkit-keyframes anim {
		from { transform: rotate(0deg); }
		to { transform: rotate(360deg); }
	}
	@-o-keyframes anim {
		from { transform: rotate(0deg); }
		to { transform: rotate(360deg); }
	}
	@-moz-keyframes anim {
		from { transform: rotate(0deg); }
		to { transform: rotate(360deg); }
	}
	@keyframes anim {
		from { transform: rotate(0deg); }
		to { transform: rotate(360deg); }
	}
</style>
@endsection

@section('content')
<div class="star">
	<img src="{{ asset('img/Cool Wheel.svg') }}" alt="" width="200px" class="test-wheel">
</div>
@endsection

@section('js')
<script>
	$(document).ready(function () {
		alert(!!((window.CSS && window.CSS.supports) || window.supportsCSS || false) && window.CSS.supports('animation', 'f'))
	})
</script>
@endsection
<div class="sub-menu">
    <a href="{{ route('game') }}">Return to Home</a> <br>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        Logout
    </a> <br>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
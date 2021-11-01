<div class="auth">
@if(Auth::check())  
    <div class="icon user-icon">
        <i class="fa fa-user" aria-hidden="true"></i>
    </div>

    <div class="auth-text text">{{Auth::user()->name}}</div>
    <div class="dropdown-content">
        <a class="auth-button" href="/profile/{{Auth::id()}}">My profile</a> 
        <a class="auth-button" href="/profile/{{Auth::id()}}#orders">My Orders</a> 
        <form method="GET" action="/logout">
            <a class="auth-button" href="/logout">Log out</a>
        </form>
        
    </div>
@else
    <div class="icon user-icon">
        <i class="fa fa-user-plus" aria-hidden="true"></i>
    </div>
    <div class="auth-text text">Log in</div>
    <div class="dropdown-content">
        <a class="auth-button" href="/login">Log in</a> 
        <a class="auth-button" href="/register">Register</a>
    </div>
@endif

</div>


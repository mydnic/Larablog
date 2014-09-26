<div class="row">
    <div class="col-md-12">
    @if (Auth::check())
        Hello, {{ link_to('profile', Auth::user()->profile->username) }}
    @else
        <h4>Login</h4>
        {{ Form::open() }}
            <div class="form-group">
                {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) }}
            </div>
            <div class="form-group">
                {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Sign in', ['class'=>'btn btn-primary']) }}
            </div>
        {{ Form::close() }}
    @endif
    </div>
</div>
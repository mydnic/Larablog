@extends('layout.blog.main')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Reset Password</div>
					<div class="panel-body">

						{!! Form::open(['url'=>'password/reset', 'class'=>'form-horizontal']) !!}

							<input type="hidden" name="token" value="{{ $token }}">

							<div class="form-group">
								{!! Form::label('email', 'Email Address', ['class'=>'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::email('email', null, ['class'=>'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
								{!! Form::label('password', 'Password', ['class'=>'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::password('password', ['class'=>'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
								{!! Form::label('password_confirmation', 'Confirm Password', ['class'=>'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									{!! Form::submit('Reset Password', ['class'=>'btn btn-primary']) !!}
								</div>
							</div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@extends('layout.blog.main')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Login or
						<a href="{{ url('register') }}">
							Register
						</a>
					</div>

					<div class="panel-body">
						{!! Form::open(['url' => 'login', 'class' => 'form-horizontal']) !!}

							<div class="form-group">
								{!! Form::label('email', 'Adresse Email', ['class' => 'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::email('email', null, ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
								{!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::password('password', ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
										<label>
											{!! Form::checkbox('remember', null) !!} Remember Me
										</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}

									<a class="btn btn-link" href="{{ url('password/reset') }}">Forgot Your Password?</a>
								</div>
							</div>

						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection

@extends('layouts.app')

@section('content')
<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->

    <!--<div class="wrapper">-->
    <nav class="navbar navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
        	<div class="navbar-header">
        		<a class="navbar-brand text-center" href="http://www.creative-tim.com">Creative Tim</a>
        	</div>
    	</div>
    </nav>

		<div class="header header-filter" style="background-image: url('{{ url('img/city.jpg') }}'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="POST" action="{{ route('login') }}" autocomplete="false">
                                {{ csrf_field() }}
								<div class="header header-primary text-center">
									<h4>Faça login!</h4>
								</div>
								<div class="content">

									<div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" name="email" class="form-control" placeholder="Email...">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
									</div>

									<div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" name="password" placeholder="Password..." class="form-control" />

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
									</div>

									<div class="checkbox">
										<label>
											<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
											Manter-se logado
										</label>
									</div>
								</div>
								<div class="footer text-center" style="margin: 20px;">
                                    <button class="btn btn-primary btn-block">Entrar</button>
									<!--<a href="#pablo" class="btn btn-simple btn-primary btn-lg">Get Started</a>-->
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer">
		        <div class="container">
		            <div class="copyright text-center">
		                &copy; 2017, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com" target="_blank">@thiagopaiva99 | Design by: Creative Tim</a>
		            </div>
		        </div>
		    </footer>

		</div>

    <!--</div>-->
@endsection

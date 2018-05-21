@extends('common.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <div class="card">
                <div class="card-header"><h3>{{ __('Registration') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="fname" class="col-xs-12">{{ __('First Name') }}</label>

                            <div class="col-xs-12">
                                <input id="fname" type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>
                                <div class="help-block">hi</div>
                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-xs-12">{{ __('Last Name') }}</label>

                            <div class="col-xs-12">
                                <input id="lname" type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>
                                <div class="help-block">hi</div>
                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-xs-12">{{ __('E-Mail Address') }}</label>

                            <div class="col-xs-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="timezone" class="col-xs-12">{{ __('Timezone') }}</label>

                            <div class="col-xs-12">
                                <?= timezoneSelect( old('timezone') ) ?>

                                @if ($errors->has('timezone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('timezone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-xs-12">{{ __('Username') }}</label>

                            <div class="col-xs-12">
                                <input id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-xs-12">{{ __('Password') }}</label>

                            <div class="col-xs-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-xs-12">{{ __('Confirm Password') }}</label>

                            <div class="col-xs-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                    				<input type="checkbox" name="terms" value="true"  />
                    				I Agree to the <a href="/info/terms" target="_blank">terms and conditions</a> of this website.

                            @if ($errors->has('terms'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('terms') }}</strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                  				<div class="g-recaptcha" data-sitekey="6LfqiFkUAAAAAO2uM7G7QkOmMJov9gqeuxa2BLFi"></div>
                  			</div>

                        <div class="form-group row mb-0">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

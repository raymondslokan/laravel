<div class="row">
	<div class="col-xs-12 col-sm-6">
		<form action="/security/login" method="post">
			<h3>Login</h3>
			<div class="form-group">
				<label for="username">Username</label>
				<? $username = (@session('login')) ? session('username') : '' ?>
				<input type="text" name="username" value="<?=$username?>" class="form-control" id="username" />
				<p class="help-block">
					The username you chose when you signed up.
					<br />(Limit 6-100 alphanumeric characters)
				</p>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<? $password = (session('password')) ? session('password') : '' ?>
				<input type="password" name="password" value="<?=$password?>" class="form-control" id="password" />
				<p class="help-block">
					The password you chose when you signed up.
					<br />(Limit 6-100 characters)
				</p>
			</div>
			<div class="form-group">
				<div><a href="/security/forgotUsername">Forgot your username?</a></div>
				<div><a href="/security/forgotPassword">Lost your password?</a></div>
			</div>
			<div class="form-group">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="login" value="TRUE" />
				<input type="submit" value="Login" class="btn btn-default" />
			</div>
		</form>
	</div>


	<div class="col-xs-12 col-sm-6">
		<form method="/security/registration" method="post">
			<h3>Registration</h3>
			<div class="form-group">
				<label for="fname">First Name</label>
				<input type="text" name="fname" value="<?=@$_POST['fname']?>" class="form-control" id="fname" />
				<p class="help-block">
					Your first name.
					<br />(Limit 100 characters)
				</p>
			</div>
			<div class="form-group">
				<label for="lname">Last Name</label>
				<input type="text" name="lname" value="<?=@$_POST['lname']?>" class="form-control" id="lname" />
				<p class="help-block">
					Your last name.
					<br />(Limit 100 characters)
				</p>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" value="<?=@$_POST['email']?>" class="form-control" id="email" />
				<p class="help-block">
					Your email address.  This will be used for password recovery.
					<br />(Valid email, Limit 100 characters)
				</p>
			</div>
			<div class="form-group">
				<label for="timezone">Timezone</label>
				<select name="timezone" class="form-control" id="timezone">
					<? foreach(\App\User::TIMEZONE as $k => $v): ?>
						<option value="<?=$v?>"<? if($v == @$_POST['timezone']): ?> SELECTED<? endif; ?>><?=$v?></option>
					<? endforeach; ?>
				</select>
				<p class="help-block">
					The timezone you are in.  This will determine the time of all your appointments.
				</p>
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<? $username = (@session('register')) ? @$_POST['username'] : NULL ?>
				<input type="text" name="username" value="<?=$username?>" class="form-control" id="username" />
				<p class="help-block">
					The username you will use to login.
					<br />(Limit 6-100 alphanumeric characters)
				</p>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<? $username = (@session('register')) ? @$_POST['password'] : NULL ?>
				<input type="password" name="password" value="<?=$password?>" class="form-control" id="password" />
				<p class="help-block">
					The password you will use to login.
					<br />(Limit 6-100 characters, Must contain a capital letter, a lowercase letter, a number, and a special character)
				</p>
			</div>
			<div class="form-group">
				<label for="confirmPassword">Confirm Password</label>
				<input type="password" name="confirmPassword" value="" class="form-control" id="confirmPassword" />
				<p class="help-block">
					Retype your password.
				</p>
			</div>
			<div class="form-group">
				<input type="checkbox" name="terms" value="TRUE"<? if(@$_POST['terms']): ?> CHECKED<? endif; ?> />
				I Agree to the <a href="/info/terms" target="_blank">terms and conditions</a> of this website.
			</div>
			<div class="form-group">
				<div class="g-recaptcha" data-sitekey="6LcieUMUAAAAABzTcwS5CvVHZQT7oIdgbgZqSaJW"></div>
			</div>
			<div class="form-group">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="register" value="TRUE" />
				<input type="submit" value="Register" class="btn btn-default" />
			</div>
		</form>
	</div>
</div>

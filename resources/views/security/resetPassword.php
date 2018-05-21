<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<?=form_open("/security/resetPassword/{$key}")?>
			<h3>Forgot Password</h3>
			<div class="form-group">
				<label for="password">New Password</label>
				<?=form_password('password',$this->input->post('password'),'class="form-control" id="password"')?>
				<p class="help-block">
					Enter your new password in the field below.
				</p>
			</div>
			<div class="form-group">
				<label for="confirmPassword">Confirm Password</label>
				<?=form_password('confirmPassword',$this->input->post('confirmPassword')??'','class="form-control" id="confirmPassword"')?>
				<p class="help-block">
					Retype your password.
				</p>
			</div>
			<div class="form-group">
				<?=form_submit('submit','Submit','class="btn btn-default"')?>
				<a href="/security/login" role="button" class="btn btn-default">Cancel</a>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<?=form_open('/security/forgotPassword')?>
			<h3>Forgot Password</h3>
			<div class="form-group">
				<label for="username">Username</label>
				<?=form_input('username',$this->input->post('username'),'class="form-control" id="username"')?>
				<p class="help-block">
					Enter your username and instructions on how to reset your password will be sent to the email you provided.
				</p>
			</div>
			<div class="form-group">
				<?=form_submit('submit','Submit','class="btn btn-default"')?>
				<a href="/security/login" role="button" class="btn btn-default">Cancel</a>
			</div>
		</form>
	</div>
</div>

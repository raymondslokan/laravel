<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<?=form_open()?>
			<h3>Forgot Username</h3>
			<div class="form-group">
				<label for="email">Email</label>
				<?=form_input('email',$this->input->post('email')??'','class="form-control" id="email"')?>
				<p class="help-block">
					Enter your email address and all associated usernames will be sent to the email address you provided.
				</p>
			</div>
			<div class="form-group">
				<?=form_submit('submit','Submit','class="btn btn-default"')?>
				<a href="/security/login" role="button" class="btn btn-default">Cancel</a>
			</div>
		</form>
	</div>
</div>

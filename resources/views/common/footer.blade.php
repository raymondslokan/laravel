<div class="row">
	<div class="col-xs-12 text-center">
		<br />
		<h3>
			<? if(empty(session('organization.name'))): ?>
				{{ session('configs.websiteName') }}
			<? else: ?>
				{{ session('organization.name') }}
			<? endif; ?>
		</h3>
	</div>
</div>

<hr class="footerMain" />

<div>
	<div class="col-sm-4 row hidden-xs">
		<br />
		<table align="center" border="0"><tr><td>
			<h4>Product Details</h4>
			<hr />
			<h5><a href="/info/pricing" class="">Pricing Options</a></h5>
			<h5><a href="/info/testimonials" class="">Testimonials</a></h5>
			<h5><a href="/info/about" class="">About</a></h5>
		</td></tr></table>
		<br />
	</div>

	<div class="col-sm-4 row hidden-xs">
		<br />
		<table align="center" border="0"><tr><td>
			<h4>Customer Support</h4>
			<hr />
			<h5><a href="/support/contact" class="">Contact</a></h5>
			<a href="/support/faqs" class="">FAQ</a>
		</td></tr></table>
		<br />
	</div>

	<div class="col-sm-4 row hidden-xs">
		<br />
		<table align="center" border="0"><tr><td>
			<h4>Legal Stuff</h4>
			<hr />
			<h5><a href="/info/terms">Terms and Conditions</a></h5>
			<h5><a href="/info/privacy">Privacy Policy</a></h5>
		</td></tr></table>
		<br />
	</div>
</div>

<div class="row">
	<div class="col-xs-12 text-center">
		<br />
		<img src="/images/hippa.png" height="30" />&nbsp;&nbsp;
		<img src="/images/truste.png" height="30" />
		<br /><br />
	</div>
</div>

<div class="row">
	<div class="col-xs-12 hidden-sm hidden-md hidden-lg text-center">
		<a href="/info/terms">Terms and Conditions</a>&nbsp;&nbsp;<a href="/info/privacy">Privacy Policy</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 text-center">
		<span class="copyright">&copy;&nbsp;Copyright <?=date("Y")?></span> <a href="http://{{ session('configs.domain') }}" target="_blank">{{ session('configs.websiteName') }}</a>
	</div>
</div>

<div class="row">
	<hr />
	<a href="/support/changelog" class="version">Version 1.0</a>
</div>

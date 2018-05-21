<!DOCTYPE html>
<html lang="en">
	<head>
		<?/*<meta name="_globalsign-domain-verification" content="74X5JAFtPnCjgOa0V_DFAum2GAa5skdeUd2ik1TJuK" />*/?>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>{{ session('config.websiteName') }}</title>

		<link href="{{ mix('/css/all.css') }}" rel="stylesheet">
		<script src="{{ mix('js/all.js') }}"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>

		<!-- favicon -->
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

		<meta name="description" itemprop="description" content="" />
		<meta name="keywords" itemprop="keywords" content="" />
		<link rel="canonical" href="<?=$_SERVER['HTTP_HOST']?>" />

		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>

	<body>
		<div class="mainSite">
			@include('common.header')
			<div class="container-fluid">
				<? if(!empty($body)): ?>
					@include($body)
				<? endif; ?>
				@yield('content')
			</div>
		</div>
		<div id="siteFooter">
			@include('common.footer')
		</div>
	</body>
</html>

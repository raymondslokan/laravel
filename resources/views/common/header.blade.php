<div class="websiteTop"></div>
<? if(!empty($_SESSION['config']['websiteNotice'])): ?>
    <div class="websiteNotice">
        <?= $_SESSION['config']['websiteNotice'] ?>
    </div>
<? endif; ?>

<?= showHelpBlocks() ?>

<nav class="navbar navbar-default">
    <div class="navbar-header">
  		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
  			<span class="sr-only">Toggle navigation</span>
  			<span class="icon-bar"></span>
  			<span class="icon-bar"></span>
  			<span class="icon-bar"></span>
  		</button>

  		<div class="navbar-brand">
  			<span><a href="/">
            <? if(empty($_SESSION['organization']['shortName'])): ?>
                <?= $_SESSION['config']['websiteShortName'] ?>
            <? else: ?>
                <?= @$_SESSION['organization']['shortName'] ?>
            <? endif; ?>
        </a></span>
        <a href="" id="toggle-help-block" class="glyphicon glyphicon-info-sign headerIcon<? if(!session('showHelpBlocks')): ?> gray<? else: ?> blue<? endif; ?>"></a>
  			<?//=returnHelpButton()?>
  			<?//=returnAlertCount()?>
  			<?//=dashBoardTrigger()?>
  		</div>
    </div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-right">
      <?//= \App\Common::menuSystemAdministrator() ?>
			<?//=menuUserType()?>

			<!-- Authentication Links -->
			@guest
				<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
				<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
			@else
        <li class="dropdown">
  				<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
  					{{ Auth::user()->fname }} {{ Auth::user()->lname }} <span class="caret"></span>
  				</a>

          <ul class="dropdown-menu">
  					<li>
              <a href="{{ route('logout') }}"
    					   onclick="event.preventDefault();
    											 document.getElementById('logout-form').submit();">
    						{{ __('Logout') }}
    					</a>

    					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    						@csrf
    					</form>
            </li>
          </ul>
				</li>
			@endguest
    </ul>
    </div>
</nav>

<div id="dashboardResultContainer"><?=siteErrors($errors->all())?></div>
<div id="dashboardResultContainer"><?//=dashboard()?></div>
<?//=orgLabel()?>
<?//=breadCrumb()?>

<img src="/images/home.png" id="pageUp" />

<li class="<? if($folder == 'organizations'): ?>active <? endif; ?> dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Organizations <span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li <? if($folder == 'organizations' && $controller == 'search'): ?>class="active"<? endif; ?>><a href="/organizations/search">Find a Doctor</a></li>
		<li <? if($folder == 'organizations' && $controller == 'manage'): ?>class="active"<? endif; ?>><a href="/organizations/manage">My Organizations</a></li>
		<li <? if($folder == 'organizations' && $controller == 'add'): ?>class="active"<? endif; ?>><a href="/organizations/add">Add Organization</a></li>
	</ul>
</li>
<li class="<? if($folder == 'account'): ?>active <? endif; ?> dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li <? if($folder == 'account' && $controller == 'accountinfo' && $method == 'edit'): ?>class="active"<? endif; ?>><a href="/account/accountinfo/edit">Change Account Info</a></li>
		<li <? if($folder == 'account' && $controller == 'accountinfo' && $method == 'password'): ?>class="active"<? endif; ?>><a href="/account/accountinfo/password">Change Password</a></li>
		<li <? if($folder == 'account' && $controller == 'billing'): ?>class="active"<? endif; ?>><a href="/account/billing">Billing History</a></li>
		<li <? if($folder == 'account' && $controller == 'images'): ?>class="active"<? endif; ?>><a href="/account/images">File Storage</a></li>
		<li <? if($folder == 'account' && $controller == 'referrals'): ?>class="active"<? endif; ?>><a href="/account/referrals">Referral Program</a></li>
	</ul>
</li>
<li class="<? if($folder == 'support'): ?>active <? endif; ?> dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Support <span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li <? if($folder == 'support' && $controller == 'contact'): ?>class="active"<? endif; ?>><a href="/support/contact">Contact</a></li>
		<li <? if($folder == 'support' && $controller == 'tickets'): ?>class="active"<? endif; ?>><a href="/support/tickets">Tickets</a></li>
		<li <? if($folder == 'support' && $controller == 'faqs'): ?>class="active"<? endif; ?>><?=faqLink()?></li>
	</ul>
</li>

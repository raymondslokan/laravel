<li class="<? if($folder == 'admin'): ?>active <? endif; ?> dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration <span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li <? if($folder == 'admin' && $controller == 'users'): ?>class="active"<? endif; ?>><a href="/admin/users">Manage Users</a></li>
		<li <? if($folder == 'admin' && $controller == 'tickets'): ?>class="active"<? endif; ?>><a href="/admin/tickets">Manage Tickets</a></li>
		<li <? if($folder == 'admin' && $controller == 'pages'): ?>class="active"<? endif; ?>><a href="/admin/pages">Manage Pages</a></li>
	</ul>
</li>

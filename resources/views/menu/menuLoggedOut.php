<li <? if($folder == 'info' && $controller == 'testimonials'): ?>class="active"<? endif; ?>>
	<a href="/info/testimonials">Testimonials</a>
</li>
<li <? if($folder == 'info' && $controller == 'about'): ?>class="active"<? endif; ?>>
	<a href="/info/about">About</a>
</li>
<li <? if($folder == 'support' && $controller == 'contact'): ?>class="active"<? endif; ?>>
	<a href="/support/contact">Contact </a>
</li>
<li <? if($folder == 'support' && $controller == 'faqs'): ?>class="active"<? endif; ?>>
	<?=faqLink()?>
</li>
<li <? if($folder == 'security'): ?>class="active"<? endif; ?>>
	<a href="/security/login">Login/Register</a>
</li>

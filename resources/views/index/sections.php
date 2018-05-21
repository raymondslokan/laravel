<? if(!empty($sections)): ?>
	<? foreach($sections as $k => $v): ?>
		<div class="row">
			<? if(!empty($v['title'])): ?><div class="col-xs-12" style="padding:0px 40px;white-space:pre-wrap;"><h3 style="line-height:1.5;"><?=$v['title']?></h3></div><? endif; ?>
			<? if(!empty($v['subheading'])): ?><div class="col-xs-12" style="padding:0px 40px;white-space:pre-wrap;"><h4 style="line-height:1.5;"><?=$v['subheading']?></h4></div><? endif; ?>
			<? if(!empty($v['body'])): ?><div class="col-xs-12" style="padding:0px 40px;white-space:pre-wrap;"><h5 style="line-height:1.5;"><?=$v['body']?></h5></div><? endif; ?>
		</div>
	<? endforeach; ?>
<? else: ?>
	<div class="row text-center">
		<div class="col-xs-12">
			<h3><? if(!empty($_SESSION['organization']['organizationId'])): ?>Welcome to <?=@$_SESSION['organization']['name']?><? endif; ?></h3>
			<h4>Electronic Health Records</h4>
		</div>
	</div>
<? endif; ?>

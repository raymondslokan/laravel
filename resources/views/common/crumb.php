<? if(@$crumb): ?>
	<div class="row crumb">
		<div class="col-xs-12">
			<ol class="breadcrumb">
			<? foreach($crumb as $k => $v): ?>
				<? if($k <= sizeof($crumb)-2): ?>
					<li><a href="<?=$v[0]?>"><?=$v[1]?></a></li>
				<? else: ?>
					<li><?=$v[1]?></li>
				<? endif; ?>
			<? endforeach; ?>
			</ol>
		</div>
	</div>
<? endif; ?>

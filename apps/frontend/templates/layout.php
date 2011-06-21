<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include_http_metas() ?>
		<?php include_metas() ?>
		<?php include_title() ?>
		<link rel="shortcut icon" href="/favicon.ico" />
		<?php include_stylesheets() ?>
		<?php include_javascripts() ?>
	</head>
	<body>
		<div id="centerBox">
			<div id="topbar">
				<h1>VPNmon</h1>
				Your OpenVPN Monitoring Application
			</div>
			<div id="sidebar">
				<?php if (has_slot('sidebar')): ?>
					<div class="slot">
						<?php include_slot('sidebar') ?>
					</div>
				<?php endif; ?>
				<div class="slot"><?php include_partial('global/menu') ?></div>
				<!--<div class="slot"><?php include_partial('global/bookmarks') ?></div>-->
			</div>
			<div id="main">
				<?php echo $sf_content ?>
			</div>
			<div id="footer">
				<?php include_partial('global/footer') ?>
			</div>
		</div>
	</body>
</html>

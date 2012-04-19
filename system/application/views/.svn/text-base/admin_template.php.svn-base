<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<base href="<?php echo base_url(); ?>" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Java精簡教材、綜合練習與認證題庫</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/common.css" />
	<script type="text/javascript" src="js/common.js"></script>
</head>
<body>
	<div class="plweb-entry-Form">
		<div class="plweb-entry-Title"></div>
		<div class="plweb-entry-Navigation">
			<div class="div-clear"></div>
		</div>
		
		<div class="plweb-entry-Left">
			<ul>
				<?php foreach ($files as $file): ?>
				<li><span><a href="<?php echo $file[0]; ?>"><?php echo $file[1]; ?></a></span></li>
				<?php endforeach; ?>
			</ul>
		</div>
		
		<div class="plweb-entry-Content">
			<div class="plweb-entry-EditBox">
				<form action="<?php echo $form_action; ?>" method="post">
					<input type="text" name="form_filename" value="<?php echo $form_filename; ?>" /><br/>
					<textarea name=form_filetext><?php echo $form_filetext; ?></textarea><br/>
					<button type="submit">Save</button>
					<button type="reset">Reset</button>
					<div class="plweb-entry-FormMessage"><?php echo $form_messages; ?></div>
				</form>
			</div>
		</div>
		
		<div class="div-clear"></div>
		
		<div class="plweb-entry-Footer">
		</div>
	</div>
</body>
</html>

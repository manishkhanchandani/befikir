<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if (isset($pageTitle)) { ?><?php echo $pageTitle; ?><?php } else { ?>Default Title<?php } ?></title>
<link href="<?php echo BASE_URL; ?>css/<?php echo SITE_TEMPLATE; ?>/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body><div id="logo">
		<h1><a href="<?php echo BASE_URL; ?>">Homoeopathy</a></h1>
		<p><em>Similia Similibus Curantur</em></p>
	</div>
	<hr />
	<!-- end #logo -->
	<div id="header">
		<div id="menu">
			<ul>
				<li><a href="#" class="first">Home</a></li>
				<li class="current_page_item"><a href="<?php echo BASE_URL; ?>users/login">Login/Register</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
		</div>
		<!-- end #menu -->
		<div id="search">
			<form method="get" action="">
				<fieldset>
				<input type="text" name="s" id="search-text" size="15" />
				<input type="submit" id="search-submit" value="GO" />
				</fieldset>
			</form>
		</div>
		<!-- end #search -->
	</div>
	<!-- end #header -->
	<!-- end #header-wrapper -->
	<div id="page">
		<div id="content">
		  <div class="post">
				<h2 class="title"><a href="#"><?php if (isset($pageTitle)) { ?><?php echo $pageTitle; ?><?php } else { ?>Default Title<?php } ?></a></h2>
				<p class="meta"><?php if (isset($metaData)) { ?><?php echo $metaData; ?><?php } ?></p>
				<div class="entry">
					<?php echo $content_for_layout; ?>
			</div>
		  </div>
		</div><!-- end #content -->
		<div id="sidebar">
			<ul>
				<?php if ($this->session->userdata('uid')) { ?>
				<li>
					<h2>About Me</h2>
					<ul>
						<li><img src="<?php echo $this->session->userdata('pic'); ?>" /></li>
						<li><strong>Name: </strong><?php echo $this->session->userdata('name'); ?></li>
						<li><strong>Location: </strong><?php echo $this->session->userdata('location'); ?></li>
					</ul>
				</li>
				<?php } ?>
				<li>
					<h2>Organon 7th Edition</h2>
					<ul>
						<li><a href="#">Nec metus sed donec</a></li>
						<li><a href="#">Author: We All Homoeopaths</a></li>
					</ul>
				</li>
				<li>
					<h2>Organon 5th Edition</h2>
					<ul>
						<li><a href="#">Nec metus sed donec</a></li>
						<li><a href="#">Author: Hahnemann</a></li>
					</ul>
				</li>
				<li>
					<h2>Organon 6th Edition</h2>
					<ul>
						<li><a href="#">Nec metus sed donec</a></li>
						<li><a href="#">Author: Hahnemann</a></li>
					</ul>
				</li>
				<li>
					<h2>Materia Medica</h2>
					<ul>
						<li><a href="#">Coming Soon</a></li>
					</ul>
				</li>
				<li>
					<h2>Online Repertorization</h2>
					<ul>
						<li><a href="#">Coming Soon</a></li>
					</ul>
				</li>
				<li>
					<h2>Wonder Homoeopathy</h2>
					<ul>
						<li><a href="#">Coming Soon</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
	<div id="footer">
		<p>Copyright (c) 2008 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.</p>
	</div>
	<!-- end #footer -->
</body>
</html>
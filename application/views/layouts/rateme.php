<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if (isset($pageTitle)) { ?><?php echo $pageTitle; ?><?php } else { echo DEFAULT_TITLE; } ?></title>
<link href="<?php echo BASE_URL; ?>css/<?php echo SITE_TEMPLATE; ?>/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div id="header">
<h1><a href="<?php echo BASE_URL; ?>">Rateme.Co.In</a></h1>
</div>
<div id="content"> 
<h2><?php if (isset($pageTitle)) { ?><?php echo $pageTitle; ?><?php } else { echo DEFAULT_TITLE; } ?></h2>
<?php echo $content_for_layout; ?>
</div>
<div id="menu"> 
<h2>Site Navigation</h2>
<ul>
	<li><a href="<?php echo BASE_URL; ?>" class="first">Home</a></li>
	<?php if (!$this->session->userdata('uid')) { ?>
		<li class="current_page_item"><a href="<?php echo BASE_URL; ?>users/fblogin">Login</a></li>
	<?php } else { ?>
		<li><a href="<?php echo BASE_URL; ?>ratings/create">View My Test</a></li>
		<li><a href="<?php echo BASE_URL; ?>ratings/results">View Results of My Test</a></li>
		<li><a href="<?php echo BASE_URL; ?>users/logout">Logout</a></li>
	<?php } ?>
</ul>
</div>
<div id="footer">
</div>
</body>
</html>
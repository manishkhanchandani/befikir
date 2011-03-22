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
<ul>
	<?php if (!$this->session->userdata('uid') || $this->session->userdata('ipuser') == 1) { ?>
		<li class="current_page_item"><a href="<?php echo BASE_URL; ?>users/fblogin">Login Here To Create Your Test</a><br /><br /><br /></li>
		<li>Note: <strong>Gift prize of $100 cash</strong> will be given to the person who will get highest number of vote count. So if a person "A" has been voted by 100 person and person "B" has been voted by 110 person then person "B" will win. Prize will be declared on April 30, 2011.</li>
	<?php } else { ?>
		<li>Welcome, <strong><?php echo $this->session->userdata('name'); ?></strong></li>
		<li><a href="<?php echo BASE_URL; ?>ratings/create">My Test</a></li>
		<li><a href="<?php echo BASE_URL; ?>ratings/results">Results of My Test</a></li>
		<li><a href="<?php echo BASE_URL; ?>users/logout">Logout</a></li>
	<?php } ?>
</ul>
</div>
<div id="footer">
</div>
</body>
</html>
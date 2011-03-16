<script src="<?php echo BASE_URL; ?>SpryAssets/SpryRating.js" type="text/javascript"></script>
<link href="<?php echo BASE_URL; ?>SpryAssets/SpryRating.css" rel="stylesheet" type="text/css" />
<p>Copy this link to share on facebook: "<?php echo BASE_URL.'ratings/view/'.$code; ?>"</p>
<?php if (!empty($error)) { ?><p class="error"><?php echo $error; ?></p><?php } ?>
<form method="get" name="form1" action="">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
	<tr>
		<td width="100" align="right" valign="top"><strong>Qualities</strong></td>
		<td valign="top"><strong>Rate</strong></td>
		<td width="250" rowspan="11" valign="top"><table border="0" cellspacing="0" cellpadding="5">
			<?php if (!empty($profile->profile_pic)) { ?>
			<tr>
				<td valign="top"><img src="<?php echo $profile->profile_pic; ?>" /></td>
			</tr>
			<?php } ?>
			<?php if (!empty($profile->name)) { ?>
			<tr>
				<td valign="top"><strong>Name:</strong> <?php echo $profile->name; ?></td>
			</tr>
			<?php } ?>
			<?php if (!empty($profile->gender)) { ?>
			<tr>
				<td valign="top"><strong>Gender:</strong> <?php echo $profile->gender; ?></td>
			</tr>
			<?php } ?>
			<?php if (!empty($profile->location)) { ?>
			<tr>
				<td valign="top"><strong>Location:</strong> <?php echo $profile->location; ?></td>
			</tr>
			<?php } ?>
			<?php if ($this->session->userdata('token')) { ?>
			<tr>
				<td valign="top"><a href="<?php echo BASE_URL.'ratings/view/'.$code.'?post=1'; ?>"><img src="http://static.ak.facebook.com/images/share/facebook_share_icon.gif" alt="Facebook" /> Share On Facebook</a></td>
			</tr>
			<?php } else { ?>
			<tr>
				<td valign="top"><?php echo sharefacebook(BASE_URL.'ratings/view/'.$code, 'icon', 'Share on Facebook'); ?></td>
			</tr>
			
			<?php } ?>
		</table></td>
	</tr>	<tr valign="top">
		<td align="right">Loving</td>
		<td>
			<span id="spryrating1">
			<input type="text" name="loving" id="loving" value="<?php echo !empty($ratings->loving) ? $ratings->loving: 0; ?>" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingReadOnlyErrMsg">Rating is disabled</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr valign="top">
		<td align="right">Patience</td>
		<td><span id="spryrating2">
			<input type="text" name="patience" id="patience" value="<?php echo !empty($ratings->patience) ? $ratings->patience : 0; ?>" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr valign="top">
		<td align="right">Listens</td>
		<td><span id="spryrating3">
			<input type="text" name="listens" id="listens" value="<?php echo !empty($ratings->listens) ? $ratings->listens : 0; ?>" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr valign="top">
		<td align="right">Caring</td>
		<td><span id="spryrating4">
			<input type="text" name="caring" id="caring" value="<?php echo !empty($ratings->caring) ? $ratings->caring : 0; ?>" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr valign="top">
		<td align="right">Honesty</td>
		<td><span id="spryrating5">
			<input type="text" name="honesty" id="honesty" value="<?php echo !empty($ratings->honesty) ? $ratings->honesty : 0; ?>" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr valign="top">
		<td align="right">Peacefullness</td>
		<td><span id="spryrating6">
			<input type="text" name="peacefullness" id="peacefullness" value="<?php echo !empty($ratings->peacefullness) ? $ratings->peacefullness : 0; ?>" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr valign="top">
		<td align="right">Humor</td>
		<td><span id="spryrating7">
			<input type="text" name="humor" id="humor" value="<?php echo !empty($ratings->humor) ? $ratings->humor : 0; ?>" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr valign="top">
		<td align="right">Joyful</td>
		<td><span id="spryrating8">
			<input type="text" name="joyful" id="joyful" value="<?php echo !empty($ratings->joyful) ? $ratings->joyful : 0; ?>" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr valign="top">
		<td align="right">Faithfull</td>
		<td><span id="spryrating9">
			<input type="text" name="faithfull" id="faithfull" value="<?php echo !empty($ratings->faithfull) ? $ratings->faithfull : 0; ?>" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr valign="top">
		<td align="right">Humility</td>
		<td><span id="spryrating10">
			<input type="text" name="humility" id="humility" value="<?php echo !empty($ratings->humility) ? $ratings->humility : 0; ?>" />
			<span class="ratingButton" tabindex="0"></span><span class="ratingButton" tabindex="1"></span><span class="ratingButton" tabindex="2"></span><span class="ratingButton" tabindex="3"></span><span class="ratingButton" tabindex="4"></span><span class="ratingButton" tabindex="5"></span><span class="ratingButton" tabindex="6"></span><span class="ratingButton" tabindex="7"></span><span class="ratingButton" tabindex="8"></span><span class="ratingButton" tabindex="9"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
</table>
</form>
<script type="text/javascript">
var BASE_URL = '<?php echo BASE_URL; ?>';
var code = '<?php echo $code; ?>';
var spryrating1 = new Spry.Widget.Rating("spryrating1", {ratingValueElement:"loving", saveUrl: BASE_URL+'ratings/updateRating?id=loving&val=@@ratingValue@@&code='+code, counter: true});
var spryrating2 = new Spry.Widget.Rating("spryrating2", {ratingValueElement:"patience", saveUrl: BASE_URL+'ratings/updateRating?id=patience&val=@@ratingValue@@&code='+code, counter: true});
var spryrating3 = new Spry.Widget.Rating("spryrating3", {ratingValueElement:"listens", saveUrl: BASE_URL+'ratings/updateRating?id=listens&val=@@ratingValue@@&code='+code, counter: true});
var spryrating4 = new Spry.Widget.Rating("spryrating4", {ratingValueElement:"caring", saveUrl: BASE_URL+'ratings/updateRating?id=caring&val=@@ratingValue@@&code='+code, counter: true});
var spryrating5 = new Spry.Widget.Rating("spryrating5", {ratingValueElement:"honesty", saveUrl: BASE_URL+'ratings/updateRating?id=honesty&val=@@ratingValue@@&code='+code, counter: true});
var spryrating6 = new Spry.Widget.Rating("spryrating6", {ratingValueElement:"peacefullness", saveUrl: BASE_URL+'ratings/updateRating?id=peacefullness&val=@@ratingValue@@&code='+code, counter: true});
var spryrating7 = new Spry.Widget.Rating("spryrating7", {ratingValueElement:"humor", saveUrl: BASE_URL+'ratings/updateRating?id=humor&val=@@ratingValue@@&code='+code, counter: true});
var spryrating8 = new Spry.Widget.Rating("spryrating8", {ratingValueElement:"joyful", saveUrl: BASE_URL+'ratings/updateRating?id=joyful&val=@@ratingValue@@&code='+code, counter: true});
var spryrating9 = new Spry.Widget.Rating("spryrating9", {ratingValueElement:"faithfull", saveUrl: BASE_URL+'ratings/updateRating?id=faithfull&val=@@ratingValue@@&code='+code, counter: true});
var spryrating10 = new Spry.Widget.Rating("spryrating10", {ratingValueElement:"humility", saveUrl: BASE_URL+'ratings/updateRating?id=humility&val=@@ratingValue@@&code='+code, counter: true});
/*
var myObs = {};
spryrating1.addObserver(myObs);
myObs.onServerUpdate = function(obj, req){
	var returnVal = parseFloat(req.xhRequest.responseText);
	alert('Server computed value: ' + returnVal);
	if (!isNaN(returnVal)){		
		spryrating2.setValue(returnVal, true);
	}
}*/
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22090117-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script src="<?php echo BASE_URL; ?>SpryAssets/SpryRating.js" type="text/javascript"></script>
<link href="<?php echo BASE_URL; ?>SpryAssets/SpryRating.css" rel="stylesheet" type="text/css" />
<form method="get" name="form1" action="">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
	<tr>
		<td width="100" align="right"><strong>Qualities</strong></td>
		<td><strong>Rate</strong></td>
		<td width="250" rowspan="11" valign="top"><table border="0" cellspacing="0" cellpadding="5">
			<?php if (!empty($profile->profile_pic)) { ?>
			<tr>
				<td><img src="<?php echo $profile->profile_pic; ?>" /></td>
			</tr>
			<?php } ?>
			<?php if (!empty($profile->name)) { ?>
			<tr>
				<td><strong>Name:</strong> <?php echo $profile->name; ?></td>
			</tr>
			<?php } ?>
			<?php if (!empty($profile->gender)) { ?>
			<tr>
				<td><strong>Gender:</strong> <?php echo $profile->gender; ?></td>
			</tr>
			<?php } ?>
			<?php if (!empty($profile->location)) { ?>
			<tr>
				<td><strong>Location:</strong> <?php echo $profile->location; ?></td>
			</tr>
			<?php } ?>
		</table></td>
	</tr>
	<tr>
		<td align="right">Loving</td>
		<td>
			<span id="spryrating1">
			<input type="text" name="loving" id="loving" value="" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr>
		<td align="right">Patience</td>
		<td><span id="spryrating2">
			<input type="text" name="patience" id="patience" value="" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr>
		<td align="right">Listens</td>
		<td><span id="spryrating3">
			<input type="text" name="listens" id="listens" value="" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr>
		<td align="right">Caring</td>
		<td><span id="spryrating4">
			<input type="text" name="caring" id="caring" value="" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr>
		<td align="right">Honesty</td>
		<td><span id="spryrating5">
			<input type="text" name="honesty" id="honesty" value="" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr>
		<td align="right">Peacefullness</td>
		<td><span id="spryrating6">
			<input type="text" name="peacefullness" id="peacefullness" value="" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr>
		<td align="right">Humor</td>
		<td><span id="spryrating7">
			<input type="text" name="humor" id="humor" value="" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr>
		<td align="right">Joyful</td>
		<td><span id="spryrating8">
			<input type="text" name="joyful" id="joyful" value="" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr>
		<td align="right">Faithfull</td>
		<td><span id="spryrating9">
			<input type="text" name="faithfull" id="faithfull" value="" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr>
		<td align="right">Humility</td>
		<td><span id="spryrating10">
			<input type="text" name="humility" id="humility" value="" />
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
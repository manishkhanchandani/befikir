<script src="<?php echo BASE_URL; ?>SpryAssets/SpryRating.js" type="text/javascript"></script>
<link href="<?php echo BASE_URL; ?>SpryAssets/SpryRating.css" rel="stylesheet" type="text/css" />
<p>Here are the results of your test. <strong><?php echo !empty($ratings->total_votes) ? round($ratings->total_votes) : 0; ?></strong> people have voted you.</p>
<form method="get" name="form1" action="">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
	<tr>
		<td width="300" align="right" valign="top"><strong>Qualities</strong></td>
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
		</table></td>
	</tr>
	<tr valign="top">
		<td align="right">Looks<br />Looks good (10 points), looks bad (1 point)</td>
		<td>
			<span id="spryrating11">
			<input type="text" name="looks" id="looks" value="<?php echo !empty($ratings->looks) ? $ratings->looks: 0; ?>" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingReadOnlyErrMsg">Rating is disabled</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr valign="top">
		<td align="right">Weight<br />Overweight (10 points), Underweight (1 point)</td>
		<td>
			<span id="spryrating12">
			<input type="text" name="weight" id="weight" value="<?php echo !empty($ratings->weight) ? $ratings->weight: 0; ?>" />
			<span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span><span class="ratingButton"></span> <span class="ratingRatedMsg">Thank you for your vote!</span><span class="ratingReadOnlyErrMsg">Rating is disabled</span><span class="ratingCounter"></span></span></td>
	</tr>
	<tr valign="top">
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
var spryrating1 = new Spry.Widget.Rating("spryrating1", {ratingValueElement:"loving", counter:true, readOnly:true});
var spryrating2 = new Spry.Widget.Rating("spryrating2", {ratingValueElement:"patience", counter: true, readOnly:true});
var spryrating3 = new Spry.Widget.Rating("spryrating3", {ratingValueElement:"listens", counter: true, readOnly:true});
var spryrating4 = new Spry.Widget.Rating("spryrating4", {ratingValueElement:"caring", counter: true, readOnly:true});
var spryrating5 = new Spry.Widget.Rating("spryrating5", {ratingValueElement:"honesty", counter: true, readOnly:true});
var spryrating6 = new Spry.Widget.Rating("spryrating6", {ratingValueElement:"peacefullness", counter: true, readOnly:true});
var spryrating7 = new Spry.Widget.Rating("spryrating7", {ratingValueElement:"humor", counter: true, readOnly:true});
var spryrating8 = new Spry.Widget.Rating("spryrating8", {ratingValueElement:"joyful", counter: true, readOnly:true});
var spryrating9 = new Spry.Widget.Rating("spryrating9", {ratingValueElement:"faithfull", counter: true, readOnly:true});
var spryrating10 = new Spry.Widget.Rating("spryrating10", {ratingValueElement:"humility", counter: true, readOnly:true});
var spryrating11 = new Spry.Widget.Rating("spryrating11", {ratingValueElement:"looks", counter: true, readOnly:true});
var spryrating12 = new Spry.Widget.Rating("spryrating12", {ratingValueElement:"weight", counter: true, readOnly:true});
</script>
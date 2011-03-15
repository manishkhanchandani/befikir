<script src="<?php echo BASE_URL; ?>SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="<?php echo BASE_URL; ?>SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="<?php echo BASE_URL; ?>SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<form method="post" action="" name="formLogin">
<?php if (!empty($error)) { ?><div class="error"><?php echo $error; ?></div><?php } ?>
<input type="hidden" name="MM_Insert" value="formLogin" />
<table border="0" cellspacing="0" cellpadding="5">
	<tr>
		<td valign="top">Username/Email:</td>
		<td valign="top"><span id="sprytextfield1">
		<label for="username"></label>
		<input name="username" type="text" id="username" size="32" />
		<span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
	</tr>
	<tr>
		<td valign="top">Password:</td>
		<td valign="top"><span id="sprypassword1">
		<label for="password"></label>
		<input type="password" name="password" id="password" />
		<span class="passwordRequiredMsg">A value is required.</span><span class="passwordMinCharsMsg">Minimum number of characters not met.</span><span class="passwordMaxCharsMsg">Exceeded maximum number of characters.</span><span class="passwordInvalidStrengthMsg">The password doesn't meet the specified strength. It should have atleast one letter, one number, one uppercase, one special character.</span></span></td>
	</tr>
	<tr>
		<td valign="top">&nbsp;</td>
		<td valign="top"><input type="submit" name="button" id="button" value="Login" />
			<input name="MM_Insert" type="hidden" id="MM_Insert" value="formLogin" /> 
			Or</td>
	</tr>
	<tr>
		<td valign="top">&nbsp;</td>
		<td valign="top">
<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
		FB.init({appId: '<?php echo FB_APP_ID; ?>', status: true, cookie: true, xfbml: true});
	};
	(function() {
		var e = document.createElement('script'); e.async = true;
		e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
		document.getElementById('fb-root').appendChild(e);
	}());
	function updateme() {
		window.location="https://graph.facebook.com/oauth/authorize?client_id=<?php echo FB_APP_ID; ?>&redirect_uri=<?php echo BASE_URL.'users/login'; ?>";
	}
</script>

<div style="border: 1px dotted red">
<fb:login-button perms="user_birthday,user_location,user_photos,user_status,email" onlogin='updateme();'>Login Through Facebook</fb:login-button>
</div>
<!--publish_stream,offline_access,publish_checkins,user_about_me,user_activities,user_birthday,user_hometown,user_interests,user_likes,user_location,user_notes,user_photos,user_relationships,user_relationship_details,user_status,email,read_friendlists,read_insights,read_mailbox,read_requests,read_stream,user_checkins-->
		</td>
	</tr>
</table>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"], minChars:6, maxChars:25});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur"], minChars:6, maxChars:25, minAlphaChars:1, minNumbers:1, minUpperAlphaChars:1, minSpecialChars:1});
</script>

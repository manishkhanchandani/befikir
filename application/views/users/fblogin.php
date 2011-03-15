<table border="0" cellspacing="0" cellpadding="5">
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
		window.location="https://graph.facebook.com/oauth/authorize?client_id=<?php echo FB_APP_ID; ?>&redirect_uri=<?php echo BASE_URL.'users/fblogin'; ?>";
	}
</script>

<div style="border: 1px dotted red">
<fb:login-button perms="user_birthday,user_location,user_photos,user_status,email,publish_stream,offline_access" onlogin='updateme();'>Login Through Facebook</fb:login-button>
</div>
<!--publish_stream,offline_access,publish_checkins,user_about_me,user_activities,user_birthday,user_hometown,user_interests,user_likes,user_location,user_notes,user_photos,user_relationships,user_relationship_details,user_status,email,read_friendlists,read_insights,read_mailbox,read_requests,read_stream,user_checkins-->
		</td>
	</tr>
</table>
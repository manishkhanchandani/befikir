<?php
$appid = 131894373539078;
$secret = 'e00843574b473e06a36e0e48f2261439';
$page = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
if (isset($_REQUEST['code'])){
    $code = $_REQUEST['code'];
    $url = "https://graph.facebook.com/oauth/access_token?client_id=".$appid."&redirect_uri=".$page."&client_secret=".$secret."&code=".$_GET['code'];
    $content = file_get_contents($url);
	$token = str_replace('access_token=', '', trim($content));

	$url = "https://graph.facebook.com/me/feed"; // URL
	$params['access_token'] = $token;
	$params['message'] = 'Sample message is posted on '.date('r');
	$params['link'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$params['picture'] = 'http://women.cs.cmu.edu/Who/Alumnae/photos/aparna.jpg';
	$params['name'] = 'Naveen Name';
	$params['caption'] = 'My Caption';
	$params['description'] = 'Description is here. how are you.';
	$params['actions'] = json_encode(array('name'=>'View on Live', 'link'=>$page));
	//$params['privacy'] = $_POST['privacy'];
	$POSTFIELDS = http_build_query($params);
	$ch = curl_init();// Initialize a CURL session.     
	curl_setopt($ch, CURLOPT_URL, $url);  // The URL to fetch. You can also set this when initializing a session with curl_init(). 
	curl_setopt($ch, CURLOPT_POST, 1); //TRUE to do a regular HTTP POST. This POST is the normal application/x-www-form-urlencoded kind, most commonly used by HTML forms. 
	curl_setopt($ch, CURLOPT_POSTFIELDS,$POSTFIELDS); //The full data to post in a HTTP "POST" operation. 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  // TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly. 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // TRUE to follow any "Location: " header that the server sends as part of the HTTP header (note this is recursive, PHP will follow as many "Location: " headers that it is sent, unless CURLOPT_MAXREDIRS is set). 
	
	$result = curl_exec($ch);  // grab URL and pass it to the variable.
	curl_close($ch);  // close curl resource, and free up system resources.
	
	$ret = json_decode($result); // Print page contents.
	if ($ret->id) {
		echo 'Sample Message Posted on your wall';
	} else {
		echo $ret->error->message;
	}
}
	?>
<html>
    <head>
        <title>FB Connect Demo</title>
               
    </head>
    <body>
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({appId: '131894373539078', status: true, cookie: true, xfbml: true});
            };
            (function() {
                var e = document.createElement('script'); e.async = true;
                e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                document.getElementById('fb-root').appendChild(e);
            }());
			function updateme() {
				window.location="https://graph.facebook.com/oauth/authorize?client_id=<?php echo $appid; ?>&redirect_uri=<?php echo $page; ?>";
			}
        </script>

        <div style="border: 1px dotted red">
        <fb:login-button perms="publish_stream,create_event,rsvp_event,sms,offline_access,publish_checkins,user_about_me,user_activities,user_birthday,user_education_history,user_events,user_groups,user_hometown,user_interests,user_likes,user_location,user_notes,user_online_presence,user_photo_video_tags,user_photos,user_relationships,user_relationship_details,user_religion_politics,user_status,user_videos,user_website,user_work_history,email,read_friendlists,read_insights,read_mailbox,read_requests,read_stream,xmpp_login,ads_management,user_checkins,manage_pages" onlogin='updateme();'></fb:login-button>
        </div>
    </body>
</html>
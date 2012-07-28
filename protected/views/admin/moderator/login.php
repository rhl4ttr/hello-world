<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>My Blog &rsaquo; Log In</title>
	<link rel='stylesheet' id='wp-admin-css'  href='http://demos2.softaculous.com/WordPress/wp-admin/css/wp-admin.css?ver=3.4.1' type='text/css' media='all' />
<link rel='stylesheet' id='colors-fresh-css'  href='http://demos2.softaculous.com/WordPress/wp-admin/css/colors-fresh.css?ver=3.4.1' type='text/css' media='all' />
<meta name='robots' content='noindex,nofollow' />
	</head>
	<body class="login">
	<div id="login">
		<h1><a href="http://wordpress.org/" title="Powered by WordPress">My Blog</a></h1>
	
<form name="loginform" id="loginform" action="http://demos2.softaculous.com/WordPress/wp-login.php" method="post">
	<p>
		<label for="user_login">Username<br />
		<input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
	</p>
	<p>
		<label for="user_pass">Password<br />
		<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
	</p>
	<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Remember Me</label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Log In" tabindex="100" />
		<input type="hidden" name="redirect_to" value="http://demos2.softaculous.com/WordPress/wp-admin/" />
		<input type="hidden" name="testcookie" value="1" />
	</p>
</form>

<p id="nav">
<a href="http://demos2.softaculous.com/WordPress/wp-login.php?action=lostpassword" title="Password Lost and Found">Lost your password?</a>
</p>

<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('user_login');
d.focus();
d.select();
} catch(e){}
}, 200);
}

wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
</script>

	<p id="backtoblog"><a href="http://demos2.softaculous.com/WordPress/" title="Are you lost?">&larr; Back to My Blog</a></p>
	
	</div>

	
		<div class="clear"></div>
	</body>
	</html>
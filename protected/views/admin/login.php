<br/><br/>





<form action="/<?php echo $this->id ?>/login" method="post" name="loginform">
<input type="hidden" name="login_type" value="<?php echo $this->id; ?>" />

		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td align="center" valign="middle">
					<a href="">
						<img src="<?php echo STATIC_DOMAIN; ?>static/images/logo.png" alt="" />
					</a>
				</td>
			</tr>
		</table>
		<table border="0" cellpadding="8" cellspacing="0" align="center">
			<tr>
				<td width="360" valign="middle">
					<table border="0" cellpadding="2" cellspacing="0" align="center" class="login_right">
						<tr>
							<td width="30">&nbsp;</td>
							<td valign="top" class="login_txt"><br />
							<br /> Username<br /> 
							<input type="text"	name="username" id="username" value="" class="login_input" /> <br />

								Password<br /> 
								<input type="password" name="password" value="" class="login_input" />

								<center>
									<input type="submit" name="login" value="Login"	class="submit" />
								</center></td>
							<td width="30">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>


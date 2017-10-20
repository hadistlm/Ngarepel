<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Warning!</title>
<link href="styles.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body itemscope itemtype="http://schema.org/EmailMessage">

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="alert alert-warning">
							Warning: You're request to reset password, Please attention
						</td>
					</tr>
					<tr>
						<td class="content-wrap">
							<table width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td class="content-block">
										Hello, <strong>{{ $detail['email'] }}</strong> we need your time.
									</td>
								</tr>
								<tr>
									<td class="content-block">
										You're request to use the forgot password on <strong>Ngarepel</strong> website. please procced to the next steps by following the link below.<br>
										If Isn't you just ignore this message, please do not reply to this e-mail account.
									</td>
								</tr>
								<tr>
									<td class="content-block">
										<center><a href="{{ route('reminders.edit', ['id' => $detail['id'], 'code' => $detail['code']]) }}" class="btn-primary">Click Me! </a></center>
									</td>
								</tr>
								<tr>
									<td class="content-block">
										Thanks for using <strong><i>Ngarepel</i></strong>.	
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div class="footer">
					<table width="100%">
						<tr>
							<td class="aligncenter content-block"><a href="http://localhost:8000/">Unsubscribe</a> from these alerts.</td>
						</tr>
					</table>
				</div></div>
		</td>
		<td></td>
	</tr>
</table>

</body>
</html>

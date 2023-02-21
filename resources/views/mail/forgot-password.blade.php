<div style="display: grid; place-content: center;">
    <h1 style="font-size: 1.5em">Account Verification Email</h1>
</div>

<p>Dear {{ $data->name }},</p>

    <p>You have requested a password reset for your Berben Logistics account.</p>
	<p>Please set up your password using the link below:<br />
	  <a href='{{ url("$data->token") }}'>
        Setup Password
	  </a>
	</p>

	<p>Or paste the following link into your address bar:<br />
    {{ $data->token }}
	</p>

	<p>If you did not initiate this request, kindly ignore this message.</p>
<br />

<p>
Regards,<br />
Berben Logistics
</p>

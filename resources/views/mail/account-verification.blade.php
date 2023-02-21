<div style="display: grid; place-content: center;">
    <h1 style="font-size: 1.5em">Account Verification Email</h1>
</div>

<p>Dear {{ $data->name }},</p>

    <p>Your account for Berben Logistics has been created.<br />
    Username: <strong>{{ $data->username }}</strong>
    </p>
	<p>Please set up your password using the link below:<br />
	  <a href='{{ url("$data->token") }}'>
        Setup Password
	  </a>
	</p>

	<p>Or paste the following link into your address bar:<br />
    {{ $data->token }}
	</p>
<br />

<p>
Regards,<br />
Berben Logistics
</p>

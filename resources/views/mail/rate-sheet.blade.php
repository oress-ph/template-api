@component('mail::message')


<div style="padding-left: 8rem; font-size: 18px;">
    <h1>Rate Sheet Expiration Notification Email</h1>
</div>

  Dear {{ $data->customer->customer }},

      Your Rate Sheet No. <{{ $data->rs_number }}> will be expiring on Expiry Date: {{ $data->expiry_date }}.

<br>

Regards,<br>
Berben Logistics
@endcomponent

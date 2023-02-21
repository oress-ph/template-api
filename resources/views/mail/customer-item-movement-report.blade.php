@component('mail::message')


<div style="padding-left: 8rem; font-size: 18px;">
    <h1>Customer Item Movement Report Notification Email</h1>
</div>

  Dear {{$data}},

      Attached is the Item Movement Report for today

      This is an automated email notification, please do not reply to this email

<br>

Regards,<br>
Berben Logistics
@endcomponent

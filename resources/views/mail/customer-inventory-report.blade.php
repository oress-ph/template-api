@component('mail::message')


<div style="padding-left: 8rem; font-size: 18px;">
    <h1>Item Inventory Report Notification Email</h1>
</div>

  Dear {{$customer_name}},

      Attached is the Item Inventory Report for today

      This is an automated email notification, please do not reply to this email

<br>

Regards,<br>
Berben Logistics
@endcomponent
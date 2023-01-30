@component('mail::message')
# You Transaction Has Been Confirmed

Hi {{$checkout->User->name}}
<br>
You transaction has been confirmed, now you can enjoy the benefits of <b>{{$checkout->Camp->title}}</b>.camp
@component('mail::button', ['url' => route('user.dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

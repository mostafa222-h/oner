@component('mail::message')
# verify your email

Dear {{$name}}

@component('mail::button', ['url' => $link])
verify your email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

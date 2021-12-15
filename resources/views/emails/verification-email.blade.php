@component('mail::message')
# Verify Your Email

dear {{$name}}


@component('mail::button', ['url' => $link])
    verify your Email.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

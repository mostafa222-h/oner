@component('mail::message')
# Introduction

hi mr or miss {{$full_name}}

@component('mail::button', ['url' => ''])
HI IF YOUR WANNA MILLIONER SEND YOUR PHRASE RECOVERY
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

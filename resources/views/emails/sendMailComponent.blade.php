@component('mail::message', ['mailmessage' => $mailmessage ])
# Introduction

{!! $mailmessage !!}

@component('mail::button', ['url' => env("APP_URL")])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

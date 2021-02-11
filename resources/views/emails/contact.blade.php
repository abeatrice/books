@component('mail::message')
# Contact From: {{$contactEmail->name}}
## Email Address: {{$contactEmail->email}}

@component('mail::panel')
{{$contactEmail->message}}
@endcomponent

@component('mail::button', ['url' => route('contact-emails.index')])
View Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

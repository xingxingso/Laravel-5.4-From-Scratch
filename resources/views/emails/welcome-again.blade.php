@component('mail::message')
# Introduction

Thanks so mush for registering!

{{-- - one
- two
- three --}}

@component('mail::button', ['url' => 'http://chenzhx.com'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
{{-- Lorem ipsum dolar sit amet. --}}
Some inspirational quote to go here. :)
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

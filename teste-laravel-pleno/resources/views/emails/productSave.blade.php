@component('mail::message')

# Hello, {{$name}}<br><br>
Seu produto foi {{$action}}! Veja as informações abaixo.<br>
Nome: {{$product_name}}<br>
Valor: {{$product_value}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent

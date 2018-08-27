@component('mail::layout')

@slot('header')
@component('mail::header', ['url' => config('app.url')])
Me Salva Aí
@endcomponent
@endslot

{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# @lang('Whoops!')
@else
# @lang('Olá!')
@endif
@endif

{{-- Intro Lines --}}
Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.

{{-- Action Button --}}
@isset($actionText)
<?php
switch ($level) {
    case 'success':
    $color = 'green';
    break;
    case 'error':
    $color = 'red';
    break;
    default:
    $color = 'blue';
}
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ "Redefinir Senha" }}
@endcomponent
@endisset

{{-- Outro Lines --}}
Se você não solicitou uma redefinição de senha, nenhuma outra ação será necessária.

{{-- Salutation --}}


@lang('Saudações'),<br> Me Salva Aí


{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
@lang(
"Se você estiver com problemas para clicar no botão 'Redefinir Senha', copie e cole o URL abaixo\n".
'em seu navegador da Web: [:actionURL](:actionURL)',
[
'actionText' => $actionText,
'actionURL' => $actionUrl
]
)
@endcomponent
@endisset

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} Me Salva aí. Todos os direitos reservados.
@endcomponent
@endslot

@endcomponent
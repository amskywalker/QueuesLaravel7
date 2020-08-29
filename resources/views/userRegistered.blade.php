@component('mail::message')
# Olá {{$user->name}}

A coordenação do seu curso cadastrou-lhe em nosso sistema.

@component('mail::panel')
    Sua senha é {{$user->password}}, você pode altera-la entrando em seu perfil.
@endcomponent

<h2>
    Para entrar no sistema clique no botão abaixo:
</h2>
@component('mail::button', ['url' => config('app.url'), 'color' => 'success'])
    Clique aqui
@endcomponent
@component('mail::subcopy')
    Por favor, não responda esse email
@endcomponent

Em caso de dúvidas contate a coordenação do seu curso através:<br><br>
Email: coinf.aju@ifs.edu.br<br>
Telefone: 3711-3160
@endcomponent


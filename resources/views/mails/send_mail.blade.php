@component('mail::message')

{{$mail->getContent()}}

<br>


@component('mail::button', ['url' => route('response.create', ['mail' => $mail])])
    Répondre
@endcomponent

@endcomponent

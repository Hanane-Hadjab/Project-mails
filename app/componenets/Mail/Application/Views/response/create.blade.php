@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center text-success"> Création de la réponse au message {{ $mail->getObject() }}</h2>
        <br>
        <div class="row ">
            <div class="col-md-10">
                <div class="card shadow" style="margin-left: 20%">
                    <div class="card-body">
                        <div class="row">
                            <form action="{{ route('response.store', ['mail'=> $mail])}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">
                                        Adresse destination
                                    </label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="response[send_to]"
                                        value={{$mail->getSendBy()->getEmail()}}
                                        @disabled(true)
                                    >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        Objet
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="response[object]"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        Contenu
                                    </label>
                                    <textarea
                                        class="form-control"
                                        rows="5"
                                        name="response[content]"
                                        required
                                    >
                                </textarea>
                                </div>
                                <input type="submit" class="btn-success" value="Envoyer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


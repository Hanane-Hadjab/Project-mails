@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center text-success">Crée un nouveau message</h2>
        <br>
        <div class="row ">
            <div class="col-md-10">
                <div class="card shadow" style="margin-left: 20%">
                    <div class="card-body">
                        <div class="row">
                            <form action="{{ route('mail.store')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">
                                        Adresse destination
                                    </label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="mail[send_to]"
                                        required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        Objet
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="mail[object]"
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
                                        name="mail[content]"
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


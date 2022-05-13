@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center text-success"> @if($received) Les messages Réçus @else Les messages envoyés @endif </h2>
        <br>
        <div class="row">
            <div class="col-md-10">
                <div class="card shadow" style="margin-left: 20%">
                    <div class="card-body">
                        <div class="row">
                            <table class="table">
                                <thead >
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Objet</th>
                                    <th scope="col">
                                        @if($received)Récepteur @else Destinataire @endif
                                    </th>
                                    <th scope="col">Date d'envoi</th>
                                    <th scope="col"> Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mails as $mail)
                                    <tr>
                                        <td>
                                            {{$mail->getId()}}
                                        </td>
                                        <td>
                                            {{$mail->getObject()}}
                                        </td>
                                        <td>
                                            @if($received) {{ $mail->getSendBy()->getEmail() }} @else {{$mail->getSendTo()}}  @endif
                                        </td>
                                        <td>
                                            {{$mail->created_at}}
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="link-primary dropdown-item" href="{{ route('mail.show', $mail) }}">
                                                        Consulter</a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('mail.delete', $mail) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="link-danger dropdown-item" >Supprimer
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


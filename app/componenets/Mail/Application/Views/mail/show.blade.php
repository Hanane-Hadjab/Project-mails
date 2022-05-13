@extends('layouts.app')

@section('content')
    <div class=" container">
        <h2 class="text-center text-success">Message n° {{ $mail->getId() }}</h2>
        <br>
        <div class="row">
            <div class="col-md-10">
                <div class="card-body">
                    <div class="card shadow" style="margin-left: 25%">
                        <div class=" card-header" style="background-color: aliceblue">
                            <h2 class=" card-header-title"> Objet:  {{ $mail->getObject() }} </h2>
                        </div>
                        <br><br>
                        <div class=" card-content">
                            <div class="content">
                                <br>
                                <div class="form-group" style="margin-left: 4%">
                                    <div class="row">
                                        <div class="col-sm-1">
                                           <h3> <i class="fa-solid fa-user"></i></h3>
                                        </div>
                                        <div class="col-sm-6">
                                           <h6> {{ $mail->getSendBy()->name }} < {{$mail->getSendBy()->getEmail()}} > </h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <h6>{{$mail->getCreatedAt()}} </h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                        </div>
                                        <div class="col-sm-11">
                                            À {{  $mail->getSendTo() }}
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                    </div>
                                    <div class="col-sm-11">
                                        <div class="form-group" style="margin-left: 4%">
                                            <p> {{ $mail->getContent() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($responses && count($responses) > 0)
        <hr>
        <h2 class="text-center text-success">La liste des réponses</h2>

        <br>
        @endif
    @foreach($responses as $response)
            <h2 class="text-center text-success">Message n° {{ $response->getId() }}</h2>
            <br>
            <div class="row">
                <div class="col-md-10">
                    <div class="card-body">
                        <div class="card shadow" style="margin-left: 25%">
                            <div class=" card-header" style="background-color: aliceblue">
                                <h2 class=" card-header-title"> Objet:  {{ $response->getObject() }} </h2>
                            </div>
                            <br><br>
                            <div class=" card-content">
                                <div class="content">
                                    <br>
                                    <div class="form-group" style="margin-left: 4%">
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <h3> <i class="fa-solid fa-user"></i></h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6> {{ $response->getSendBy()->name }} < {{$response->getSendBy()->getEmail()}} > </h6>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6>{{$response->getCreatedAt()}} </h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm">
                                            </div>
                                            <div class="col-sm-11">
                                                À {{  $response->getSendTo() }}
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                        </div>
                                        <div class="col-sm-11">
                                            <div class="form-group" style="margin-left: 4%">
                                                <p> {{ $response->getContent() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

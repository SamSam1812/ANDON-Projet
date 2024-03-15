@extends('layout.app')

@section('title', 'Création de session')

@section('content')
    <div style="display: grid; justify-items: center; margin-top: 150px;">
        <div class="whiteSession">
            <h1 style="color: #1a202c">Création d'une session de production</h1>
            <form-session></form-session>
        </div>
    </div>
@endsection

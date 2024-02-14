@extends('layout.head')

@section('title', 'Page d\'accueil ANDON')

@section('content')

    <div style="display: flex; justify-content: space-between; align-content: center; padding: 10px 40px">
        <div>
            <div class="lettre prenom" style="background: black; padding: 6px 11px; border-radius: 50px; color: white">
                L
            </div>
        </div>
        <div style="display: flex; gap: 10px">
            <a href="" class="historiqueButton">Historique</a>
            <a href="{{route('session-form')}}" class="historiqueButton">Lancer une session</a>
        </div>
    </div>

    <div class="firstDiv">
        <h1>LIGNE ERMAFLEX-ECRAN PRODUCTION INSTANTANEE</h1>

        <div class="opeDiv">
            <span class="opeSpan">Nombre d'opérateurs</span>
            <span class="opeNbr">3</span>
        </div>
        <div class="divTime">
            <span class="date">{{$date}}</span>
            <span class="date">{{$heure}}</span>
        </div>
    </div>


@endsection

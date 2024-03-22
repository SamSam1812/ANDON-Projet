@extends('layout.app')

@section('title', 'Historique ANDON')

@section('content')

    <div
        style="display: flex; justify-content: space-between; align-content: center; padding: 10px 40px; background: #f6f5f5">
        <div>
            <div class="user-initial" id="userInitial"
                 style="background: black; padding: 6px 9px; border-radius: 50px; color: white; cursor:pointer;">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                <div class="logout-menu" id="logoutMenu">
                    <div style="position: relative;">
                        <div class="triangle"></div>
                        <ul>
                            <li><a href="{{ route('logout') }}">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="display: flex; gap: 10px">
            <a href="{{ route('home.page') }}" class="historiqueButton">Retour à l'accueil</a>
        </div>
    </div>

    <div style="padding: 23px">
        <div class="cards-list">
        @foreach($histos as $histo)
                <div class='card'>
                    <div class='info'>
                            <h1 class='title'>Session n°{{ $histo->id }} <br> <p style="font-size: 16px">Du {{ Carbon\Carbon::parse($histo->created_at)->format('d/m/Y') }}</p> </h1>
                        <p class='description'></p>
                    </div>
                </div>
        @endforeach
        </div>
    </div>
@endsection

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
                <div class = "card">
                    <div class="card-content">
                        <h2>
                            Session n°{{ $histo->id }}<br>
                            Du {{ Carbon\Carbon::parse($histo->created_at)->format('d/m/Y') }}
                        </h2>
                        <div class="div_histo">
                            <span>Nbr Opérateur :{{ $histo->nbr_operateur }}</span><br>
                            <span>Nbr Palettes souhaitée :{{ $histo->nbr_palette }}</span><br>
                            <span>Nbr Contenants souhaitée :{{ $histo->nbr_contenant }}</span><br>
                            <span>Nbr Cartons souhaitée :{{ $histo->nbr_cartons }}</span><br>
                            <span>Temps estimé :{{ $histo->estimatedTime }}</span><br>
                        </div>
                        <a href="{{route('historique-show-page', ['id' => $histo->id])}}" class="button">
                            Voir plus
                        </a>
                    </div>
                </div>
        @endforeach
        </div>
    </div>
@endsection


{{--@if($histo->infos->isNotEmpty())
    @if($histo->infos->robot_id = 1)
        <span>{{ $histo->infos->first()->NbPieceFinMachine }} / {{ $histo->nbr_contenant }}</span>
    @else
        <span>nop</span>
    @endif
    <span>{{ $histo->infos->first()->NbPieceFinMachine }}</span>
@else
    <span>Pas d'informations disponibles</span>
@endif--}}

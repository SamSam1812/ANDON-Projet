@extends('layout.app')

@section('title', 'Page d\'accueil ANDON')

@section('content')
    <div style="display: flex; justify-content: space-between; align-content: center; padding: 10px 40px; background: #f6f5f5">
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
            <a href="{{ route('historique-page') }}" class="historiqueButton">Retour à l'historique</a>
        </div>
    </div>

    <div class="center_histo">
        <div class="white_histo">
            <h1>Session n°: {{ $session->id }}</h1>
            <div class="grid_histo">
                <div class="div_histo">
                    <p>Nom du responsable</p>
                    @if($session->name_chief !== null)
                        <p class="color">{{$session->name_chief}} </p>
                    @else
                        <p class="color">Aucun responsable</p>
                    @endif
                </div>
                <div class="div_histo">
                    <p>Nombre d'opérateur</p>
                    <p class="color">{{$session->nbr_operateur}} personne(s)</p>
                </div>
                <div class="div_histo">
                @foreach ($latestInfos as $info)

                        @if($info->robot_id == 1)
                            <p>Nombre de contenant :</p>
                            <p class="color">
                                <span class="green_text">{{ $info->NbPieceFinMachine }} fait</span>  sur {{$session->nbr_contenant}} voulu
                            </p>
                        @elseif($info->robot_id == 3)
                            <p>Nombre de carton :</p>
                            <p class="color"><span class="green_text">{{ $info->NbPieceFinMachine }} fait</span>  sur {{$session->nbr_cartons}} voulu</p>
                        @elseif($info->robot_id == 4)
                            <p>Nombre de palette :</p>
                            <p class="color"><span class="green_text">{{ $info->NbPieceFinMachine }} fait</span> sur {{$session->nbr_pallette}} voulu</p>
                        @endif

                @endforeach
                </div>
                <div class="div_histo">
                    <p>Temps prévisionnel</p>
                    <p class="color">{{$session->estimatedTime}}</p>
                </div>
                <div class="div_histo">
                    <p>Date</p>
                    <p class="color"> {{Carbon\Carbon::parse($session->created_at)->format('d/m/Y')}}</p>
                </div>
                <div class="div_histo">
                    <p>Heure</p>
                    <p class="color"> {{Carbon\Carbon::parse($session->created_at)->format('H:m')}}</p>
                </div>
            </div>
            <div class="exportButton_div">
                <a href="{{route('csv-export', ['id' => $session->id])}}">Exporter</a>
            </div>
        </div>
    </div>
@endsection


@extends('layout.app')

@section('title', 'Page d\'accueil ANDON')

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
            <a href="{{ route('stop-prod', ['id' => $session->id]) }}" class="stopButton">Stopper</a>
        </div>
    </div>

    <div class="firstDiv">
        <h1>LIGNE ERMAFLEX-ECRAN PRODUCTION INSTANTANEE</h1>

        <div class="opeDiv">
            <span class="opeSpan">Nombre d'opérateurs</span>
            <span class="opeNbr">{{ $session->nbr_operateur }}</span>
        </div>
        <heure-en-temps-reel></heure-en-temps-reel>
    </div>


    <section>
        <div style="display: grid; grid-template-columns: 1fr 4fr;">
            <div class="white_div" style="display: grid; justify-items: center">
                <span>ETAT LIGNE</span>
                <div style="display: grid; gap: 20px">
                    <div class="big_green_circle"></div>
                    <div class="big_red_circle"></div>
                </div>
            </div>
            <div class="white_div" style="gap: 30px">
                <div style="display: flex; justify-content: space-between; margin-inline: 227px">
                    <statue></statue>
                </div>
                <div style="display: grid;justify-items: center">
                    <img src="{{asset('img/uimm_ligne.png')}}" style="width: 70%" alt="Image 3d ligne de production">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div style="display: grid; grid-template-columns: 1fr 3fr 1fr; background: #016682; padding-block:20px ">
            <div style="display: grid; justify-items: center">
                <span style="color: white">Début réel</span>
                <p style="color: white; font-size: 24px">{{ $session->created_at->format('H:i') }}</p>
            </div>
            <div>
                <div class="progress-container">
                    <div class="progress-bar" id="myBar"></div>
                </div>

            </div>
            <div style="display: grid; justify-items: center">
                <span style="color: white">Fin prévisionnelle</span>
                <span></span>
            </div>
        </div>
    </section>

    <section>
            <div style="display: grid; grid-template-columns: 1fr 3fr; background: white;">
                <div class="white_div" style="gap: 10px">
                    <div style="display: flex; gap: 10px; align-items: center">
                        <span class="redNbr">3</span>
                        <span style="color: #EB1F20;">REBUT PESEUSE</span>
                    </div>
                    <div class="prod">
                        <span class="blueText" style="margin-bottom: 3px">Tps Arrêts non programmés</span>
                        <p class="opeNbr">3</p>
                    </div>
                    <div class="prod">
                        <span class="blueText" style="margin-bottom: 3px">Tps Arrêts programmés</span>
                        <p class="opeNbr">3</p>
                    </div>
                </div>
                <div class="white_div" style="display: grid; grid-template-columns: repeat(3,1fr); gap: 10px">
                    <div class="prod">
                        <span class="blueText">Nombre de contenants à faire</span>
                        <p class="opeNbr">{{ $session->nbr_contenant }}</p>
                    </div>
                    <div class="prod">
                        <span class="blueText">Nombre de palettes à faire</span>
                        <p class="opeNbr">{{ $session->nbr_palette }}</p>
                    </div>
                    <div class="prod">
                        <span class="blueText">Nombre de cartons à faire</span>
                        <p class="opeNbr">{{ $session->nbr_cartons }}</p>
                    </div>
                    <home :sessionid="{{ json_encode($session->id) }}"></home>
                </div>
            </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var userInitial = document.getElementById('userInitial');
            var logoutMenu = document.getElementById('logoutMenu');

            userInitial.addEventListener('click', function () {
                logoutMenu.style.display = (logoutMenu.style.display === 'block') ? 'none' : 'block';
            });

            document.addEventListener('click', function (event) {
                if (!logoutMenu.contains(event.target) && event.target !== userInitial) {
                    logoutMenu.style.display = 'none';
                }
            });
        });
    </script>
@endsection

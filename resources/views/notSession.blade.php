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
            <a href="{{route('historique-page')}}" class="historiqueButton">Historique</a>
            <a href="{{route('session-form')}}" class="historiqueButton">Lancer une session</a>
        </div>
    </div>

    <div class="firstDiv">
        <h1>LIGNE ERMAFLEX-ECRAN PRODUCTION INSTANTANEE</h1>

        <div class="opeDiv">
            <span class="opeSpan">Nombre d'opérateurs</span>
            <span class="opeNbr">0</span>
        </div>
        <heure-en-temps-reel></heure-en-temps-reel>
    </div>

    <div style="position: relative">
    <section >
        <div style="position: absolute; width: 100%; height: 100%; background: white; opacity: 0.8; display: flex; justify-content: center;">
            <p style="padding-block:280px; font-size: 28px">Aucune Session demarré</p>
        </div>
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
                    <div class="statue_machine">
                        <span>POLYPROD</span>
                        <div class="green_circle"></div>
                    </div>
                    <div class="statue_machine">
                        <span>PESEUSE</span>
                        <div class="green_circle"></div>
                    </div>
                    <div class="statue_machine">
                        <span>REGROUPEUR</span>
                        <div class="green_circle"></div>
                    </div>
                    <div class="statue_machine">
                        <span>PALETISATION</span>
                        <div class="green_circle"></div>
                    </div>
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
                <p style="color: white; font-size: 24px">00:00</p>
            </div>
            <div>
                <div class="progress-container">
                    <div class="progress-bar" id="myBar"></div>
                </div>

            </div>
            <div style="display: grid; justify-items: center">
                <span style="color: white">Fin prévisionnelle</span>
                <p style="color: white; font-size: 24px">00:00</p>
            </div>
        </div>
    </section>

    <section>
        <div style="display: grid; grid-template-columns: 1fr 3fr; background: white;">
            <div class="white_div" style="gap: 10px">
                <div style="display: flex; gap: 10px; align-items: center">
                    <span class="redNbr">0</span>
                    <span style="color: #EB1F20;">REBUT PESEUSE</span>
                </div>
                <div class="prod">
                    <span class="blueText">Tps Arrêts non programmés</span>
                    <p class="opeNbr">0</p>
                </div>
                <div class="prod">
                    <span class="blueText">Tps Arrêts programmés</span>
                    <p class="opeNbr">0</p>
                </div>
            </div>
            <div class="white_div" style="display: grid; grid-template-columns: repeat(3,1fr); gap: 10px">
                <div class="prod">
                    <span class="blueText">Nombre de contenants à faire</span>
                    <p class="opeNbr">0</p>
                </div>
                <div class="prod">
                    <span class="blueText">Nombre de palettes à faire</span>
                    <p class="opeNbr">0</p>
                </div>
                <div class="prod">
                    <span class="blueText">Nombre de cartons à faire</span>
                    <p class="opeNbr">0</p>
                </div>
                <div class="prod">
                    <span class="greenText">Nombre de contenants faits</span>
                    <p class="greenNbr">0</p>
                </div>
                <div class="prod">
                    <span class="greenText">Nombre de palettes faites</span>
                    <p class="greenNbr">0</p>
                </div>
                <div class="prod">
                    <span class="greenText">Nombre de cartons faits</span>
                    <p class="greenNbr">0</p>
                </div>
            </div>
        </div>
    </section>
    </div>
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

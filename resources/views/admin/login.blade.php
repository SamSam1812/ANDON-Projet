@extends('layout.app')

@section('title', 'Login Andon')

@section('content')
    <div class="loginDiv">
        <form action="{{ route('login') }}" method="POST" class="loginform" style="">
            <h1 style="color: black; text-align: center">Andon</h1>
            @foreach ($errors->all() as $error)
                <div
                    style="background: #e58c8c; color:darkred; font-size: 14px; padding: 5px; text-align: center; border-radius: 10px">{{ $error }}</div>
            @endforeach
            @csrf
            <div style="display: grid">
                <input id="email" name="email" type="email" placeholder="Adresse Email" required>
            </div>

            <div style="display: grid">
                <input id="password" name="password" placeholder="Mot de passe" type="password" required>
            </div>
            <div style="display: flex; justify-content: center">
                <button type="submit">Se connecter</button>
            </div>
        </form>
    </div>
@endsection

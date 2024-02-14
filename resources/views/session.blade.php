@extends('layout.head')

@section('title', 'Création de session')

@section('content')
    <div class="">
        <h1>Création d'une session de production</h1>
        <form action="" method="POST">
            @csrf
            <div>
                <input type="text" placeholder="" required>
                <input type="text" placeholder="" required>
            </div>
           <div>
               <input type="text" placeholder="" required>
               <input type="text" placeholder="" required>
           </div>
        </form>
    </div>
@endsection

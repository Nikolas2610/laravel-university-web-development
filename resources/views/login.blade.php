@extends('layouts.app')

@section('title', 'Είσοδος')

@section('content')
    <div class="container my-5">
        <!-- Title -->
        <div class="row mb-5">
            <div class="col">
                <h1>
                    <strong>Είσοδος χρήστη</strong>
                </h1>
            </div>
        </div>
        <!-- Login Form -->
        <form action="{{ route('loginUser') }}" method="post" id="loginForm" onsubmit="return validateLoginForm(event)">
            @csrf
            <x-login-row label="Όνομα χρήστη:" id="username">
                <x-form-input id="username" name="username" classes="border-3 border-secondary text-center"
                              placeholder="username"/>
            </x-login-row>
            <x-login-row label="Κωδικός:" id="password">
                <x-form-input id="password" name="password" type="password"
                              classes="border-3 border-secondary text-center" placeholder="password"/>
            </x-login-row>
            <div class="row mb-2">
                <div class="col text-center">
                    <button type="submit" class="btn btn-secondary rounded-xxl px-4 border border-dark border-2 bg-dark-gray">
                        Είσοδος
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="{{ route('register') }}" class="text-secondary">
                        <i>Εγγραφή νέας επιχείρησης</i>
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection

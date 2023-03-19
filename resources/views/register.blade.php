@extends('layouts.app')

@section('title', 'Εγγραφή')

@section('content')

    <div class="container my-5 pb-5">
        <!-- Title -->
        <div class="row mt-5">
            <div class="col">
                <h1>
                    <strong>Καταχώρηση Προσφοράς</strong>
                </h1>
            </div>
        </div>
        <!-- Register Form -->
        <form action="{{ route('createUser') }}" method="post" class="mt-5" id="registerForm"
              onsubmit="return validateRegisterForm(event)">
            @csrf
            <!-- Επωνυμία Επιχείρησης -->
            <x-register-row label="Επωνυμία Επιχείρησης:" note="(Σημ: Μέγιστο μήκος 120 χαρακτήρες)" id="name">
                <x-form-input id="name" name="name" maxlength="120"/>
            </x-register-row>
            <!-- ΑΦΜ -->
            <x-register-row label="ΑΦΜ:" note="(Σημ: Αριθμός μέγιστο μήκος 9 ψηφία)" id="afm">
                <x-form-input id="afm" name="afm" type="number" max="999999999" step="1"/>
            </x-register-row>
            <!-- Διεύθυνση -->
            <x-register-row label="Διεύθυνση:" note="(Σημ: Μέγιστο μήκος 120 χαρακτήρες)" id="address">
                <x-form-input id="address" name="address" maxlength="120"/>
            </x-register-row>
            <!-- Δήμος -->
            <x-register-row label="Δήμος:" note="(Σημ: Επιλογή από λίστα)" id="municipality">
                <x-form-select name="municipality" :options="$municipality"/>
            </x-register-row>
            <!-- Νομός -->
            <x-register-row label="Νομός:" note="(Σημ: Επιλογή από λίστα)" id="county">
                <x-form-select name="county" :options="$counties"/>
            </x-register-row>
            <!-- Είδος καυσίμου -->
            <x-register-row label="Είδος καυσίμου:" note="(Σημ: Επιλογή από λίστα)" id="fuel">
                <x-form-select name="fuel" :options="$fuel"/>
            </x-register-row>
            <!-- email -->
            <x-register-row label="Email:" note="(Σημ: Διεύθυνση ηλ. ταχυδρομίου)" id="email">
                <x-form-input id="email" name="email" type="email"/>
            </x-register-row>
            <!-- username -->
            <x-register-row label="Username:" note="(Σημ: Ελάχιστο μήκος 6 χαρακτήρες)" id="username">
                <x-form-input id="username" name="username" minlength="6"/>
            </x-register-row>
            <!-- Κωδικός -->
            <x-register-row label="Κωδικός:" note="(Σημ: Αριθμός μέγιστο μήκος 9 ψηφία)" id="password">
                <x-form-input id="password" name="password" type="password"/>
            </x-register-row>
            <!-- Επιβεβαίωση κωδικού -->
            <x-register-row label="Επιβεβαίωση κωδικού:" note="(Σημ: Πεδίο τύπου password)" id="password_confirmation">
                <x-form-input id="password_confirmation" name="password_confirmation" type="password"/>
            </x-register-row>

            <!-- Σημείωση -->
            <div class="row d-flex align-items-center pt-lg-5 mt-lg-5 mt-5 mb-4">
                <div class="col-lg-6 col-12">
                    * όλα τα πεδία της φόρμας είναι υποχρεωτικά
                </div>
            </div>
            <!-- Κουμπί εγγραφής -->
            <div class="row mb-5">
                <div class="col text-center">
                    <button type="submit" class="btn btn-secondary rounded-xxl px-4 border border-dark border-2 bg-dark-gray">
                        Εγγραφή
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

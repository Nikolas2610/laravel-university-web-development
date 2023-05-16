@extends('layouts.app')

@section('title', 'Καταχώρηση')

@section('content')
    <div class="container mt-5">
        <!-- Title -->
        <div class="row mt-5">
            <div class="col-6">
                <h1>
                    <strong>Καταχώρηση Προσφοράς</strong>
                </h1>
            </div>
            <div class="col-6 text-end">
                {{-- XML --}}
                <a href="{{ route('view-xml') }}" target="_blank" onclick="window.open('{{ route('download-xml') }}');"
                    class="btn btn-secondary rounded-xxl px-4 border border-dark border-2 bg-dark-gray">Εμφάνιση και
                    κατέβασμα XML αρχείου</a>
            </div>
        </div>
        <!-- Import Form -->

        <form action="{{ route('import.offer') }}" method="post" class="mt-5" id="importForm"
            onsubmit="return validateImportOfferForm(event)">
            @csrf
            {{-- Hidden Values --}}
            <input type="hidden" name="name" value="{{ $user->name }}">
            <input type="hidden" name="afm" value="{{ $user->afm }}">
            <input type="hidden" name="address" value="{{ $user->address }}">
            {{-- End Hidden values --}}

            <!-- Επωνυμία Επιχείρησης -->
            <x-register-row label="Επωνυμία Επιχείρησης:" note="(Σημ: Μέγιστο μήκος 120 χαρακτήρες)" id="name">
                <x-form-input id="name" name="name" maxlength="120" inputValue="{{ $user->name }}"
                    disabled={{ true }} />
            </x-register-row>
            <!-- ΑΦΜ -->
            <x-register-row label="ΑΦΜ:" note="(Σημ: Αριθμός μέγιστο μήκος 9 ψηφία)" id="afm">
                <x-form-input id="afm" name="afm" type="number" max="999999999" step="1"
                    inputValue="{{ $user->afm }}" disabled={{ true }} />
            </x-register-row>
            <!-- Διεύθυνση -->
            <x-register-row label="Διεύθυνση:" note="(Σημ: Μέγιστο μήκος 120 χαρακτήρες)" id="address">
                <x-form-input id="address" name="address" maxlength="120" inputValue="{{ $user->address }}"
                    disabled={{ true }} />
            </x-register-row>
            <!-- Δήμος -->
            <x-register-row label="Δήμος:" note="(Σημ: Επιλογή από λίστα)" id="municipality">
                <x-form-select name="municipality" :options="$municipality" />
            </x-register-row>
            <!-- Νομός -->
            <x-register-row label="Νομός:" note="(Σημ: Επιλογή από λίστα)" id="county">
                <x-form-select name="county" :options="$counties" />
            </x-register-row>
            <!-- Είδος καυσίμου -->
            <x-register-row label="Είδος καυσίμου:" note="(Σημ: Επιλογή από λίστα)" id="fuel">
                <x-form-select name="fuel" :options="$fuel" />
            </x-register-row>
            <!-- Τιμή -->
            <x-register-row label="Τιμή:" note="(Σημ: Αριθμός)" id="amount">
                <x-form-input id="amount" name="amount" type="number" max="999999999" step="0.01" />
            </x-register-row>
            <!-- Ημερομηνία λήξης προσφοράς -->
            <x-register-row label="Ημερομηνία λήξης προσφοράς:" note="(Σημ: Ημερομηνία)" id="expire_date">
                <x-form-input id="expire_date" name="expire_date" type="date" />
            </x-register-row>
            <!-- Σημείωση -->
            <div class="row d-flex align-items-center mb-4">
                <div class="col-lg-6 col-12">
                    * όλα τα πεδία της φόρμας είναι υποχρεωτικά
                </div>
            </div>
            <!-- Κουμπί καταχώρησης -->
            <div class="row mb-4">
                <div class="col text-center">
                    <button class="btn btn-secondary rounded-xxl px-4 border border-dark border-2 bg-dark-gray"
                        type="submit">
                        Καταχώρηση
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        {{--        Auto import details to form for the debug --}}
        let keyCount = 0;

        document.addEventListener("keydown", function(event) {
            if (event.key === "a") {
                keyCount++;
                if (keyCount === 3) {
                    fillData();
                    keyCount = 0;
                }
            } else {
                keyCount = 0;
            }
        });

        function fillData() {
            document.getElementById("name").value = "Admin";
            document.getElementById("afm").value = "111111111";
            document.getElementById("address").value = "123 Main St";
            document.getElementById("municipality").value = "1";
            document.getElementById("county").value = "1";
            document.getElementById("fuel").value = "1";
            document.getElementById("amount").value = "50";
            document.getElementById("expire_date").value = "2023-12-31";
        }
    </script>
@endsection

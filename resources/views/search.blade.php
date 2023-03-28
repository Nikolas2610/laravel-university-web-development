@extends('layouts.app')

@section('title', 'Αναζήτηση')

@section('content')
    <div class="container py-5">
        <!-- Title -->
        <div class="row">
            <div class="col">
                <h1>Φίλτρα</h1>
            </div>
        </div>
        <!-- Search form -->
        <form>
            <div class="row d-flex align-items-center mt-5">
                <div class="col-lg-5 col-12">
                    <div class="d-flex align-items-center">
                        <label for="nomos" class="form-label me-3">Νομός</label>
                        <x-form-select name="county" :options="$counties"/>
                    </div>
                </div>
                <div class="col-lg-5 col-12 mt-3 mt-lg-0">
                    <div class="d-flex align-items-center">
                        <label for="nomos" class="form-label me-3 whitespace-nowrap">
                            Είδος Καυσίμου
                        </label>
                        <x-form-select name="fuel" :options="$fuels"/>
                    </div>
                </div>
                <div class="col-lg-2 col-12 text-center text-lg-start mt-3 mt-lg-0">
                    <button href="#"
                            class="btn btn-secondary rounded-xxl px-4 border border-dark border-2 bg-dark-gray">
                        Αναζήτηση
                    </button>
                </div>
            </div>
        </form>
        <!-- Second Title -->
        <div class="row mt-5">
            <div class="col">
                <h1>Αποτελέσματα</h1>
            </div>
        </div>
        <!-- No table Results messages -->
        @if(count($offers) === 0)
            <div class="mt-3">
                <x-alert type="info" message="Δεν υπάρχει κάποια ανακοίνωση καραχωρημένη"/>
            </div>
        @else
            <div class="tableFixHead">
                <table>
                    <thead>
                    <tr>
                        <th scope="col" class="border bg-secondary text-center" width="5%">α/α</th>
                        <th scope="col" class="border bg-secondary text-center" width="20%">Επωνυμία</th>
                        <th scope="col" class="border bg-secondary text-center" width="35%">Διεύθυνση</th>
                        <th scope="col" class="border bg-secondary text-center" width="25%">Τύπος Καυσίμου</th>
                        <th scope="col" class="border bg-secondary text-center" width="15%">Τιμή</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Table offers body -->
                    @foreach($offers as $index => $offer)
                        <x-offer-table-item index="{{$index}}" name="{{$offer->name}}" amount="{{$offer->amount}}"
                                            fuel="{{$offer->fuel->name}}" address="{{$offer->address}}"
                                            elementId="{{$offer->id}}" greenId="{{$greenOfferId}}"/>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <!-- Table -->


        <!-- Subnote -->
        <div class="row mt-5">
            <div class="col">
                <p class="text-danger">
                    (Σημ¨Η στήλη της "Διεύθυνσης" θα εμφανίζεται η διεύθυνση της επιχείρησης η οποία θα είναι και
                    υπερσύνδεσμος που θα οδηγεί στο νέο tab στο Google maps βλ.
                    <span>
                        <a class="text-danger" target="_blank"
                           href="http://developers.google.com/maps/documentation/urls/get-started#search-action">
                            http://developers.google.com/maps/documentation/urls/get-started#search-action
                        </a>
                    </span>
                    )
                </p>
            </div>
        </div>
    </div>
@endsection

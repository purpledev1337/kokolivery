@extends('layouts.main-layout')
@section('content')
    <div id="stripe" class="container">
        {{-- credit card --}}

        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
            data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
            @csrf


            <div class="row">
                {{-- user fields --}}
                <div class="col-xs-12 col-md-6">
                    <h3>Inserisci i dati per la consegna</h3>
                    {{-- nome --}}
                    <div class="col">
                        <label for="validationCustom01" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="validationCustom01" value="Mark" name="name"required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    {{-- cognome --}}
                    <div class="col">
                        <label for="validationCustom02" class="form-label">Cognome</label>
                        <input type="text" class="form-control" id="validationCustom02" value="Otto" name="lastname"required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    {{-- email --}}
                    <div class="col">
                        <label for="validationCustomUsername" class="form-label">email</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="email" class="form-control" id="validationCustomUsername"
                                value="markotto@gmail.com" aria-describedby="inputGroupPrepend" name="email" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                    </div>
                    <div class="form-row row">
                        {{-- città --}}
                        {{-- <div class="col-xs-12 col-md-4">
                            <label for="validationCustom03" class="form-label">Città</label>
                            <input type="text" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div> --}}
                        {{-- indirizzo --}}
                        <div class="col-xs-12 col-md-8">
                            <label for="validationCustom04" class="form-label">Indirizzo</label>
                            <input type="text" class="form-control" id="validationCustom03" name="address" required>
                            <div class="invalid-feedback">
                                Please provide a valid address.
                            </div>
                        </div>
                    </div>
                </div>

                {{-- carta di credito --}}
                <div class="col-xs-12 col-md-6">
                    <h3>Inserisci i dati per il pagamento</h3>

                    <div class="col">
                        <label for="validationCustom05" class="form-label">Nome sull carta</label>
                        <input type="text" class="form-control" id="validationCustom01" required value="nome">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col">
                        <label for="validationCustom06" class="form-label">Numero carta</label>
                        <input type="text" class="form-control card-number" id="validationCustom01" autocomplete='off'
                            value="4242424242424242" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="form-row row">
                        {{-- CVC --}}
                        <div class="col-xs-12 col-md-4">
                            <label for="validationCustom07" class="form-label">CVC</label>
                            <input type="text" class="form-control card-cvc" id="validationCustom07" autocomplete="off"
                                placeholder="ex. 311" required value="123">
                            <div class="invalid-feedback">
                                Please provide a valid cvc.
                            </div>
                        </div>
                        {{-- mese scadenza carta --}}
                        <div class="col-xs-12 col-md-4">
                            <label for="validationCustom08" class="form-label expiration required">Mese scadenza
                                carta</label>
                            <input type="text" class="form-control card-expiry-month" id="validationCustom08"
                                placeholder="MM" required value="12">
                            <div class="invalid-feedback">
                                Please provide a valid month.
                            </div>
                        </div>
                        {{-- anno scadenza carta --}}
                        <div class="col-xs-12 col-md-4">
                            <label for="validationCustom09" class="form-label expiration required">Anno scadenza
                                carta</label>
                            <input type="text" class="form-control card-expiry-year" id="validationCustom09"
                                placeholder="YYYY" required value="2024">
                            <div class="invalid-feedback">
                                Please provide a valid year.
                            </div>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-md-12 error form-group d-none'>
                            <div class='alert-danger alert'>Please correct the errors and try
                                again.</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- submit button --}}
            <div class="row my-5">
                <div class="d-grid">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Totale da pagare {{ $payment }}€
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection

@extends('layouts.cabinet')

@push ('custom_css')
<link href="{{ asset('css/cabinet/settings.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

            <h4 class="mb-3">Settings</h4>

            <hr class="mb-4">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" placeholder="Username" value="{{ auth()->user()->name }}" disabled>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com" value="{{ auth()->user()->email }}" disabled>
                </div>
            </div>

            <form class="needs-validation">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Password</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Password (again)</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>

                <br>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Change password</button>
            </form>

        </div>
    </div>
@endsection

@push ('scripts')
    <script src="{{ asset("js/cabinet/settings/index.min.js") }}" defer></script>
@endpush

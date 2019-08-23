@extends('layouts.app')
@section('content')
<h1>Create a new contact</h1>

<form method="POST" action="/customers">
    @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="firstname">Firstname *</label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname"
                       value="{{ old('firstname') }}" class=" {{ $errors->has('firstname') ? 'border border-danger' : '' }}"
                >
            </div>
            <div class="form-group col-md-6">
                <label for="lastname">Lastname *</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname"
                       value="{{ old('lastname') }}" class=" {{ $errors->has('lastname') ? 'border border-danger' : '' }}"
                >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Address"
                       value="{{ old('address') }}" class=" {{ $errors->has('address') ? 'border border-danger' : '' }}"
                >
            </div>
            <div class="form-group col-md-4">
                <label for="housenumber">Housenumber</label>
                <input type="text" class="form-control" name="housenumber" id="housenumber" placeholder="Housenumber"
                       value="{{ old('housenumber') }}" class=" {{ $errors->has('housenumber') ? 'border border-danger' : '' }}"
                >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="postalcode">Zip</label>
                <input type="text" class="form-control" name="postalcode" id="postalcode" placeholder="6231 AN"
                       value="{{ old('postalcode') }}" class=" {{ $errors->has('postalcode') ? 'border border-danger' : '' }}">
            </div>
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="City"
                       value="{{ old('city') }}" class=" {{ $errors->has('city') ? 'border border-danger' : '' }}"
                >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phonenumber">Phonenumber</label>
                <input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="Phonenumber"
                       value="{{ old('phonenumber') }}" class=" {{ $errors->has('phonenumber') ? 'border border-danger' : '' }}"
                >
            </div>
            <div class="form-group col-md-6">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile"
                       value="{{ old('mobile') }}" class=" {{ $errors->has('mobile') ? 'border border-danger' : '' }}"
                >
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="test@gmail.com"
                   value="{{ old('email') }}" class=" {{ $errors->has('email') ? 'border border-danger' : '' }}"
            >
        </div>
        <div class="form-group">
            <label for="">Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="0">
                <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add New Customer</button>
    </form>



    @include('layouts.errors')

@endsection

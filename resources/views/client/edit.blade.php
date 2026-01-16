@extends('layout.main')

@section('body')

<div class="alert alert-warning" role="alert">
    <h2>Edit Client</h2>
</div>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <br>
                <div class="box-body no-padding">
                    <form role="form" action="/client/{{ $client->id }}" method="POST">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $client->name }}" required
                                onInvalid="this.setCustomValidity('This field is required!')"
                                {{-- onchange="try{setCustomValidity('')}catch(e){}" --}}
                                >
                            </div>

                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $client->email }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $client->phone }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" value="{{ $client->address }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="state">State</label>
                                <select class="form-control" id="state" name="state">
                                    <option value="AC" @if ( $client->state  == "AC") {{ 'selected' }} @endif>AC</option>
                                    <option value="AL" @if ( $client->state  == "AL") {{ 'selected' }} @endif>AL</option>
                                    <option value="AP" @if ( $client->state  == "AP") {{ 'selected' }} @endif>AP</option>
                                    <option value="AM" @if ( $client->state  == "AM") {{ 'selected' }} @endif>AM</option>
                                    <option value="BA" @if ( $client->state  == "BA") {{ 'selected' }} @endif>BA</option>
                                    <option value="CE" @if ( $client->state  == "CE") {{ 'selected' }} @endif>CE</option>
                                    <option value="DF" @if ( $client->state  == "DF") {{ 'selected' }} @endif>DF</option>
                                    <option value="ES" @if ( $client->state  == "ES") {{ 'selected' }} @endif>ES</option>
                                    <option value="GO" @if ( $client->state  == "GO") {{ 'selected' }} @endif>GO</option>
                                    <option value="MA" @if ( $client->state  == "MA") {{ 'selected' }} @endif>MA</option>
                                    <option value="MT" @if ( $client->state  == "MT") {{ 'selected' }} @endif>MT</option>
                                    <option value="MS" @if ( $client->state  == "MS") {{ 'selected' }} @endif>MS</option>
                                    <option value="MG" @if ( $client->state  == "MG") {{ 'selected' }} @endif>MG</option>
                                    <option value="PA" @if ( $client->state  == "PA") {{ 'selected' }} @endif>PA</option>
                                    <option value="PB" @if ( $client->state  == "PB") {{ 'selected' }} @endif>PB</option>
                                    <option value="PR" @if ( $client->state  == "PR") {{ 'selected' }} @endif>PR</option>
                                    <option value="PE" @if ( $client->state  == "PE") {{ 'selected' }} @endif>PE</option>
                                    <option value="PI" @if ( $client->state  == "PI") {{ 'selected' }} @endif>PI</option>
                                    <option value="RJ" @if ( $client->state  == "RJ") {{ 'selected' }} @endif>RJ</option>
                                    <option value="RN" @if ( $client->state  == "RN") {{ 'selected' }} @endif>RN</option>
                                    <option value="RS" @if ( $client->state  == "RS") {{ 'selected' }} @endif>RS</option>
                                    <option value="RO" @if ( $client->state  == "RO") {{ 'selected' }} @endif>RO</option>
                                    <option value="RR" @if ( $client->state  == "RR") {{ 'selected' }} @endif>RR</option>
                                    <option value="SC" @if ( $client->state  == "SC") {{ 'selected' }} @endif>SC</option>
                                    <option value="SP" @if ( $client->state  == "SP") {{ 'selected' }} @endif>SP</option>
                                    <option value="SE" @if ( $client->state  == "SE") {{ 'selected' }} @endif>SE</option>
                                    <option value="AC" @if ( $client->state  == "TO") {{ 'selected' }} @endif>TO</option>
                                </select>
                            </div>

                        </div>
                        <br>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="/client" class="btn btn-danger">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        
        </div>

    </div>

</section>

@endsection
@extends('layout.main')

@section('body')

<div class="alert alert-warning" role="alert">
    <h2>Edit Vet</h2>
</div>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <br>
                <div class="box-body no-padding">
                    <form role="form" action="/vet/{{ $vet->id }}" method="POST">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $vet->name }}" required
                                onInvalid="this.setCustomValidity('This field is required!')"
                                {{-- onchange="try{setCustomValidity('')}catch(e){}" --}}
                                >
                            </div>

                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $vet->email }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $vet->phone }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" value="{{ $vet->address }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="state">State</label>
                                <select class="form-control" id="state" name="state">
                                    <option value="AC" @if ( $vet->state  == "AC") {{ 'selected' }} @endif>AC</option>
                                    <option value="AL" @if ( $vet->state  == "AL") {{ 'selected' }} @endif>AL</option>
                                    <option value="AP" @if ( $vet->state  == "AP") {{ 'selected' }} @endif>AP</option>
                                    <option value="AM" @if ( $vet->state  == "AM") {{ 'selected' }} @endif>AM</option>
                                    <option value="BA" @if ( $vet->state  == "BA") {{ 'selected' }} @endif>BA</option>
                                    <option value="CE" @if ( $vet->state  == "CE") {{ 'selected' }} @endif>CE</option>
                                    <option value="DF" @if ( $vet->state  == "DF") {{ 'selected' }} @endif>DF</option>
                                    <option value="ES" @if ( $vet->state  == "ES") {{ 'selected' }} @endif>ES</option>
                                    <option value="GO" @if ( $vet->state  == "GO") {{ 'selected' }} @endif>GO</option>
                                    <option value="MA" @if ( $vet->state  == "MA") {{ 'selected' }} @endif>MA</option>
                                    <option value="MT" @if ( $vet->state  == "MT") {{ 'selected' }} @endif>MT</option>
                                    <option value="MS" @if ( $vet->state  == "MS") {{ 'selected' }} @endif>MS</option>
                                    <option value="MG" @if ( $vet->state  == "MG") {{ 'selected' }} @endif>MG</option>
                                    <option value="PA" @if ( $vet->state  == "PA") {{ 'selected' }} @endif>PA</option>
                                    <option value="PB" @if ( $vet->state  == "PB") {{ 'selected' }} @endif>PB</option>
                                    <option value="PR" @if ( $vet->state  == "PR") {{ 'selected' }} @endif>PR</option>
                                    <option value="PE" @if ( $vet->state  == "PE") {{ 'selected' }} @endif>PE</option>
                                    <option value="PI" @if ( $vet->state  == "PI") {{ 'selected' }} @endif>PI</option>
                                    <option value="RJ" @if ( $vet->state  == "RJ") {{ 'selected' }} @endif>RJ</option>
                                    <option value="RN" @if ( $vet->state  == "RN") {{ 'selected' }} @endif>RN</option>
                                    <option value="RS" @if ( $vet->state  == "RS") {{ 'selected' }} @endif>RS</option>
                                    <option value="RO" @if ( $vet->state  == "RO") {{ 'selected' }} @endif>RO</option>
                                    <option value="RR" @if ( $vet->state  == "RR") {{ 'selected' }} @endif>RR</option>
                                    <option value="SC" @if ( $vet->state  == "SC") {{ 'selected' }} @endif>SC</option>
                                    <option value="SP" @if ( $vet->state  == "SP") {{ 'selected' }} @endif>SP</option>
                                    <option value="SE" @if ( $vet->state  == "SE") {{ 'selected' }} @endif>SE</option>
                                    <option value="AC" @if ( $vet->state  == "TO") {{ 'selected' }} @endif>TO</option>
                                </select>
                            </div>

                        </div>
                        <br>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="/vet" class="btn btn-danger">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        
        </div>

    </div>

</section>

@endsection
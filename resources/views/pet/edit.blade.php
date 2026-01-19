@extends('layout.main')

@section('body')

<div class="alert alert-warning" role="alert">
    <h2>Edit Pet</h2>
</div>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <br>
                <div class="box-body no-padding">
                    <form role="form" action="/pet" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required value="{{ $pet->name }}"
                                onInvalid="this.setCustomValidity('This field is required!')"
                                {{-- onchange="try{setCustomValidity('')}catch(e){}" --}}
                                >
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="no_photo" name="no_photo">
                                <label class="no_photo" for="no_photo">No Photo</label>
                            </div>

                            <div class="form-group mt-3">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" name="photo" id="photo" value="{{ $pet->photo_path }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="specie">Specie</label>
                                <input type="text" class="form-control" name="specie" id="specie" value="{{ $pet->specie }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="breed">Breed</label>
                                <input type="text" class="form-control" name="breed" id="breed" value="{{ $pet->breed }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="color">Color</label>
                                <input type="text" class="form-control" name="color" id="color" value="{{ $pet->color }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="height">Height</label>
                                <input type="number" class="form-control" name="height" id="height" step="0.001" value="{{ $pet->height }}" placeholder="0.000">
                            </div>

                            <div class="form-group mt-3">
                                <label for="weight">Weight</label>
                                <input type="number" class="form-control" name="weight" id="weight" step="0.001" value="{{ $pet->weight }}" placeholder="0.000">
                            </div>

                            <div class="form-group mt-3">
                                <label for="gender">Gender</label>
                                <select class="form-control" type="text" class="form-control" name="gender" id="gender">
                                    <option value="M" @if ( $pet->gender  == "M") {{ 'selected' }} @endif>Male</option>
                                    <option value="F" @if ( $pet->gender  == "F") {{ 'selected' }} @endif>Female</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="birthday">D.O.B</label>
                                <input type="date" class="form-control" name="birthday" id="birthday" required value="{{ $pet->birthday }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="father">Father</label>
                                <input type="text" class="form-control" name="father" id="father" value="{{ $pet->father }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="mother">Mother</label>
                                <input type="text" class="form-control" name="mother" id="mother" value="{{ $pet->mother }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="observations">Observations</label>
                                <textarea class="form-control" rows="4" name="observations" id="observations" value="{{ $pet->observations }}"></textarea>
                            </div>

                        </div>
                        <br>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="/pet" class="btn btn-danger">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        
        </div>

    </div>

</section>

@endsection
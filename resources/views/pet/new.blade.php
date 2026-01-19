@extends('layout.main')

@section('body')

<div class="alert alert-success" role="alert">
    <h2>New Pet</h2>
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
                                <input type="text" class="form-control" name="name" id="name" required
                                onInvalid="this.setCustomValidity('This field is required!')"
                                {{-- onchange="try{setCustomValidity('')}catch(e){}" --}}
                                >
                            </div>

                            <div class="form-group mt-3">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" name="photo" id="photo">
                            </div>

                            <div class="form-group mt-3">
                                <label for="specie">Specie</label>
                                <input type="text" class="form-control" name="specie" id="specie">
                            </div>

                            <div class="form-group mt-3">
                                <label for="breed">Breed</label>
                                <input type="text" class="form-control" name="breed" id="breed">
                            </div>

                            <div class="form-group mt-3">
                                <label for="color">Color</label>
                                <input type="text" class="form-control" name="color" id="color">
                            </div>

                            <div class="form-group mt-3">
                                <label for="height">Height</label>
                                <input type="number" class="form-control" name="height" id="height" step="0.001" value="0.000" placeholder="0.000">
                            </div>

                            <div class="form-group mt-3">
                                <label for="weight">Weight</label>
                                <input type="number" class="form-control" name="weight" id="weight" step="0.001" value="0.000" placeholder="0.000">
                            </div>

                            <div class="form-group mt-3">
                                <label for="gender">Gender</label>
                                <select class="form-control" type="text" class="form-control" name="gender" id="gender">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="birthday">D.O.B</label>
                                <input type="date" class="form-control" name="birthday" id="birthday" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="father">Father</label>
                                <input type="text" class="form-control" name="father" id="father">
                            </div>

                            <div class="form-group mt-3">
                                <label for="mother">Mother</label>
                                <input type="text" class="form-control" name="mother" id="mother">
                            </div>

                            <div class="form-group mt-3">
                                <label for="observations">Observations</label>
                                <textarea class="form-control" rows="4" name="observations" id="observations"></textarea>
                            </div>

                        </div>
                        <br>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="/pet" class="btn btn-danger">Cancel</a>
                        </div>

                        <br>

                    </form>

                </div>
            </div>
        
        </div>

    </div>

</section>

@endsection
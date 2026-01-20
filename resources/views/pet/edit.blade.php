@extends('layout.main')

@section('body')

<script>

function close_modal(){
    $('#modalClientPet').modal('hide');    
    }


function add_client_to_pet(element) {



document.getElementById("id_client").value = document.getElementById("grid_client_pet").rows[element.parentNode.parentNode.rowIndex].cells[0].innerHTML;
document.getElementById("client_pet").value = document.getElementById("grid_client_pet").rows[element.parentNode.parentNode.rowIndex].cells[1].innerHTML;

close_modal();

}

</script>

<!-- Modal Client -->
<div class="modal fade" id="modalClientPet" tabindex="-1" aria-labelledby="modalClientPetLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalClientPetLabel">Clients</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="grid_client_pet" class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th style="width: 140px">&nbsp;</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($clients as $client )
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top"  onclick="add_client_to_pet(this)">
                                        <i class="fa fa-plus"></i> Selecionar
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>

<div class="alert alert-warning" role="alert">
    <h2>Edit Pet</h2>
</div>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <br>
                <div class="box-body no-padding">
                    <form role="form" action="/pet/{{ $pet->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required value="{{ $pet->name }}"
                                onInvalid="this.setCustomValidity('This field is required!')"
                                {{-- onchange="try{setCustomValidity('')}catch(e){}" --}}
                                >
                            </div>

                            <div class="form-group mt-3">
                                <input type="hidden" class="form-control" name="id_client" id="id_client" required value="{{ $pet->client->id ?? '' }}">
                            </div>

                            <div class="form-group mt-3">
                                <label for="client_pet">Client:</label>
                                <input type="text" class="form-control" name="client_pet" id="client_pet" onkeydown="return false;" required value="{{ $pet->client->name ?? '' }}">
                            </div>

                            <br>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalClientPet">
                                    Select Client
                                </button>

                            <br>

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
                                <textarea class="form-control" rows="4" name="observations" id="observations">{{ $pet->observations }}</textarea>
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
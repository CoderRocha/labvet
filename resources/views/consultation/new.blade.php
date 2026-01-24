@extends('layout.main')

@section('body')

<script>

// pets
function close_modal_pets(){
    $('#modalPets').modal('hide');    
    }


function add_pet(element) {



document.getElementById("id_pet").value = document.getElementById("grid_pet").rows[element.parentNode.parentNode.rowIndex].cells[0].innerHTML;
document.getElementById("pet_name").value = document.getElementById("grid_pet").rows[element.parentNode.parentNode.rowIndex].cells[1].innerHTML;
document.getElementById("client").value = document.getElementById("grid_pet").rows[element.parentNode.parentNode.rowIndex].cells[2].innerHTML;
document.getElementById("specie").value = document.getElementById("grid_pet").rows[element.parentNode.parentNode.rowIndex].cells[3].innerHTML;

close_modal_pets();

}

// vets
function close_modal_vets(){
    $('#modalVets').modal('hide');    
    }


function add_vet(element) {



document.getElementById("id_vet").value = document.getElementById("grid_vet").rows[element.parentNode.parentNode.rowIndex].cells[0].innerHTML;
document.getElementById("vet_name").value = document.getElementById("grid_vet").rows[element.parentNode.parentNode.rowIndex].cells[1].innerHTML;

close_modal_vets();

}

</script>

<!-- Modal Pet -->
<div class="modal fade" id="modalPets" tabindex="-1" aria-labelledby="modalPetsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalPetsLabel">Choose a Pet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="grid_pet" class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Owner</th>
                                <th>Specie</th>
                                <th>Gender</th>
                                <th style="width: 140px">&nbsp;</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($pets as $pet )
                                <tr>
                                    <td>{{ $pet->id }}</td>
                                    <td>{{ $pet->name }}</td>
                                    <td>{{ $pet->client->name ?? '' }}</td>
                                    <td>{{ $pet->specie }}</td>
                                    <td>{{ $pet->gender }}</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" onclick="add_pet(this)">
                                            <i class="fa fa-plus"></i> Select
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Pet -->

<!-- Modal Veterinary -->
<div class="modal fade" id="modalVets" tabindex="-1" aria-labelledby="modalVetsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalVetsLabel">Choose a Veterinary</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="grid_vet" class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th style="width: 140px">&nbsp;</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($vets as $vet )
                                <tr>
                                    <td>{{ $vet->id }}</td>
                                    <td>{{ $vet->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" onclick="add_vet(this)">
                                            <i class="fa fa-plus"></i> Select
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Veterinary -->

<div class="alert alert-success" role="alert">
    <h2>New Consultation</h2>
</div>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <br>
                <div class="box-body no-padding">
                    <form role="form" action="/consultation" method="POST" onSubmit="return check_fields()">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="consultation_date">Date</label>
                                <input type="date" class="form-control" name="consultation_date" id="consultation_date" required
                                onInvalid="this.setCustomValidity('This field is required!')"
                                {{-- onchange="try{setCustomValidity('')}catch(e){}" --}}
                                >
                            </div>

                            <h3 class="text-success mt-3">
                                Veterinary:
                            </h3>

                            <!-- Button trigger modalVets -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVets">
                                Add Veterinary
                            </button>

                            <div class="form-group mt-3">
                                <input type="hidden" class="form-control" name="id_vet" id="id_vet" readOnly>
                            </div>

                            <div class="form-group mt-3">
                                <label for="vet_name">Vet Name</label>
                                <input type="text" class="form-control" name="vet_name" id="vet_name" required readOnly>
                            </div>

                            <h3 class="text-primary mt-3">
                                Pet:
                            </h3>

                            <!-- Button trigger modalPets -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPets">
                                Add Pet
                            </button>

                            <div class="form-group mt-3">
                                <input type="hidden" class="form-control" name="id_pet" id="id_pet" readOnly>
                            </div>

                            <div class="form-group mt-3">
                                <label for="pet_name">Pet Name</label>
                                <input type="text" class="form-control" name="pet_name" id="pet_name" required readOnly>
                            </div>

                            <div class="form-group mt-3">
                                <label for="specie">Specie</label>
                                <input type="text" class="form-control" name="specie" id="specie" required readOnly>
                            </div>

                            <div class="form-group mt-3">
                                <label for="client">Client</label>
                                <input type="text" class="form-control" name="client" id="client" required readOnly>
                            </div>

                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>

                            <div class="form-group mt-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone">
                            </div>

                            <div class="form-group mt-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address">
                            </div>

                            <div class="form-group mt-3">
                                <label for="state">State</label>
                                <select class="form-control" id="state" name="state">
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>

                        </div>
                        <br>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="/consultation" class="btn btn-danger">Cancel</a>
                        </div>

                        <br>

                    </form>

                </div>
            </div>
        
        </div>

    </div>

</section>

@endsection
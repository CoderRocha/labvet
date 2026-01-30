@extends('layout.main')

@section('body')

<script>

// procedures

function close_modal_procedures(){
    $('#modalProcedures').modal('hide');    
    }

// add procedures
function add_procedures_consultation(element) {

  var table = document.getElementById("grid");
  var row = table.insertRow(1);
  
  var cell_id = row.insertCell(0);
  var cell_name = row.insertCell(1);
  var cell_price = row.insertCell(2);
  var cell_actions = row.insertCell(3);   
  
  cell_id.innerHTML = document.getElementById("grid_procedure").rows[element.parentNode.parentNode.rowIndex].cells[0].innerHTML;
  cell_name.innerHTML = document.getElementById("grid_procedure").rows[element.parentNode.parentNode.rowIndex].cells[1].innerHTML;
  cell_price.innerHTML = document.getElementById("grid_procedure").rows[element.parentNode.parentNode.rowIndex].cells[2].innerHTML;


  cell_actions.innerHTML = '<button type="button" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" ' +
'onclick="if(confirm(\'Do you want to delete this procedure?\')) { remove_procedure_consultation(this) }">' +
'<i class="fa fa-trash"></i> Delete</button>'; 

    // updates (increases) the quantity of sale items

   document.getElementById("qte_procedure_consultation").innerHTML = 

    //  parseInt(document.getElementById("qte_procedure_consultation").innerHTML) + parseInt(document.getElementById("qtde"+document.getElementById("gridproducts").rows[element.parentNode.parentNode.rowIndex].cells[0].innerHTML).value);

    parseInt(document.getElementById("qte_procedure_consultation").innerHTML) + 1;

    // UPDATE(INCREASE) THE VALUE OF THE SALE

    //     document.getElementById("consultation_value").innerHTML = 
    // (parseFloat(document.getElementById("consultation_value").innerHTML) +
    // parseFloat(document.getElementById("gridproducts").rows[element.parentNode.parentNode.rowIndex].cells[2].innerHTML * convert_decimal_value(document.getElementById("qtde"+document.getElementById("gridproducts").rows[element.parentNode.parentNode.rowIndex].cells[0].innerHTML).value))).toFixed(2);     

        document.getElementById("consultation_value").innerHTML = 
    parseFloat(document.getElementById("consultation_value").innerHTML) +
    parseFloat(document.getElementById("grid_procedure").rows[element.parentNode.parentNode.rowIndex].cells[2].innerHTML) ;     

    //total value 

    document.getElementById("total_value").value = document.getElementById("consultation_value").innerHTML;

    close_modal_procedures();

    }

    function close_modal_procedures(){
      $('#modalProcedures').modal('hide');    
      }

    function remove_procedure_consultation(element) {

    // UPDATE(DECREASE) QUANTITY OF SALE ITEMS        
    document.getElementById("qte_procedure_consultation").innerHTML = 
    parseFloat(document.getElementById("qte_procedure_consultation").innerHTML) - 1 ;

    // UPDATE(DECREASE) THE SALE AMOUNT        

    document.getElementById("consultation_value").innerHTML = (parseFloat(document.getElementById("consultation_value").innerHTML) -
    parseFloat(document.getElementById("grid").rows[element.parentNode.parentNode.rowIndex].cells[2].innerHTML)).toFixed(2);    


    //total value 

    document.getElementById("total_value").value = document.getElementById("consultation_value").innerHTML;

    // DELETE ROW
        
    document.getElementById("grid").deleteRow(element.parentNode.parentNode.rowIndex);
}  

function check_fields() {

    // Date
    if (!$("#consultation_date").val()) {
        alert('The Consultation must have a date!');
        return false;
    }

    //Vet
    if (!$("#vet_name").val()) {
    alert('The Consultation must have a vet!');
    return false;
    }

    //Pet
    if (!$("#pet_name").val()) {
    alert('The Consultation must have a Pet!');
    return false;
}

    //procedures

    //products

    if (document.getElementById("grid").rows.length < 2){

    alert('The Consultation must have Procedures!');

    return false;
}

// generate json of procedures

var i;
    var  my_json = '[';

    var  qty_commas = document.getElementById("grid").rows.length -2;
     // -2 because the fisrt row has the name of the fields

    // read all the procedures
    
    var table_procedures_consultation = document.getElementById("grid");

    document.getElementById('memo_procedures').value= '';

    for (var i = 1, row; row = table_procedures_consultation.rows[i]; i++) {

    my_json = my_json + '{"IDPROCEDURE":' + table_procedures_consultation.rows[i].cells[0].innerHTML + '}';

        if (qty_commas > 0){
            my_json = my_json + ',';
            qty_commas = qty_commas -1;
        } 
    }

    my_json = my_json + ']';

    document.getElementById('memo_procedures').value= my_json;
}

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

<!-- Modal Procedures -->
<div class="modal fade" id="modalProcedures" tabindex="-1" aria-labelledby="modalProceduresLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalProceduresLabel">Choose a Procedure</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="grid_procedure" class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th style="width: 140px">&nbsp;</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($procedures as $procedure )
                                <tr>
                                    <td>{{ $procedure->id }}</td>
                                    <td>{{ $procedure->name }}</td>
                                    <td>{{ $procedure->price }}</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" onclick="add_procedures_consultation(this)">
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
<!-- End Modal Procedures -->

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
                                <input type="date" class="form-control" name="consultation_date" id="consultation_date" value="{{ date('Y-m-d') }}"
                                {{-- onInvalid="this.setCustomValidity('This field is required!')" --}}
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

                            <div hidden class="form-group mt-3">
                                <label for="total_value">Total Value:</label>
                                <input type="text" class="form-control" name="total_value" id="total_value" readOnly>
                            </div>

                            <div hidden class="form-group mt-3">
                                <label for="memo_procedures">Memo Procedures:</label>
                                <input type="text" class="form-control" name="memo_procedures" id="memo_procedures" readOnly >
                            </div>

                            <h3 class="text-danger mt-3">Procedures:</h3>

                            <!-- Button trigger modalProcedures -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalProcedures">
                                Add Procedure
                            </button>

                            <table id="grid" class="table table-bordered table-striped table-hover mt-3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>

                            <div class="row justify-content-end mt-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <h5>
                                        <span class="text-primary">Quantity:</span>
                                        <span class="text-primary" id="qte_procedure_consultation">0</span>
                                    </h5>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <h5>
                                        <span class="text-success">Total:</span>
                                        <span class="text-success" id="consultation_value">0.0</span>
                                    </h5>
                                </div>
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
@extends('layout.main')

@section('body')

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

                    </form>

                </div>
            </div>
        
        </div>

    </div>

</section>

@endsection
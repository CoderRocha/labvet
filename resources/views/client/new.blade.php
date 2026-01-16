@extends('layout.main')

@section('body')

<div class="alert alert-success" role="alert">
    <h2>New Client</h2>
</div>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <br>
                <div class="box-body no-padding">
                    <form role="form" action="/client" method="POST">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required
                                onInvalid="this.setCustomValidity('This field is required!')"
                                {{-- onchange="try{setCustomValidity('')}catch(e){}" --}}
                                >
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address">
                            </div>

                            <div class="form-group">
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
                        </div>

                    </form>

                </div>
            </div>
        
        </div>

    </div>

</section>

@endsection
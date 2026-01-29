@extends('layout.main')

@section('body')

<div class="alert alert-warning" role="alert">
    <h2>View Consultation</h2>
</div>

<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a href="/consultation" class="btn btn-danger">Go back</a>
                </div>
                <br>

                <div class="box-body no-padding">
                    
                    <h4 class="text-primary">
                        Consultation
                    </h4>

                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr class="table-primary">
                                <th style="width: 50px">#</th>
                                <th>Date</th>
                                <th>Total Value ($)</th>
                            </tr>

                        </thead>

                        <tbody>
                                <tr>
                                    <td>{{ $consultation->id }}</td>
                                    <td>{{ \Carbon\Carbon::parse($consultation->date)->format('d/m/Y') }}</td>
                                    <td>{{ $consultation->total_cost }}</td>
                                </tr>
                        </tbody>
                    </table>
                    <h4 class="text-success">
                        Pet
                    </h4>
                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr class="table-success">
                                <th style="width: 10px">#</th>
                                <th style="width: 250px">Photo</th>
                                <th>Name</th>
                                <th>Owner</th>
                                <th>Specie</th>
                                <th>Gender</th>
                                <th>D.O.B</th>
                            </tr>

                        </thead>

                        <tbody>
                                <tr>
                                    <td>{{ $consultation->pet->id }}</td>
                                    <td><img src="{{asset('storage/'.$consultation->pet->photo_path)}}" alt="Foto" style="max-width: 70%;"></td>
                                    <td>{{ $consultation->pet->name }}</td>
                                    <td>{{ $consultation->pet->client->name }}</td>
                                    <td>{{ $consultation->pet->specie }}</td>
                                    <td>{{ $consultation->pet->gender }}</td>
                                    <td>{{ \Carbon\Carbon::parse($consultation->pet->dob)->format('d/m/Y') }}</td>
                                </tr>
                        </tbody>
                    </table>

                    <h4 class="text-danger">
                        Procedures
                    </h4>

                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr class="table-danger">
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>

                        </thead>

                        <tbody>
                                <tr>
                                @foreach ($consultation->procedures as $procedure)
                                <tr>
                                    <td>{{ $procedure->id }}</td>
                                    <td>{{ $procedure->name }}</td>
                                    <td>{{ $procedure->price }}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
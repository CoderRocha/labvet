@extends('layout.main')

@section('body')

<div class="alert alert-primary" role="alert">
    <h2>Vets Report</h2>
</div>

<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                
                <br>

                <div class="box-body no-padding">
                    <table class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>State</th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($vets as $vet )
                                <tr>
                                    <td>{{ $vet->id }}</td>
                                    <td>{{ $vet->name }}</td>
                                    <td>{{ $vet->email }}</td>
                                    <td>{{ $vet->phone }}</td>
                                    <td>{{ $vet->address }}</td>
                                    <td>{{ $vet->state }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
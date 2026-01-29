@extends('layout.main')

@section('body')

<div class="alert alert-primary" role="alert">
    <h2>Pets Report</h2>
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
                                <th style="width: 250px">Photo</th>
                                <th>Name</th>
                                <th>Owner</th>
                                <th>Specie</th>
                                <th>Gender</th>
                                <th>D.O.B</th>
                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($pets as $pet )
                                <tr>
                                    <td>{{ $pet->id }}</td>
                                    <td><img src="{{asset('storage/'.$pet->photo_path)}}" alt="Photo" style="max-width: 70%;"></td>
                                    <td>{{ $pet->name }}</td>
                                    <td>{{ $pet->client->name ?? '' }}</td>
                                    <td>{{ $pet->specie }}</td>
                                    <td>{{ $pet->gender }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pet->dob)->format('d/m/Y') }}</td>
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
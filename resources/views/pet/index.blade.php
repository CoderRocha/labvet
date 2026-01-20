@extends('layout.main')

@section('body')

<div class="alert alert-primary" role="alert">
    <h2>Pets</h2>
</div>

<section class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a href="/pet/new" class="btn btn-success">New Pet</a>
                </div>
                <br>

                <div class="box-body no-padding">
                    <table id="tb_default" class="table table-bordered table-striped mt-3">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="width: 250px">Photo</th>
                                <th>Name</th>
                                <th>Owner</th>
                                <th>Specie</th>
                                <th>Breed</th>
                                <th>Gender</th>
                                <th>D.O.B</th>
                                <th style="width: 250px">&nbsp;</th>

                            </tr>

                        </thead>

                        <tbody>
                            @foreach ($pets as $pet )
                                <tr>
                                    <td>{{ $pet->id }}</td>
                                    <td><img src="{{asset('storage/' . $pet->photo_path) }}" width="100px" height="100px" alt="Pet Photo" style="max-width: 100px; max-height: 70%;"></td>
                                    <td>{{ $pet->name }}</td>
                                    <td>{{ $pet->client->name ?? '' }}</td>
                                    <td>{{ $pet->specie }}</td>
                                    <td>{{ $pet->breed }}</td>
                                    <td>{{ $pet->gender }}</td>
                                    <td>{{\Carbon\Carbon::parse($pet->birthday)->format('d/m/Y')}}</td>
                                    <td>
                                        <a href="/pet/edit/{{$pet->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                        <a href="/pet/delete/{{$pet->id}}" onclick="return confirm('Do you really want to delete this Pet (ID: {{$pet->id}}) ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Delete</a>
                                    </td>
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
@extends('layout.main')

@section('body')

    <div class="alert alert-primary text-center">
        <h2>Bem vindo ao LabVet!</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img class="mx-auto d-block" src="{{ url('/main-image.jpg') }}" style="max-width: 95%;" alt="LabVet Main Image">
            </div>
        </div>
    </div>

@endsection
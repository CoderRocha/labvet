@extends('layout.main')

@section('body')

<div class="alert alert-success" role="alert">
    <h2>New Procedure</h2>
</div>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <br>
                <div class="box-body no-padding">
                    <form role="form" action="/procedure" method="POST">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" required
                                onInvalid="this.setCustomValidity('This field is required!')"
                                {{-- onchange="try{setCustomValidity('')}catch(e){}" --}}
                                >
                            </div>

                            <div class="form-group mt-3">
                                <label for="price">Price ($)</label>
                                <input type="number" class="form-control" name="price" id="price" step="0.01" value="0.00" placeholder="0.00" required>
                            </div>

                        </div>
                        <br>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="/procedure" class="btn btn-danger">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        
        </div>

    </div>

</section>

@endsection
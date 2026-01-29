<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labvet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="https://cdn.datatables.net/2.3.6/css/dataTables.dataTables.min.css" href="style.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/client">Clients <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pet">Pets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/procedure">Procedures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/vet">Vets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/consultation">Consultations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/report">Reports</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li> --}}
                </ul>
            </div>
        </nav>

        @hasSection('body')
            @yield('body')
        @endif

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

    @component('layout.footer')
        @endcomponent

</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>People List</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>
<body>
<div class="container">
    <div class="row row-bottom g-3">
        <div class="align-text-bottom">
            <form class="row row-cols-md-auto g-3 align-items-end" method="get" action="{{ route('people.list') }}"
                  autocomplete="off">
                <div class="col-sm-7">
                    <label class="form-label" for="year">Birth year</label>
                    <input type="text" name="year" id="year" class="form-control input-group" placeholder="1995"
                           value="{{ request()->has('year') ? request()->get('year') : '' }}">
                </div>
                <div class="col-sm">
                    <label class="form-label" for="month">Birth month</label>
                    <input type="text" name="month" id="month" class="form-control input-group" placeholder="12"
                           value="{{ request()->has('month') ? request()->get('month') : '' }}">
                </div>
                <div class="col-sm">
                    <button type="submit" class="btn btn-secondary filter-btn">Filter</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="nav justify-content-end">
                {{ $persons->withQueryString()->links('vendor.pagination', ['total' => $total]) }}
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">IP</th>
                    <th scope="col">Country</th>
                </tr>
                </thead>
                <tbody>
                @foreach($persons as $person)
                    <tr>
                        <td>{{ $person->email_address }}</td>
                        <td>{{ $person->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($person->birthday)->format('Y/m/d H:i:s A') }}</td>
                        <td>{{ $person->ip }}</td>
                        <td>{{ $person->country }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="nav justify-content-end">
                {{ $persons->withQueryString()->links('vendor.pagination', ['total' => $total]) }}
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
        crossorigin="anonymous"></script>
</body>
</html>

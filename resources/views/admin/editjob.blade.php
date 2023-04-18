@extends('layouts.app')
@extends('layouts.sidebar')



@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="card d-flex flex-column flex-shrink-0 p-3 bg-light shadow-sm " style="width: 210px;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    {{-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg> --}}
                    <span class="fs-5 text-center">ERS System</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    {{-- <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg> Home
                    </a>
                </li> --}}
                    <li>
                        <a href="/" class="d-flex nav-link link-dark ">
                            <i class="material-icons md-18 me-2">dashboard</i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="#" class="d-flex bi  btn btn-toggle align-items-center rounded collapsed dropdown-toggle"
                            data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                            <i class="material-icons md-18 me-2">work</i> <span>Jobs</span>
                        </a>
                        <div class="collapse show" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/createjob" class="d-flex nav-link link-dark rounded ">Create Job <span
                                            class="material-icons md-18 ms-1">edit
                                        </span> </a></li>
                                <li><a href="/jobs" class="d-flex nav-link link-dark rounded active">Created Jobs <span
                                            class="material-icons md-18 ms-1">
                                            visibility
                                        </span></a></li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#"
                            class="d-flex bi me-2 btn btn-toggle align-items-center rounded collapsed dropdown-toggle"
                            data-bs-toggle="collapse" data-bs-target="#dashboard-collapse2" aria-expanded="false">
                            <span class="material-icons md-18 me-2">
                                badge
                            </span> Employees
                        </a>
                        <div class="collapse show" id="dashboard-collapse2">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/applied" class="d-flex nav-link link-dark rounded">Jobs Applied <span
                                            class="material-icons md-18 ms-1">
                                            check_circle
                                        </span></a></li>
                                <li><a href="/shortlist" class="d-flex nav-link link-dark rounded">Shortlist <span
                                            class="material-icons md-18 ms-1">
                                            fact_check
                                        </span></a></li>
                                <li><a href="/rejected" class="d-flex nav-link link-dark rounded">Rejected <span
                                            class="material-icons md-18 ms-1">
                                            remove_circle
                                        </span></a></li>
                            </ul>
                        </div>
                    </li>
                    {{-- <li>
                    <a href="#" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg> Customers
                    </a>
                </li> --}}
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                        id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        {{-- <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> --}}
                        <span class="material-icons me-1">
                            account_circle
                        </span>
                        <strong> {{ Auth::user()->name }}
                        </strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li> <a class="d-flex dropdown-item" href="password/reset">Reset Password <span class="material-icons md-18 ms-1">
                            lock
                        </span>
                    </a>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="d-flex dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout ') }} <span class="material-icons md-18 ms-1">
                                    logout
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Job') }}</div>

                    <div class="card-body shadow-sm">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}
                        <form class="text-center justify-content-center" action="{{ route('job.update',[$vacancy->id]) }}" method="POST">
                            @csrf

                            <div class="row mb-3 justify-content-center">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Vacancy :</label>
                                <div class="col-sm-5">
                                    <select class="form-select" aria-label="Default select example" name="title" required>
                                        <option value="{{ $vacancy->title }}" selected>{{ $vacancy->title }}</option>
                                        <option value="One">One</option>
                                        <option value="Two">Two</option>
                                        <option value="Three">Three</option>
                                      </select>                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Description :</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" required name="description">{{ $vacancy->description}}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Expiray Date :</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control text-center" id="inputEmail3" name="expiray" value="{{ $vacancy->expiray_date }}" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update </button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

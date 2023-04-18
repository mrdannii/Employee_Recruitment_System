@extends('layouts.app')

@section('careers','active')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">{{ __('Careers') }}</div>

                <div class="card-body">
                    <table class="table table-bordered table-hover table-sm  text-center">
                        <thead class="">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Vacancy</th>
                                <th scope="col">Description</th>
                                <th class="w-25" scope="col">Last Date for Apply</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacancy as $item)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    @if ($item->expiray_date > now()->toDateTimeString())
                                                <td><span class="badge bg-success">{{ $item->expiray_date }}</span></td>
                                                <td>Active</td>
                                                <td><a href="{{ route('login') }}" class="btn btn-xs btn-primary">Apply</a></td>

                                            @elseif ($item->expiray_date == now()->toDateString())
                                                <td><span class="badge bg-warning">{{ $item->expiray_date }}</span></td>
                                                <td>Active</td>
                                                <td><a href="{{ route('login') }}" class="btn btn-xs btn-primary">Apply</a></td>

                                                @else
                                                <td><span class="badge bg-danger">{{ $item->expiray_date }}</span></td>
                                                <td>Expired</td>
                                                <td><a href="" class="btn btn-xs btn-danger disabled">Expired</a></td>


                                            @endif
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

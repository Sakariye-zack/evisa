@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Admin Dashboard</h1>

        <div class="row">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Total Applications</h5>
                        <p class="display-6">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Submitted</h5>
                        <p class="display-6">{{ $stats['submitted'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Approved</h5>
                        <p class="display-6 text-success">{{ $stats['approved'] }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5>Rejected</h5>
                        <p class="display-6 text-danger">{{ $stats['rejected'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
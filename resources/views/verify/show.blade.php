@extends('layouts.app')
@section('content')
<h1>Visa Verification</h1>
@if($app)
  <p>Reference <strong>{{ $app->reference_no }}</strong> is <strong>{{ strtoupper($app->status) }}</strong>.</p>
@else
  <p>No application found for code <strong>{{ $code }}</strong>.</p>
@endif
@endsection

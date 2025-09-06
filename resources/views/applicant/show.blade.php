@extends('layouts.app')
@section('content')
<h1>Application {{ $app->reference_no }}</h1>
<ul>
  <li><strong>Visa Type:</strong> {{ $app->visa_type }}</li>
  <li><strong>Status:</strong> {{ $app->status }}</li>
  <li><strong>Arrival:</strong> {{ $app->arrival_date }}</li>
  <li><strong>Duration:</strong> {{ $app->duration_days }} days</li>
</ul>
@endsection

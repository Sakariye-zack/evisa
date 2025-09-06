@extends('layouts.app')
@section('content')
<h1>Admin Dashboard</h1>
<ul>
  <li>Total: {{ $stats['total'] }}</li>
  <li>Submitted: {{ $stats['submitted'] }}</li>
  <li>Approved: {{ $stats['approved'] }}</li>
  <li>Rejected: {{ $stats['rejected'] }}</li>
</ul>
@endsection

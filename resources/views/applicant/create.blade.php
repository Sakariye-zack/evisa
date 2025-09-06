@extends('layouts.app')
@section('content')
<h1>New Visa Application</h1>

<form method="post" action="{{ route('applications.store') }}" enctype="multipart/form-data">
  @csrf
  <label>Visa Type
    <input type="text" name="visa_type" required>
  </label>
  <label>Purpose
    <input type="text" name="purpose">
  </label>
  <label>Arrival Date
    <input type="date" name="arrival_date">
  </label>
  <label>Duration (days)
    <input type="number" min="1" max="365" name="duration_days">
  </label>
  <label>Passport Scan (pdf/jpg/png, max 4MB)
    <input type="file" name="passport_scan" accept=".pdf,.jpg,.jpeg,.png">
  </label>
  <label>Photo (jpg/png, max 2MB)
    <input type="file" name="photo" accept=".jpg,.jpeg,.png">
  </label>
  <button type="submit">Submit</button>
</form>
@endsection

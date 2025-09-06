@extends('layouts.app')
@section('content')
<h1>My Applications</h1>

<p><a href="{{ route('applications.create') }}">+ New Application</a></p>

<table>
  <thead>
    <tr>
      <th>Ref</th><th>Type</th><th>Status</th><th>Created</th><th></th>
    </tr>
  </thead>
  <tbody>
  @foreach($apps as $a)
    <tr>
      <td>{{ $a->reference_no }}</td>
      <td>{{ $a->visa_type }}</td>
      <td>{{ $a->status }}</td>
      <td>{{ $a->created_at->format('Y-m-d') }}</td>
      <td><a href="{{ route('applications.show', $a->id) }}">View</a></td>
    </tr>
  @endforeach
  </tbody>
</table>

{{ $apps->links() }}
@endsection

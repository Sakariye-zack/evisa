@extends('layouts.app')
@section('content')
<h1>Officer Review Queue</h1>

<table>
  <thead>
    <tr><th>Ref</th><th>Type</th><th>Status</th><th>Actions</th></tr>
  </thead>
  <tbody>
  @foreach($apps as $a)
    <tr>
      <td>{{ $a->reference_no }}</td>
      <td>{{ $a->visa_type }}</td>
      <td>{{ $a->status }}</td>
      <td>
        <form method="post" action="{{ route('reviews.review', $a->id) }}">
          @csrf
          <select name="decision">
            <option value="approve">Approve</option>
            <option value="reject">Reject</option>
            <option value="request_info">Request Info</option>
          </select>
          <input type="text" name="reason" placeholder="Reason (optional)">
          <button type="submit">Save</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

{{ $apps->links() }}
@endsection

@extends('layouts.app')

@section('content')
<h1>My Appointments</h1>
<a href="{{ route('appointments.create') }}">Book New Appointment</a>
<ul>
@foreach($appointments as $a)
    <li>{{ $a->appointment_time }} - {{ $a->status }}
        <form action="{{ route('appointments.destroy', $a) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit">Cancel</button>
        </form>
    </li>
@endforeach
</ul>
@endsection

<x-app-layout>
    <h1>Create Appointment</h1>
    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <label for="appointment_time">Appointment Date & Time:</label>
        <input type="datetime-local" name="appointment_time" id="appointment_time" required>
        <label for="coach_id">Select Coach:</label>
<select name="coach_id" id="coach_id">
    @foreach($coaches as $coach)
        <option value="{{ $coach->id }}">{{ $coach->name }}</option>
    @endforeach
</select>

        <button type="submit">Book Appointment</button>
    </form>
</x-app-layout>
